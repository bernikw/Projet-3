<?php

declare(strict_types=1);

namespace App\Service\Validator;

class ContactValidator extends BaseValidator

{
    private $datas = [];
   

    public function isValid(array $datasForm): bool
    {
        $result = true;

         if (!$this->isValidName($datasForm['firstname'])){

            $this->errors['firstname'] = 'Ce prenom n\'est pas valide';
            $result = false; 
         }

         if (!$this->isValidName($datasForm['name'])){

            $this->errors['name'] = 'Ce nom de famille n\'est pas valide';
            $result = false; 
         }

         if (!$this->isValidEmail($datasForm['email'])){

            $this->errors['email'] = 'Ce email n\'est pas valide'; 
            $result = false; 
         }

         return $result; 
  

    }

    

    /*public function isValid(array $datasForm): bool
    {
        if (empty($datasForm['firstname']['name']) || $datasForm['firstname']['name'] === 'toto') {
            return false;
        }
        elseif (!preg_match('/^[a-zA-Z0-9]{3,12}$/', $datasForm['firstname']['name'])){  
            return false;
            }     

        return true;
       
    }

    public function validEmail(array $datasForm){

        if(filter_var($datasForm ['email'], FILTER_VALIDATE_EMAIL)){
            
        }
    }

    public static function validDatas(array $datas, array $data){

        foreach($datas as $data){
            if(!isset($datas[$data]) || empty($datas[$data]))

            return false;
        }

        return true;

    }*/

    
   
}
