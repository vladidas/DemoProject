<?php

namespace App\Services\Client\Http\Requests\Auth\LinkedIn;

use App\Services\Client\Http\Requests\BaseRequest;

/**
 * Class    LoginViaLinkedInRequest
 * @package App\Services\Client\Http\Requests\Auth\LinkedIn
 * @author  Vlad Golubtsov
 */
class LoginViaLinkedInRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'code'  => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
        ];
    }
}
