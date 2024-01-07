<?php

namespace App\Validators;

use App\Modules\BoardingPass\Types\TypeConstants;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints;

class BoardingPassRequestValidator implements IValidator
{
    private Constraints\Collection $rules;
    private array $errors = [];

    public function __construct()
    {
        $this->rules = new Constraints\Collection([
            'id' => [
                new Constraints\Type(['type' => 'string']),
                new Constraints\NotBlank(),
            ],
            'type' => [
                new Constraints\Type(['type' => 'string']),
                new Constraints\NotBlank(),
                new Constraints\Choice(['choices' => array_keys(TypeConstants::TYPES_MAP)]),
            ],
            'source' => [
                new Constraints\Type(['type' => 'string']),
                new Constraints\NotBlank(),
            ],
            'destination' => [
                new Constraints\Type(['type' => 'string']),
                new Constraints\NotBlank(),
            ],
            'gate' => [
                new Constraints\Type(['type' => 'string']),
            ],
            'seat' => [
                new Constraints\Type(['type' => 'string']),
            ],
        ]);
    }

    public function validate(array $data): ?array {

        foreach ($data as $i => $row) {
            $validator = Validation::createValidator();
            $violations = $validator->validate($row, $this->rules);

            if (count($violations) > 0) {
                foreach ($violations as $violation) {
                    $this->errors[] = [
                        'row' => $i,
                        'field' => $violation->getPropertyPath(),
                        'message' => $violation->getMessage(),
                    ];
                }
            }
        }

        return empty($this->errors) ? null : $this->errors;
    }
}