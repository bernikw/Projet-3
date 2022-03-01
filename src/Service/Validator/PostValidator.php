<?php

declare(strict_types=1);

namespace App\Service\Validator;


class PostValidator extends BaseValidator
{
    private $datas = [];

        public function isValid(array $datas): bool
    {

        $result = true; 

        if(!$this->isValidInput($datas['title'])) {

        $this->errors['title'] = 'Ce champ contient des caractères non autorisés';
            $result = false;
        }
         if (!$this->isValidInput($datas['chapo'])) {

            $this->errors['chapo'] = 'Ce champ contient des caractères non autorisés';
            $result = false;
        }

            if (!$this->isValidInput($datas['content'])) {

            $this->errors['content'] = 'Ce champ contient des caractères non autorisés';
            $result = false;
        }

        return $result;
    }
}