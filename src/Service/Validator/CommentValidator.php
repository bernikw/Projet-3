<?php

declare(strict_types=1);

namespace App\Service\Validator;


class CommentValidator extends BaseValidator
{
    private $datas = [];

        public function isValid(array $datas): bool
    {

        $result = true; 

       
        if(!$this->isValidInput($datas['text_comment'])) {

            $this->errors['text_comment'] = 'Ce champ contient des caractères non autorisés';
                $result = false;
            }
             
         
        return $result;
    }
}