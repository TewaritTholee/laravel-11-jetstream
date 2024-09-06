<?php


namespace App\Http\Controllers;

use App\Models\DataRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditRegisterController extends Controller
{

    public function index()
    {
        $dataRegisters = DataRegister::all();
        return view('register.edit-register', compact('dataRegisters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name_regis' => 'required|string|max:255',
            'Phone_regis' => 'required|string|max:20',
            // กำหนด validation อื่นๆ ตามที่ต้องการ
        ]);

        $dataRegister = DataRegister::create($request->all());

        return response()->json($dataRegister);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Name_regis' => 'required|string|max:255',
            'Phone_regis' => 'required|string|max:20',
            // กำหนด validation อื่นๆ ตามที่ต้องการ
        ]);

        $dataRegister = DataRegister::findOrFail($id);
        $dataRegister->update($request->all());

        return response()->json($dataRegister);
    }

    public function destroy($id)
    {
        $dataRegister = DataRegister::findOrFail($id);
        $dataRegister->delete();

        return response()->json(['success' => 'Record deleted successfully.']);
    }
}












// โค้ดสำรอง
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class EditRegisterController extends Controller
// {
//     public function index()
//     {
//         return view('edit-register'); // หรือชื่อไฟล์ blade ที่ต้องการ
//     }
// }




// public function index()
    // {
    //     $dataRegisters = DataRegister::all();
    //     return view('edit-register', compact('dataRegisters'));
    // }
