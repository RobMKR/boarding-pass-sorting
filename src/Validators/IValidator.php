<?php

use Symfony\Component\HttpFoundation\Request;

interface IValidator
{
    /**
     * @param Request $request
     * @return void
     * @throws
     */
    public function validate(Request $request): void;
}