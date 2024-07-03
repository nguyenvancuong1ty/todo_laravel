<?php
namespace App\Service\Post;
interface IPostService {
    public function Create($request);
    public function GetAll();
    public function GetPaging( $status);
}