<?php
namespace App\Service\Category;
interface ICategoryService {
    public function Create($request);
    public function GetAll();
    public function GetPaging($limit);
    public function Delete($id);
}