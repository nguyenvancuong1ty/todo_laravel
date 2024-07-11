<?php
namespace App\Service\User;
use App\Service\User\IUserService;
use App\Models\User;
use App\Enums\SexEnum;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;


class UserService implements IUserService {
    public function Register($request) {
        $validated = $request->validated();
        $sexValue = strtolower($validated["sex"]);
        $newUser = User::create([
            'name' => $validated["name"],
            'email' => $validated["email"],
            'birthday' => Carbon::parse($validated["birthday"])->toDateTimeString(),
            'password' => bcrypt($validated["password"]),
            'country' => $validated["country"],
            'city' => $validated["city"],
            'district' => $validated["city"],
            'sex' => SexEnum::from($sexValue)->value,
            'address' => $validated["city"]."-".$validated["country"] || "Canada",
        ]);
        return $newUser;   
    }

    public function GetAll() {
        $users = User::all();
        return $users;
    }
    public function Login($request){
        $credentials = $request->only('email', 'password');
        $token = auth()->attempt($credentials, $request->rememberMe);
        if (!$token) {
            return false;
        }
        $request->session()->regenerate();
        return $token;
        // $validated = $request->validated();
        // $credentials = $request->only('email', 'password');
        // if (Auth::attempt($credentials)) {
        //     return true;
        // }
        // return null;
        // $user = User::where('email', '=', $validated['email'])->first();
        
        // if(!$user) {
        //     $logMessage = '[' . now()->format('Y-m-d H:i:s') . '] ';
        //     $logMessage .= 'Login attempt from ' . $request->ip() . ' to ' . $request->fullUrl() . ' using ' . $request->method();
        //     $logMessage .= ' - ERROR: User not found for email ' . $validated['email'];
        //     Log::channel('all')->error($logMessage);
        //     return null;
        // }


    }
    public function Logout()
    {
        Auth::logout();
    }
}