<?php

declare(strict_types=1);

namespace App\Service\Validator;

abstract class BaseValidator

{

    protected  $errors = [];

    protected function isValidInput(string $name): bool
    {
        if (!trim($name) && !stripslashes($name) && !htmlspecialchars($name, ENT_QUOTES, 'UTF-8')) {

            return false;
        }

        return true;
    }

    protected function isValidDatas(string $name): bool
    {
        if (!isset($name) && $this->isEmpty($name)) {

            return false;

        } elseif (!preg_match('/^[a-zA-Z0-9]{3,12}$/', $name)) {

            return false;
        }

        return true;
    }

    /*protected function isValidUsername(string $username): bool{

    if (!strlen($username) <= 255 ){

            return false;
        }
        return true; 
    }*/

    protected function isValidEmail(string $email): bool
    {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            return false;
        }

        return true;
    }

    protected function isValidPassword(string $password)
    {

        if (!isset($password) && $this->isEmpty($password) && !strlen($password) < 5 || !strlen($password) > 12) {
            return false;
        } elseif (!preg_match('/^[a-zA-Z0-9]{3,12}$/', $password) || !ctype_alnum($password)) {

            return false;
        } 
        

        return true;
    }

   protected function isValidPassConfirm(string $password, string $passwordConfirm): bool
    {

        if ($password !== $passwordConfirm) {
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
