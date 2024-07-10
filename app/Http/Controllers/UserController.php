<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Requests\user\RegisterRequest;

use App\Service\User\IUserService;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected  $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->GetAll();
        return view("user/index", ['users'=> $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getLogin()
    {
        return view('user/login');
    }

    public function postLogin(LoginRequest $request)
    {
        $data = $this->userService->Login($request);
        if(!$data) {
            session()->flash('error', 'Email or password incorrect!');
            return redirect()->back();
        }
        Cookie::queue('jwt_token', $data, 60);
        session()->flash('success', 'Login success...');
        return redirect('/cg/category');
    }

    public function getRegister()
    {
        return view("user/register");
    }

    public function postRegister(RegisterRequest $request)
    {
        $this->userService->Register($request);
        return redirect('/auth/user/all');
    }
    

    public function postLogout() {
        $this->userService->Logout();    
        session()->flash('success', "Logout success"); 
        return redirect('/auth/login');
    }
}
