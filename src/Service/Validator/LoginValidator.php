<?php

declare(strict_types=1);

namespace App\Service\Validator;


class LoginValidator extends BaseValidator
{
    private $datas = [];


    public function isValid(array $infoUser): bool
    {

        $result = true;

        if (!$this->isValidInput($infoUser['email'])) {

            $this->errors = 'Ces données ne sont pas valides';
            $result = false;
        }

        if (!$this->isValidEmail($infoUser['email'])) {

            $this->errors['email'] = 'Ces données ne sont pas valides';
            $result = false;
        }

        if (!$this->isValidPassword($infoUser['password'])) {

            $this->errors['password'] = 'Ces données ne sont pas valides';
            $result = false;
        }


        return $result;
    }
}
