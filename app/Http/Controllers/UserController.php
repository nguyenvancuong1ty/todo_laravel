<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\user\RegisterRequest;

use App\Service\User\IUserService;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
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
}
