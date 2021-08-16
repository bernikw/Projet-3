<?php 

declare(strict_types=1);

namespace App\Service\FormValidator;


class FormValidator 
{


    public static function clean($data) {

        if ((isset($data) && ($data !='') && strlen($data < 255)){

            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data, ENT_QUOTES, 'UTF8');

            return $data;   
        }
       
      }

    public static function cleanContent($data){

        if (isset($data) && ($data !='')){

            return $data; 
        }
    }

    public static function checkName($value){

        if (!preg_match("/^[a-zA-Z-' ]*$/", $value) && !empty($value){

            return true;
        } 


    }


    public static function checkEmail($value){

        if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($value)) {
            return true; 
        }
      }

}