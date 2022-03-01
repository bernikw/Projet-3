<?php

declare(strict_types=1);

namespace App\Service\Validator;

use App\Model\Repository\UserRepository;

class RegisterValidator extends BaseValidator
{
   
   private UserRepository $userRepository;

   public function __construct(UserRepository $userRepository)
   {
      $this->userRepository = $userRepository;
   }

   private function emailIsUnique(string $email): bool
   {
      $resultemail = $this->userRepository->findCountEmail($email);
     
      if ($resultemail > 0) {

          $this->errors['email']= 'Cet email existe déjà.';
          return false;
      }

      return true;
   }

   private function usernameIsUnique(string $username): bool
   {
      $resultuser = $this->userRepository->findCountUsername($username);

      if ($resultuser > 0) {

          $this->errors['username'] = 'Cette nom utilisateur existe déjà.';
          return false;
      }

      return true;
   }
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

      if (!$this->isValidPassword($datas['password'])) {
   
         $this->errors['password'] = 'Le mot de passe doit contenir au moins 8 caractères dont
         au moins une majuscule, un chiffre et un caractère spécial'; 
         $result = false;   
      }

      if (!$this->isValidPassword($datas['password_confirm'])) {

         $this->errors['password_confirm'] = 'Le mot de passe contient des caractères non autorisés'; 
         $result = false;
      }

      if (!$this->isValidPassConfirm($datas['password'], $datas['password_confirm'])) {

         $this->errors['password_confirm'] = 'Les deux mots de passes ne sont pas identiques'; 
         $result = false;   
      }

      if($result)
      {
         if(!$this->emailIsUnique($datas['email']))
         {
            $result = false;
         }
         if(!$this->usernameIsUnique($datas['username']))
         {
            $result = false;
         }
      
      }

      return $result;
   }
}
