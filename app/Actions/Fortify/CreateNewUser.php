<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Http\Request;  // ใช้คลาส Request ที่ถูกต้อง
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     * @return User
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'branch' => ['nullable', 'string', 'max:255'],
            'type' => ['nullable', 'string', 'max:255'],
            'position' => ['nullable', 'string', 'max:255'],
            'stastus' => ['nullable', 'string', 'max:255'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'username' => $input['username'],
            'password' => Hash::make($input['password']),
            'branch' => $input['branch'],
            'type' => $input['type'],
            'position' => $input['position'],
            'stastus' => 'no',
        ]);

    }
}












    // ใน AuthController หรือคล้ายกัน
    // public function register(Request $request)
    // {
    //     // ตรวจสอบการลงทะเบียนและสร้างผู้ใช้
    //     $user = (new \App\Actions\Fortify\CreateNewUser)->create($request->all());

    //     // ทำการรีไดเรกต์
    //     return redirect()->route('login');
    // }


// namespace App\Actions\Fortify;

// use App\Models\User;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
// use Laravel\Fortify\Contracts\CreatesNewUsers;
// use Laravel\Jetstream\Jetstream;
// use Illuminate\Http\RedirectResponse;
// use Illuminate\Support\Facades\Redirect;

// class CreateNewUser implements CreatesNewUsers
// {
//     use PasswordValidationRules;

//     /**
//      * Validate and create a newly registered user.
//      *
//      * @param  array<string, string>  $input
//      * @return User
//      */
//     public function create(array $input): User
//     {
//         Validator::make($input, [
//             'name' => ['required', 'string', 'max:255'],
//             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//             'username' => ['required', 'string', 'max:255', 'unique:users'],
//             'password' => $this->passwordRules(),
//             'branch' => ['nullable', 'string', 'max:255'], // กำหนดฟิลด์ branch
//             'type' => ['nullable', 'string', 'max:255'], // กำหนดฟิลด์ type
//             'position' => ['nullable', 'string', 'max:255'], // กำหนดฟิลด์ position
//             'stastus' => ['nullable', 'string', 'max:255'], // กำหนดฟิลด์ status
//             'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
//         ])->validate();

//         $user = User::create([
//             'name' => $input['name'],
//             'email' => $input['email'],
//             'username' => $input['username'],
//             'password' => Hash::make($input['password']),
//             'branch' => $input['branch'],
//             'type' => $input['type'],
//             'position' => $input['position'],
//             'stastus' => 'no', // ตั้งค่า status เป็น 'no'
//         ]);

//         return redirect()->route('login');

//     }
// }










// namespace App\Actions\Fortify;

// use App\Models\User;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
// use Laravel\Fortify\Contracts\CreatesNewUsers;
// use Laravel\Jetstream\Jetstream;

// class CreateNewUser implements CreatesNewUsers
// {
//     use PasswordValidationRules;

//     /**
//      * Validate and create a newly registered user.
//      *
//      * @param  array<string, string>  $input
//      */


//      public function create(array $input): User
//      {
//          Validator::make($input, [
//              'name' => ['required', 'string', 'max:255'],
//              'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//              'username' => ['required', 'string', 'max:255', 'unique:users'],
//              'password' => $this->passwordRules(),
//              'branch' => ['nullable', 'string', 'max:255'], // กำหนดฟิลด์ branch
//              'type' => ['nullable', 'string', 'max:255'], // กำหนดฟิลด์ type
//              'position' => ['nullable', 'string', 'max:255'], // กำหนดฟิลด์ position
//              'stastus' => ['nullable', 'string', 'max:255'], // กำหนดฟิลด์ status
//              'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
//          ])->validate();

//          return User::create([
//              'name' => $input['name'],
//              'email' => $input['email'],
//              'username' => $input['username'],
//              'password' => Hash::make($input['password']),
//              'branch' => $input['branch'],
//              'type' => $input['type'],
//              'position' => $input['position'],
//              'stastus' => $input['stastus'],
//          ]);
//      }
// }











    // โค้ดสำรอง

    // ใน `CreateNewUser.php`
    // public function create(array $input): User
    // {
    //     Validator::make($input, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'username' => ['required', 'string', 'max:255', 'unique:users'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => $this->passwordRules(),
    //         'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
    //     ])->validate();

    //     return User::create([
    //         'name' => $input['name'],
    //         'username' => $input['username'],
    //         'email' => $input['email'],
    //         'password' => Hash::make($input['password']),
    //     ]);
    // }



    // public function create(array $input): User
    // {
    //     Validator::make($input, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => $this->passwordRules(),
    //         'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
    //     ])->validate();

    //     return User::create([
    //         'name' => $input['name'],
    //         'email' => $input['email'],
    //         'password' => Hash::make($input['password']),
    //     ]);
    // }



    // public function store(Request $request)
    // {
    //     // เรียกใช้ฟังก์ชัน create() เพื่อสร้างผู้ใช้ใหม่
    //     $user = $this->create($request->all());

    //     // ตรวจสอบค่า stastus ว่าคือ 'no' หรือไม่
    //     if ($user->stastus === 'no') {
    //         // ถ้า stastus เป็น 'no' ให้ redirect ไปที่หน้า login
    //         return redirect()->route('login')->with('status', 'Please log in to continue.');
    //     }

    //     // ตรวจสอบค่า stastus ว่าคือ 'yes' หรือไม่
    //     if ($user->stastus === 'yes') {
    //         // ถ้า stastus เป็น 'yes' ให้ redirect ไปที่หน้า dashboard
    //         return redirect()->route('dashboard')->with('status', 'Welcome to your dashboard!');
    //     }

    //     // กรณีอื่น ๆ สามารถจัดการได้ที่นี่ เช่น ค่า stastus ไม่ตรงกับที่ต้องการ
    //     return redirect()->route('login')->with('status', 'Invalid status.');
    // }



    // public function authenticated(Request $request, $user)
    // {
    //     // ตรวจสอบสถานะของผู้ใช้
    //     if ($user->stastus === 'no') {
    //         // ถ้า stastus เป็น 'no' ให้ redirect ไปหน้า login
    //         return redirect()->route('login')->with('status', 'Your account is not activated.');
    //     }

    //     if ($user->stastus === 'yes') {
    //         // ถ้า stastus เป็น 'yes' ให้ redirect ไปหน้า dashboard
    //         return redirect()->route('dashboard')->with('status', 'Welcome to the dashboard!');
    //     }

    //     // กรณีอื่นๆ สามารถจัดการได้เช่นกัน
    //     return redirect()->route('login')->with('status', 'Invalid status.');
    // }
