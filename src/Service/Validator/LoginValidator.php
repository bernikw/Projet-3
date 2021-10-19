<?php

declare(strict_types=1);

namespace App\Service\Validator;
use App\Model\Repository\UserRepository;

class LoginValidator extends BaseValidator
{
    private $datas = [];
   
   
    public function isValidLoginForm(?array $infoUser, UserRepository $userRepository): bool
    {


        if ($infoUser === null) {
            return false;
        }

        $user = $userRepository->findOneBy(['email' => $infoUser['email']]);

        if ($user === null || $infoUser['password'] !== $user->getPassword()) {
            return false;
        }

        $this->session->set('user', $user);

        return true;
    }
}