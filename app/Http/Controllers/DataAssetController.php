<?php

namespace App\Http\Controllers;

use App\Models\DataAsset;
use Illuminate\Http\Request;

class DataAssetController extends Controller
{
    public function index()
    {
        $dataAssets = DataAsset::all();
        return view('Data_Asset.index', compact('dataAssets'));
    }

    public function fetchData()
    {
        $dataAssets = DataAsset::all();
        return response()->json($dataAssets);
    }


    public function update(Request $request, $id)
    {
        // $data = $request->validate([
        //     'Name_Customer' => 'required|string|max:255',
        //     'VehicleID' => 'required|string|max:255',
        //     'Make' => 'required|string|max:255',
        //     'LicensePlate' => 'required|string|max:255',
        //     'Model' => 'required|string|max:255',
        //     'YearOfManufacture' => 'required|integer',
        // ]);

        $data = $request->validate([
            'Name_Customer' => 'required|string|max:255',
            'VehicleID' => 'required|string|max:255',
            'LicensePlate' => 'required|string|max:255',
            'Make' => 'required|string|max:255',
            'Model' => 'required|string|max:255',
            'YearOfManufacture' => 'required|integer',
            'Color' => 'nullable|string|max:255',
            'VIN' => 'nullable|string|max:255',
            'EngineNumber' => 'nullable|string|max:255',
            'VehicleType' => 'nullable|string|max:255',
            'EngineSize' => 'nullable|string|max:255',
            'SeatingCapacity' => 'nullable|integer',
            'InsuranceStatus' => 'nullable|string|max:255',
            'MaintenanceHistory' => 'nullable|string|max:255',
            'Mileage' => 'nullable|integer',
            'InspectionStatus' => 'nullable|string|max:255',
        ]);

        $dataAsset = DataAsset::find($id);
        if ($dataAsset) {
            $dataAsset->update($data);
            return response()->json(['success' => true, 'message' => 'อัปเดตข้อมูลสำเร็จ']);
        }
        return response()->json(['success' => false, 'message' => 'ไม่พบข้อมูล'], 404);
    }

    public function create(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'Name_Customer' => 'required|string|max:255',
            'VehicleID' => 'required|string|max:255',
            'LicensePlate' => 'required|string|max:255',
            'Make' => 'required|string|max:255',
            'Model' => 'required|string|max:255',
            'YearOfManufacture' => 'required|integer',
            'Color' => 'nullable|string|max:255',
            'VIN' => 'nullable|string|max:255',
            'EngineNumber' => 'nullable|string|max:255',
            'VehicleType' => 'nullable|string|max:255',
            'EngineSize' => 'nullable|string|max:255',
            'SeatingCapacity' => 'nullable|integer',
            'InsuranceStatus' => 'nullable|string|max:255',
            'MaintenanceHistory' => 'nullable|string|max:255',
            'Mileage' => 'nullable|integer',
            'InspectionStatus' => 'nullable|string|max:255',
        ]);

        // Create new data asset record
        DataAsset::create([
            'Name_Customer' => $request->input('Name_Customer'),
            'VehicleID' => $request->input('VehicleID'),
            'LicensePlate' => $request->input('LicensePlate'),
            'Make' => $request->input('Make'),
            'Model' => $request->input('Model'),
            'YearOfManufacture' => $request->input('YearOfManufacture'),
            'Color' => $request->input('Color'),
            'VIN' => $request->input('VIN'),
            'EngineNumber' => $request->input('EngineNumber'),
            'VehicleType' => $request->input('VehicleType'),
            'EngineSize' => $request->input('EngineSize'),
            'SeatingCapacity' => $request->input('SeatingCapacity'),
            'InsuranceStatus' => $request->input('InsuranceStatus'),
            'MaintenanceHistory' => $request->input('MaintenanceHistory'),
            'Mileage' => $request->input('Mileage'),
            'InspectionStatus' => $request->input('InspectionStatus'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'ข้อมูลสินทรัพย์ถูกเพิ่มเรียบร้อยแล้ว!',
        ]);
    }

















    // public function update(Request $request, $id)
    // {
    //     // Validate incoming request data
    //     $data = $request->validate([
    //         'Name_Customer' => 'required|string|max:255',
    //         'VehicleID' => 'required|string|max:255',
    //         'LicensePlate' => 'required|string|max:255',
    //         'Make' => 'required|string|max:255',
    //         'Model' => 'required|string|max:255',
    //         'YearOfManufacture' => 'required|integer',
    //         'Color' => 'required|string|max:255',
    //         'VIN' => 'required|string|max:255',
    //         'EngineNumber' => 'required|string|max:255',
    //         'VehicleType' => 'required|string|max:255',
    //         'EngineSize' => 'required|string|max:255',
    //         'SeatingCapacity' => 'required|integer',
    //         'InsuranceStatus' => 'required|string|max:255',
    //         'MaintenanceHistory' => 'required|string|max:255',
    //         'Mileage' => 'required|integer',
    //         'InspectionStatus' => 'required|string|max:255',
    //     ]);

    //     // Find and update the data asset
    //     $dataAsset = DataAsset::find($id);
    //     if ($dataAsset) {
    //         $dataAsset->update($data);
    //         return response()->json(['success' => true, 'message' => 'อัปเดตข้อมูลสำเร็จ']);
    //     }

    //     return response()->json(['success' => false, 'message' => 'ไม่พบข้อมูล'], 404);
    // }



    // public function index()
    // return view('Data_Asset.index');
    // {
    //     $dataAssets = DataAsset::all();
    //     return view('data_assets.index', compact('dataAssets'));
    // }

    // public function create()
    // {
    //     return view('data_assets.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'Name_Customer' => 'required|string|max:255',
    //         'VehicleID' => 'required|string|max:255',
    //         // Validate other fields as needed
    //     ]);

    //     DataAsset::create($request->all());

    //     return redirect()->route('data_assets.index')->with('success', 'Data Asset created successfully.');
    // }

    // public function show(DataAsset $dataAsset)
    // {
    //     return view('data_assets.show', compact('dataAsset'));
    // }


    // public function edit(DataAsset $dataAsset)
    // {
    //     return view('data_assets.edit', compact('dataAsset'));
    // }

    // public function update(Request $request, DataAsset $dataAsset)
    // {
    //     $request->validate([
    //         'Name_Customer' => 'required|string|max:255',
    //         'VehicleID' => 'required|string|max:255',
    //         // Validate other fields as needed
    //     ]);

    //     $dataAsset->update($request->all());

    //     return redirect()->route('data_assets.index')->with('success', 'Data Asset updated successfully.');
    // }

    // public function destroy(DataAsset $dataAsset)
    // {
    //     $dataAsset->delete();

    //     return redirect()->route('data_assets.index')->with('success', 'Data Asset deleted successfully.');
    // }
}
