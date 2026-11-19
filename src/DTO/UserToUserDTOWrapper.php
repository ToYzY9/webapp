<?php

namespace App\DTO;

use App\Entity\User;
use App\DTO\UserListDTO;
final class UserToUserDTOWrapper
{
    static function wrapUserToUserListDot(User $user): UserListDTO
    {
        return new UserListDTO(
            $user->getFirstname(),
            $user->getFirstname(),
            $user->getEmail(),
        );
    }
}

