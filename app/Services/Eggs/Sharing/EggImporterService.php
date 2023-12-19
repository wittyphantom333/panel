<?php

namespace Pteranodon\Services\Eggs\Sharing;

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Arr;
use Pteranodon\Models\Egg;
use Pteranodon\Models\Nest;
use Symfony\Component\Yaml\Yaml;
use Illuminate\Http\UploadedFile;
use Pteranodon\Models\EggVariable;
use Illuminate\Database\ConnectionInterface;
use Pteranodon\Exceptions\DisplayException;
use Pteranodon\Services\Eggs\EggParserService;
use Symfony\Component\Yaml\Exception\ParseException;
use Pteranodon\Exceptions\Service\Egg\BadJsonFormatException;
use Pteranodon\Exceptions\Service\Egg\BadYamlFormatException;
use Pteranodon\Exceptions\Service\InvalidFileUploadException;

class EggImporterService
{
    public function __construct(
        private ConnectionInterface $connection,
        private EggParserService $eggParserService
    ) {
    }

    /**
     * Take an uploaded JSON file and parse it into a new egg.
     *
     * @deprecated use `handleFile` or `handleContent` instead
     *
     * @throws \Pteranodon\Exceptions\Repository\RecordNotFoundException
     * @throws \Pteranodon\Exceptions\Service\Egg\BadJsonFormatException
     * @throws \Pteranodon\Exceptions\Service\InvalidFileUploadException
     * @throws \Pteranodon\Exceptions\Service\Egg\BadYamlFormatException
     * @throws \Pteranodon\Exceptions\Model\DataValidationException
     * @throws \Pteranodon\Exceptions\DisplayException
     */
    public function handle(UploadedFile $file, int $nestId): Egg
    {
        return $this->handleFile($nestId, $file);
    }

    /**
     * ?
     *
     * @throws \Pteranodon\Exceptions\Repository\RecordNotFoundException
     * @throws \Pteranodon\Exceptions\Service\Egg\BadJsonFormatException
     * @throws \Pteranodon\Exceptions\Service\InvalidFileUploadException
     * @throws \Pteranodon\Exceptions\Service\Egg\BadYamlFormatException
     * @throws \Pteranodon\Exceptions\Model\DataValidationException
     * @throws \Pteranodon\Exceptions\DisplayException
     */
    public function handleFile(int $nestId, UploadedFile $file): Egg
    {
        if ($file->getError() !== UPLOAD_ERR_OK || !$file->isFile()) {
            throw new InvalidFileUploadException(sprintf('The selected file ["%s"] was not in a valid format to import. (is_file: %s is_valid: %s err_code: %s err: %s)', $file->getFilename(), $file->isFile() ? 'true' : 'false', $file->isValid() ? 'true' : 'false', $file->getError(), $file->getErrorMessage()));
        }

        return $this->handleContent($nestId, $file->openFile()->fread($file->getSize()), 'application/json');
    }

    /**
     * ?
     *
     * @throws \Pteranodon\Exceptions\Repository\RecordNotFoundException
     * @throws \Pteranodon\Exceptions\Service\InvalidFileUploadException
     * @throws \Pteranodon\Exceptions\Service\Egg\BadYamlFormatException
     * @throws \Pteranodon\Exceptions\Service\Egg\BadJsonFormatException
     * @throws \Pteranodon\Exceptions\DisplayException
     * @throws \Pteranodon\Exceptions\Model\DataValidationException
     */
    public function handleContent(int $nestId, string $content, string $contentType): Egg
    {
        switch (true) {
            case str_starts_with($contentType, 'application/json'):
                $parsed = json_decode($content, true);
                if (json_last_error() !== 0) {
                    throw new BadJsonFormatException(trans('exceptions.nest.importer.json_error', ['error' => json_last_error_msg()]));
                }

                return $this->handleArray($nestId, $parsed);
            case str_starts_with($contentType, 'application/yaml'):
                try {
                    $parsed = Yaml::parse($content);

                    return $this->handleArray($nestId, $parsed);
                } catch (ParseException $exception) {
                    throw new BadYamlFormatException('There was an error while attempting to parse the YAML: ' . $exception->getMessage() . '.');
                }
            default:
                throw new DisplayException('unknown content type');
        }
    }

    /**
     * ?
     *
     * @throws \Pteranodon\Exceptions\Model\DataValidationException
     * @throws \Pteranodon\Exceptions\Repository\RecordNotFoundException
     * @throws \Pteranodon\Exceptions\Service\InvalidFileUploadException
     */
    private function handleArray(int $nestId, array $parsed): Egg
    {
        $parsed = $this->eggParserService->handle($parsed);

        /** @var \Pteranodon\Models\Nest $nest */
        $nest = Nest::query()->with('eggs', 'eggs.variables')->findOrFail($nestId);

        return $this->connection->transaction(function () use ($nest, $parsed) {
            $egg = (new Egg())->forceFill([
                'uuid' => Uuid::uuid4()->toString(),
                'nest_id' => $nest->id,
                'author' => Arr::get($parsed, 'author'),
                'copy_script_from' => null,
            ]);

            $egg = $this->eggParserService->fillFromParsed($egg, $parsed);
            $egg->save();

            foreach ($parsed['variables'] ?? [] as $variable) {
                EggVariable::query()->forceCreate(array_merge($variable, ['egg_id' => $egg->id]));
            }

            return $egg;
        });
    }
}
