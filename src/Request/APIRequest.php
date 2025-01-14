<?php

namespace InfyOm\Generator\Request;

use Illuminate\Support\Arr;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;

use InfyOm\Generator\Utils\ResponseUtil;

class APIRequest extends FormRequest
{
    /**
     * Get the proper failed validation response for the request.
     *
     * @param array $errors
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function response(array $errors)
    {
        $messages = implode(' ', Arr::flatten($errors));

        return Response::json(ResponseUtil::makeError($messages), Response::HTTP_BAD_REQUEST);
    }
}
