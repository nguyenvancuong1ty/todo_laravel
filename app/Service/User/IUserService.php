<?php
namespace App\Service\User;
interface IUserService {
    public function Register($data);
    public function GetAll();
}