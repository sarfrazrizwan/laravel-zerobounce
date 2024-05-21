<?php

namespace Sarfrazrizwan\LaravelZerobounce\Exceptions;

use InvalidArgumentException;

/**
 * @internal
 */
final class ApiKeyIsMissing extends InvalidArgumentException
{
    /**
     * Create a new exception instance.
     */
    public static function create(): self
    {
        return new self(
            'The Zero Bounce API Key is missing. Please set the [api_key] in .env file using key name: ZEROBOUNCE_API_KEY .'
        );
    }
}