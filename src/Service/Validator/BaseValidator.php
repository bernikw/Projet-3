<?php

declare(strict_types=1);

namespace App\Service\Validator;

abstract class BaseValidator

{

    protected  $errors = [];

    protected function isValidName(string $name): bool
    {
        if ($this->isEmpty($name) || $name === 'toto') {
            return false;
        } elseif (!preg_match('/^[a-zA-Z0-9]{3,12}$/', $name)) {

            return false;
        }

        return true;
    }

    protected function isValidEmail(string $email): bool
    {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            return false;
        }

        return true;
    }

    protected function isValidInput(string $datas): bool
    {
        if (!trim($datas) && stripslashes($datas) && htmlspecialchars($datas)) {

            return false;
        }

        return true;
    }

    protected function isValidPassword(string $password){

        if(!strlen($password)<8 || !strlen($password)> 15){

            return false;
        }
        return true;
    }

    protected function isEmpty(string $data): bool
    {

        return empty($data);
    }


    public function getErrors(): array
    {

        return $this->errors;
    }
}
