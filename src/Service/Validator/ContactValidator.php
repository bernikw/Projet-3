<?php

declare(strict_types=1);

namespace App\Service\Validator;


class ContactValidator extends BaseValidator

{
    private $datas = [];


    public function isValid(array $datasForm): bool
    {
        $result = true;

        if (!$this->isValidInput($datasForm['name'])) {

            $this->errors['name'] = 'Ces données ne sont pas valides';
            $result = false;
        }

        if (!$this->isValidDatas($datasForm['name'])) {

            $this->errors['name'] = 'Ces données ne sont pas valides';
            $result = false;
        }

        if (!$this->isValidInput($datasForm['firstname'])) {

            $this->errors['firstname'] = 'Ces données ne sont pas valides';
            $result = false;
        }

        if (!$this->isValidDatas($datasForm['firstname'])) {

            $this->errors['firstname'] = 'Ces données ne sont pas valides';
            $result = false;
        } 

        if (!$this->isValidEmail($datasForm['email'])) {

            $this->errors['email'] = 'Ces données ne sont pas valides';
            $result = false;
        }
        if (!$this->isValidInput($datasForm['message'])) {

            $this->errors['message'] = 'Ces données ne sont pas valides';
            $result = false;
        }
        if (!$this->isValidDatas($datasForm['message'])) {

            $this->errors['message'] = 'Ces données ne sont pas valides';
            $result = false;
        }


        return $result;
    }
}
