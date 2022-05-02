<?php

namespace App\Http\Controllers\Web\Auth;

use App\Enums\MailEnums;
use App\Http\Controllers\Controller;
use App\Mail\SendForgotPassword;
use App\Mail\SendContactUs;
use App\Models\PasswordReset;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function validatePasswordRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:staffs,email'
        ]);

        PasswordReset::where('created_at', '>=', Carbon::now()->subMinutes(MailEnums::MINUTE_EXPIRED_TOKEN)->toDateTimeLocalString())->delete();

        //Create Password Reset Token
        $passwordResetData = PasswordReset::create([
            'email' => $request->email,
            'token' => $this->generateToken(),
            'created_at' => Carbon::now()->toDateTimeLocalString()
        ]);

        //Get the token just created above
        $tokenData = PasswordReset::where('email', $request->email)
            ->where('token', $passwordResetData->token)->first();

        if (blank($tokenData)) {
            return redirect()->back()->withErrors(['sendmail' => trans('Database Error occurred. Please try again.')]);
        }

        if ($this->sendResetEmail($request, $tokenData)) {
            return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
        } else {
            PasswordReset::where('email', $passwordResetData->email)->delete();
            return redirect()->back()->withErrors(['sendmail' => trans('A Network Error occurred. Please try again.')]);
        }
    }

    public function resetPassword(Request $request)
    {
        //Validate input

        $validator = $request->validate([
            'email' => 'required|email|exists:staffs,email',
            'password' => 'required|string|min:6',
            'token' => 'required|string|exists:password_resets,token',
            'password_confirmation' => 'required|string|min:6|same:password'
        ]);

        // Validate the token
        $tokenData = PasswordReset::where('token', $request->token)
            ->where('email', $request->email)
            ->where('created_at', '>=', Carbon::now()->subMinutes(MailEnums::MINUTE_EXPIRED_TOKEN)->toDateTimeLocalString())
            ->first();

        // Redirect the user back to the password reset request form if the token is invalid
        if (blank($tokenData)) {
            return redirect()->back()->withErrors(['token' => 'Token invalid']);
        }

        $staffs = Staff::where('email', $tokenData->email)->first();

        $staffs->password = \Hash::make($request->password);
        $staffs->save();

        //Delete the token
        PasswordReset::where('email', $staffs->email)->delete();

        //login the user immediately they change password successfully
        if (Auth::guard('staff')->attempt($request->only(['email', 'password']))) {
            return redirect()->route('dashboard.index');
        }

        return redirect()->route('login');
    }

    public function forgotForm()
    {
        return view('auth.passwords.forgot');
    }

    public function resetForm(Request $request)
    {
        return view('auth.passwords.reset', [
            "token" => $request->token,
            "email" => $request->email
        ]);
    }

    private function sendResetEmail($request, $tokenData)
    {
        //Retrieve the user from the database
        //$user = Staff::where('email', $email)->select(['firstname', 'email'])->first();
        //Generate, the password reset link. The token generated is embedded in the link
        $link = URL::to('/passwords/reset/?token=' . $tokenData->token . '&&email=' . urlencode($request->email));

        try {
            //Here send the link with CURL with an external email API
            Mail::send(new SendForgotPassword(["email" => $request->email, "link" => $link]));
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    private function generateToken()
    {
        // This is set in the .env file
        $key = config('app.key');
        // Illuminate\Support\Str;
        if (Str::startsWith($key, 'base64:')) {
            $key = base64_decode(substr($key, 7));
        }
        return hash_hmac('sha256', Str::random(40), $key);
    }
}
