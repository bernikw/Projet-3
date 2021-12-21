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

            $this->errors['name'] = 'Le nom contient des caractères non autorisés';
            $result = false;
        }

        if (!$this->isValidDatas($datasForm['name'])) {

            $this->errors['name'] = 'Le nom contient des caractères non autorisés';
            $result = false;
        }

        if (!$this->isValidInput($datasForm['firstname'])) {

            $this->errors['firstname'] = 'Le prénom contient des caractères non autorisés';
            $result = false;
        }

        if (!$this->isValidDatas($datasForm['firstname'])) {

            $this->errors['firstname'] = 'Le prénom contient des caractères non autorisés';
            $result = false;
        } 

        if (!$this->isValidEmail($datasForm['email'])) {

            $this->errors['email'] = 'Ce email n\'est pas correct';
            $result = false;
        }
        if (!$this->isValidInput($datasForm['message'])) {

            $this->errors['message'] = 'Ce message contient des caractères non autorisés';
            $result = false;
        }
       
        return $result;
    }
}
