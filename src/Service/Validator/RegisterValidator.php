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

         $this->errors = 'Ce données ne sont pas valide';
         $result = false;
      }

      if (!$this->isValidInput($datas['email'])) {

         $this->errors = 'Ces données ne sont pas valides';
         $result = false;
      }
      if (!$this->isValidInput($datas['password'])) {

         $this->errors = 'Ces données ne sont pas valides';
         $result = false;
      }
      if (!$this->isValidInput($datas['password_confirm'])) {

         $this->errors = 'Ces données ne sont pas valides';
         $result = false;
      }

      if (!$this->isValidDatas($datas['username'])) {

         $this->errors['username'] = 'Ces données ne sont pas valides';
         $result = false;
      }

      if (!$this->isValidEmail($datas['email'])) {

         $this->errors['email'] = 'Ces données ne sont pas valides';
         $result = false;
      }

      if (!$this->isValidUsername($datas['username'])) {

         $this->errors['username'] = 'Ces données ne sont pas valides';
         $result = false;
      }

      if (!$this->isValidPassword($datas['password'])) {

         $this->errors['password'] = 'Ces données ne sont pas valides';        
      }

      if (!$this->isValidPassword($datas['password_confirm'])) {

         $this->errors['password_confirm'] = 'Ces données ne sont pas valides';  
      }

      if (!$this->isValidPassConfirm($datas['password'], $datas ['password_confirm'])) {

         $this->errors['password_confirm'] = 'Ces mots de passe ne sont pas le mêmes';       
      }

      return $result;
   }
}
