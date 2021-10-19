<?php

declare(strict_types=1);

namespace App\Service\Validator;

class RegisterValidator extends BaseValidator

{
   private $datas = [];


   public function isValidDatas(array $datas): bool
   {
      $result = true;

      if (!$this->isValidName($datas['firstname'])) {

         $this->errors['firstname'] = 'Ce prenom n\'est pas valide';
         $result = false;
      }

      if (!$this->isValidName($datas['name'])) {

         $this->errors['name'] = 'Ce nom de famille n\'est pas valide';
         $result = false;
      }

      if (!$this->isValidEmail($datas['email'])) {

         $this->errors['email'] = 'Ce email n\'est pas valide';
         $result = false;
      }

      if (!$this->isValidPassword($datas['password'], $datas['password_confirm'])) {

         $this->errors['password'] = 'Le mot de passe doit contenir entre 8 et 15 caractères';

         if($datas['password']!= $datas['password_confirm']){

             $this->errors['password'] = 'Les mots de passe ne sont pas les mêmes';
         }

      }

      return $result;
   }
}
