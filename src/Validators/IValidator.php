<?php

namespace App\Validators;

interface IValidator
{
    /**
     * Return array of errors if validation failed, otherwise NULL
     *
     * @param array $data
     * @return array|null
     */
    public function validate(array $data): ?array;
}