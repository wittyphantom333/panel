<?php

namespace Pteranodon\Tests\Unit\Http\Middleware;

use Pteranodon\Tests\TestCase;
use Pteranodon\Tests\Traits\Http\RequestMockHelpers;
use Pteranodon\Tests\Traits\Http\MocksMiddlewareClosure;
use Pteranodon\Tests\Assertions\MiddlewareAttributeAssertionsTrait;

abstract class MiddlewareTestCase extends TestCase
{
    use MiddlewareAttributeAssertionsTrait;
    use MocksMiddlewareClosure;
    use RequestMockHelpers;

    /**
     * Setup tests with a mocked request object and normal attributes.
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->buildRequestMock();
    }
}
