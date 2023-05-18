<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;



class AuthController extends Controller
{

    public function userLoginView()
    {
        return view('auth.login');
    }
    public function userRegisterView()
    {
        return view('auth.register');
    }

    public function userLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $user = User::where('email', $request->email)->first();


        if ($user) {

            if($user->email_verified_at == null){
                return $this->respondWithErrorWeb('Please verify your email first',null,'danger');
            }

            if($user->status == 'deactive'){
                return $this->respondWithErrorWeb('Your account is deactive. Please contact to admin.',null,'danger');
            }
            if($user->status == 'pending'){
                return $this->respondWithErrorWeb('Your account is pending, please contact to admin', null, 'info');
            }
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                $role = Auth::user()->roles[0]->name;
                if ($role == 'user') {
                    return $this->respondWithSuccessWeb('Login Successfully', redirect()->route('user.home'),'success');
                } else {
                    return $this->respondWithSuccessWeb('Login Successfully', redirect()->route('user.dashboard'));
                }
            } else {
                return $this->respondWithErrorWeb('Invalid credentials',null, 'danger');
            }
        } else {
            return $this->respondWithErrorWeb('User not found',null, 'danger');
        }
    }

    function userRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return $this->respondWithErrorWeb($validator->errors());
        }
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user->assignRole('user');
            $token = $user->createToken('MyApp')->accessToken;
            event(new Registered($user));
            return $this->respondWithSuccessWeb('User created successfully', redirect()->route('user.email-send.verification'),'success');
        } catch (\Exception $e) {
            return $this->respondWithErrorWeb($e->getMessage());
        }
    }


    public function userLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
