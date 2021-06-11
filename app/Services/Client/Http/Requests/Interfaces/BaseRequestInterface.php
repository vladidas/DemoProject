<?php

namespace App\Services\Client\Http\Requests;

/**
 * Interface BaseRequestInterface
 * @package  App\Services\Client\Http\Requests
 * @author   Vlad Golubtsov\
 */
interface BaseRequestInterface
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool;
}
