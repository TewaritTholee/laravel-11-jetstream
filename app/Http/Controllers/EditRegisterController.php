<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataRegister;
use Yajra\DataTables\Facades\DataTables;

class EditRegisterController extends Controller
{
    public function index()
    {
        return view('register.edit-register');
    }

    public function getDataRegisters()
    {
        return response()->json(DataTables::of(DataRegister::query())
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="editDataRegister btn btn-primary btn-sm">Edit</a>';
            $btn .= ' <a href="javascript:void(0)" data-id="'.$row->id.'" class="deleteDataRegister btn btn-danger btn-sm">Delete</a>';
            $btn .= ' <a href="javascript:void(0)" data-id="'.$row->id.'" class="showDataRegister btn btn-info btn-sm">Show</a>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true));
    }

    public function store(Request $request)
    {
        DataRegister::updateOrCreate(
            ['id' => $request->data_register_id],
            [
                'Name_regis' => $request->Name_regis,
                'Phone_regis' => $request->Phone_regis
            ]
        );

        return response()->json(['success' => 'Data saved successfully!']);
    }

    public function edit($id)
    {
        $register = DataRegister::find($id);
        return response()->json($register);
    }

    public function destroy($id)
    {
        DataRegister::find($id)->delete();
        return response()->json(['success' => 'Data deleted successfully!']);
    }
}

