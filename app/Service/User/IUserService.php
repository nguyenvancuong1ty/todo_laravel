<?php
namespace App\Service\User;
interface IUserService {
    public function Register($data);
    public function Login($data);
    public function GetAll();
    public function Logout();
}
