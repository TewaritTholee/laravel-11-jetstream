<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // แสดงรายการผู้ใช้ทั้งหมด
    public function index()
    {
        $users = User::all();  // ดึงข้อมูลผู้ใช้ทั้งหมดจากฐานข้อมูล
        return view('users.index', compact('users'));  // ส่งข้อมูลไปยัง view
    }
    // แสดงฟอร์มสำหรับสร้างผู้ใช้ใหม่
    public function create()
    {
        return view('users.create');
    }

    // บันทึกข้อมูลผู้ใช้ใหม่
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'username' => 'required|unique:users',
    //         'password' => 'nullable|confirmed|min:8',  // รหัสผ่านไม่จำเป็นต้องกรอกหากไม่เปลี่ยน
    //     ]);

    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'username' => $request->username,
    //         'password' => Hash::make($request->password),
    //         'branch' => $request->branch,
    //         'type' => $request->type,
    //         'position' => $request->position,
    //         'status' => $request->status,
    //     ]);

    //     return redirect()->route('users.index')->with('success', 'User created successfully.');
    // }

    public function update(Request $request, User $user)
    {
        // ตรวจสอบข้อมูลที่ส่งมาเพื่อดูว่ามีอะไรขาดหายหรือไม่
        dd($request->all());

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


    // แสดงรายละเอียดผู้ใช้
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // แสดงฟอร์มแก้ไขผู้ใช้
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // อัปเดตข้อมูลผู้ใช้
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'username' => 'required|unique:users,username,' . $user->id,
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // ลบผู้ใช้
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}

