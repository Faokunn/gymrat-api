<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'exercise',
        'exercise/1',
        'exercise/{id}',
        'exercise/*',
        'exercise/exercise',
        'exercise/{exercise}'
    ];
}
