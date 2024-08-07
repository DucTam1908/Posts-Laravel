<?php

namespace App\Http\Controllers\Auth;

use App\Mail\resetPass;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class ForgotPasswordController extends Controller
{
    public function ShowFromForgot() {
        return view("Auth.ForgotPassword");
    }
    public function SendEmailPasss(Request $request) {
        $request->validate(["email" => "required|email"]);
        $user = User::where("email", $request->email)->first();

        if (empty($user)) {
            return redirect()->back()->with('msg', $request->email . ' Email này chưa được đăng ký trong hệ thống');
        }

        $token = Str::random(10);
        DB::table('password_reset_tokens')->updateOrInsert(['email' => $request->email], [
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]);

        Mail::to($request->email)->send(new resetPass($user, $token));
        return redirect()->back() -> with('msg' , 'Vui lòng check Email để lấy lại mật khẩu ');

    }
}
