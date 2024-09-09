<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);

        $credentials = $this->credentials($request);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // ตรวจสอบสถานะของผู้ใช้
            if ($user->stastus === 'yes') {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard'); // เปลี่ยนเส้นทางที่คุณต้องการที่นี่
            } else {
                Auth::logout();
                return back()->withErrors([
                    'login' => 'บัญชีของคุณยังไม่อนุมัติ',
                ]);
            }
        }

        throw ValidationException::withMessages([
            'login' => 'ข้อมูลประจำตัวที่ให้ไว้ ไม่ตรงกับที่บันทึกในระบบ',
        ]);
    }



    protected function credentials(Request $request)
    {
        $login = $request->input('login');

        // ตรวจสอบว่าข้อมูลเข้าสู่ระบบเป็นอีเมลหรือชื่อผู้ใช้
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            return ['email' => $login, 'password' => $request->input('password')];
        }

        return ['username' => $login, 'password' => $request->input('password')];
    }
}







    // โค้ด Original
    
    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'login' => ['required'],
    //         'password' => ['required'],
    //     ]);

    //     $credentials = $this->credentials($request);

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('/dashboard'); // เปลี่ยนเส้นทางที่คุณต้องการที่นี่
    //     }

    //     throw ValidationException::withMessages([
    //         'login' => 'ข้อมูลประจำตัวที่ให้ไว้ ไม่ตรงกับที่บันทึกในระบบ',
    //     ]);
    // }
