<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Verified;


class MailController extends Controller
{
    public function sendVerifyEmail()
    {
        return view('public.user.verify-email');
    }
    public function verifyEmail(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        if ($user->email_verified_at == null) {
            $user->email_verified_at = now();
            $user->save();
        }
         return $this->respondWithSuccessWeb('Login Successfully', redirect()->route('user.login'),'success');
    }
}
