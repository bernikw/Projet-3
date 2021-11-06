<?php

declare(strict_types=1);

namespace App\Service\Validator;

class RegisterValidator extends BaseValidator

{
   private $datas = [];


   public function isValid(array $datas): bool
   {
      $result = true;

      if (!$this->isValidInput($datas['username'])) {

         $this->errors = 'Ce nom contient des caractères non autorisés';
         $result = false;
      }

      if (!$this->isValidInput($datas['email'])) {

         $this->errors = 'Ce email n\'est pas correct';
         $result = false;
      }
      if (!$this->isValidInput($datas['password'])) {

         $this->errors = 'Le mot de passe doit contenir des lettres et des chiffres';
         $result = false;
      }
      if (!$this->isValidInput($datas['password_confirm'])) {

         $this->errors = 'Le mot de passe doit contenir des lettres et des chiffres';
         $result = false;
      }

      if (!$this->isValidDatas($datas['username'])) {

         $this->errors['username'] = 'Le nom d\'utilisateur contient des caractères non autorisés';
         $result = false;
      }

      if (!$this->isValidEmail($datas['email'])) {

         $this->errors['email'] = 'Ce email n\'est pas correct';
         $result = false;
      }

      if (!$this->isValidUsername($datas['username'])) {

         $this->errors['username'] = 'Ce nom d\'utilisateur contient des caractères non autorisés';
         $result = false;
      }

      if (!$this->isValidPassword($datas['password'])) {

         $this->errors['password'] = 'Le mot de passe contient des caractères non autorisés';        
      }

      if (!$this->isValidPassword($datas['password_confirm'])) {

         $this->errors['password_confirm'] = 'Le mot de passe contient des caractères non autorisés';  
      }

      if (!$this->isValidPassConfirm($datas['password'], $datas ['password_confirm'])) {

         $this->errors['password_confirm'] = 'Les deux mots de passes ne sont pas identiques';       
      }

      return $result;
   }
}
