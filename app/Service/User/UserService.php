<?php
namespace App\Service\User;
use App\Service\User\IUserService;
use App\Models\User;
use App\Enums\SexEnum;
use Carbon\Carbon;

class UserService implements IUserService {
    public function Register($request) {
        $validated = $request->validated();
        $newUser = new User();
        $newUser->name = $validated["name"];
        $newUser->email = $validated["email"];
        $newUser->birthday = Carbon::parse($validated["birthday"])->toDateTimeString();
        $newUser->password = $validated["password"];
        $newUser->country = $validated["country"];
        $newUser->city = $validated["city"];
        $newUser->district = $validated["city"];
        $sexValue = strtolower($validated["sex"]);
        $newUser->sex = SexEnum::from($sexValue)->value;
        $newUser->address = $validated["city"]."-".$validated["country"];
        $newUser->save();
    }

    public function GetAll() {
        $users = User::all();
        return $users;
    }
}