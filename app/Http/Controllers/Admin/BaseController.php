<?php

namespace Pteranodon\Http\Controllers\Admin;

use Illuminate\View\View;
use Pteranodon\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function index(): View
    {
        return view('templates/base.core');
    }
}
