<?php

declare(strict_types=1);

namespace App\Service\Validator;


class UserValidator extends BaseValidator
{
    private $data = [];

        public function isValid(array $data): bool
    {

        $result = true; 

        if(!$this->isValidDatas($data['role'])) {

        $this->errors['role'] = 'Ce champ n\'est pas autorisé';
            $result = false;
        }
         
        return $result;
    }
}