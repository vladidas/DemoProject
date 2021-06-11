<?php

namespace App\Services\Client\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class    BaseRequest
 * @package App\Services\Client\Http\Requests
 * @author  Vlad Golubtsov
 */
class BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}
