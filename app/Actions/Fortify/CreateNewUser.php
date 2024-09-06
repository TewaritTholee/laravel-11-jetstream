<?php

namespace App\Actions\Fortify;

use App\Models\User;
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
     */


     public function create(array $input): User
     {
         Validator::make($input, [
             'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'username' => ['required', 'string', 'max:255', 'unique:users'],
             'password' => $this->passwordRules(),
             'branch' => ['nullable', 'string', 'max:255'], // กำหนดฟิลด์ branch
             'type' => ['nullable', 'string', 'max:255'], // กำหนดฟิลด์ type
             'position' => ['nullable', 'string', 'max:255'], // กำหนดฟิลด์ position
             'stastus' => ['nullable', 'string', 'max:255'], // กำหนดฟิลด์ status
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
             'stastus' => $input['stastus'],
         ]);
     }
}











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
