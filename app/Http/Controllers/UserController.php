<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Hash;  // นำ Hash มาใช้งาน
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::latest()->paginate(5);

        return view('users.index', compact('users')) ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request): RedirectResponse
    {
        User::create($request->validated());

        return redirect()->route('users.index')  ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        // ตรวจสอบข้อมูลที่ส่งมาเพื่อดูว่ามีอะไรขาดหายหรือไม่
        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'username' => 'required|unique:users,username,' . $user->id,
            'password' => 'nullable|confirmed|min:8',
        ]);

        // อัปเดตข้อมูลผู้ใช้
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;

        // อัปเดตรหัสผ่านถ้าส่งมา
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index') ->with('success', 'User deleted successfully');
    }
}






    /**
     * Update the specified resource in storage.
     */
    // public function update(UserUpdateRequest $request, User $user): RedirectResponse
    // {
    //     $user->update($request->validated());

    //     return redirect()->route('users.index') ->with('success', 'User updated successfully');
    // }

    // UserController.php
    // public function update(UserUpdateRequest $request, User $user): RedirectResponse
    // {
    //     // dd($user, $request->all()); // Check if $user is correctly populated

    //     try {
    //         $user->update($request->validated());
    //         return redirect()->route('users.index')->with('success', 'User updated successfully');
    //     } catch (\Exception $e) {
    //         // Log the error and/or handle the exception
    //         \Log::error($e->getMessage());
    //         return redirect()->route('users.index')->with('error', 'Failed to update user');
    //     }
    // }
