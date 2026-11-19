<?php
namespace App\DTO;

class UserListDTO
{
    public function __construct(
        public readonly ?string $firstname,
        public readonly ?string $lastname,
        public readonly ?string $email
    ){}
}

