<?php
use App\Http\Controllers\MailController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
    
Route::get('user/email-verify', [MailController::class,'sendVerifyEmail'])->name('user.email-send.verification');

Route::get('/email/verify/{id}/{hash}', [MailController::class,'verifyEmail'])
    ->name('verification.verify');
 


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// Route::middleware('auth')->group(function () {
//     Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
//                 ->name('verification.notice');

//     Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
//                 ->middleware(['signed', 'throttle:6,1'])
//                 ->name('verification.verify');

//     Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//                 ->middleware('throttle:6,1')
//                 ->name('verification.send');
// });