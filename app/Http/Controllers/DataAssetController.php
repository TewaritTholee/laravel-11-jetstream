<?php

namespace App\Http\Controllers;

use App\Models\DataAsset;
use Illuminate\Http\Request;
use Phattarachai\FilamentThaiDatePicker;


class DataAssetController extends Controller
{
    public function index()
    {
        $dataAssets = DataAsset::all();
        return view('data_assets.index', compact('dataAssets'));
    }


    public function fetchData()
    {
        $dataAssets = DataAsset::all();
        return response()->json($dataAssets);
    }


    public function update(Request $request, $id)
    {
        // Validate incoming request data
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

        // Find and update the data asset
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


    public function destroy($id)
    {
        // ตรวจสอบว่าค่าของ $id เป็นตัวเลขหรือไม่
        if (!is_numeric($id)) {
            return response()->json(['success' => false, 'message' => 'Invalid ID'], 400);
        }

        // ค้นหาข้อมูลตาม ID
        $asset = DataAsset::find($id);

        if ($asset) {
            $asset->delete();
            return response()->json(['success' => true, 'message' => 'Asset deleted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Asset not found'], 404);
        }
    }

    public function show($id)
    {
        $asset = DataAsset::find($id);

        // Check if asset exists
        if (!$asset) {
            return redirect()->back()->with('error', 'Asset not found.');
        }

        return view('data_assets.index', compact('asset')); // Use the correct variable name
    }



    // public function show($id)
    // {
    //     $asset = DataAsset::find($id);

    //     if ($asset) {
    //         return response()->json([
    //             'success' => true,
    //             'asset' => $asset
    //         ]);
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Asset not found'
    //         ]);
    //     }
    // }


    // public function show($id)
    // {
    //     // ตรวจสอบว่าค่าของ $id เป็นตัวเลขหรือไม่
    //     if (!is_numeric($id)) {
    //         return response()->json(['success' => false, 'message' => 'Invalid ID'], 400);
    //     }

    //     // ค้นหาข้อมูลตาม ID
    //     $dataAsset = DataAsset::find($id);

    //     if ($dataAsset) {
    //         return response()->json(['success' => true, 'data' => $dataAsset]);
    //     } else {
    //         return response()->json(['success' => false, 'message' => 'Data asset not found'], 404);
    //     }
    // }

    // public function show($id)
    // {
    //     // ตรวจสอบว่าค่าของ $id เป็นตัวเลขหรือไม่
    //     if (!is_numeric($id)) {
    //         return response()->json(['success' => false, 'message' => 'Invalid ID'], 400);
    //     }

    //     // ค้นหาข้อมูลตาม ID
    //     $dataAsset = DataAsset::find($id);

    //     if ($dataAsset) {
    //         return response()->json(['success' => true, 'data' => $dataAsset]);
    //     } else {
    //         return response()->json(['success' => false, 'message' => 'Data asset not found'], 404);
    //     }
    // }






































// public function fetchData(Request $request)
    // {
    //     // รับค่าพารามิเตอร์การค้นหาจาก request
    //     $nameCustomer = $request->input('Name_Customer', '');
    //     $vehicleID = $request->input('VehicleID', '');
    //     $licensePlate = $request->input('LicensePlate', '');
    //     $make = $request->input('Make', '');
    //     $model = $request->input('Model', '');
    //     $yearOfManufacture = $request->input('YearOfManufacture', '');

    //     // ดึงข้อมูลจากฐานข้อมูลเรียงลำดับตามฟิลด์ id ในรูปแบบ DESC
    //     $query = DataAsset::orderBy('id', 'desc');

    //     // ค้นหาข้อมูลตามพารามิเตอร์ที่ระบุ
    //     if ($nameCustomer) {
    //         $query->where('Name_Customer', 'like', '%' . $nameCustomer . '%');
    //     }

    //     if ($vehicleID) {
    //         $query->where('VehicleID', 'like', '%' . $vehicleID . '%');
    //     }

    //     if ($licensePlate) {
    //         $query->where('LicensePlate', 'like', '%' . $licensePlate . '%');
    //     }

    //     if ($make) {
    //         $query->where('Make', 'like', '%' . $make . '%');
    //     }

    //     if ($model) {
    //         $query->where('Model', 'like', '%' . $model . '%');
    //     }

    //     if ($yearOfManufacture) {
    //         $query->where('YearOfManufacture', $yearOfManufacture);
    //     }

    //     // ดึงข้อมูลตามพารามิเตอร์การค้นหา
    //     $dataAssets = $query->get();

    //     // แปลง id ให้เรียงลำดับใหม่ตั้งแต่ 1, 2, 3, 4...
    //     $dataAssets = $dataAssets->map(function($item, $index) {
    //         $item->id = $index + 1; // กำหนด id ใหม่เป็นเลขลำดับอัตโนมัติ
    //         return $item;
    //     });

    //     return response()->json($dataAssets);
    // }


    // public function fetchData()
    // {
    //     // ดึงข้อมูลจากฐานข้อมูลเรียงลำดับตามฟิลด์ id ในรูปแบบ DESC
    //     $dataAssets = DataAsset::orderBy('id', 'desc')->get();

    //     // แปลง id ให้เรียงลำดับใหม่ตั้งแต่ 1, 2, 3, 4...
    //     $dataAssets = $dataAssets->map(function($item, $index) {
    //         $item->id = $index + 1; // กำหนด id ใหม่เป็นเลขลำดับอัตโนมัติ
    //         return $item;
    //     });

    //     return response()->json($dataAssets);
    // }



    // public function fetchData(Request $request)
    // {
    //     $rowPerPage = $request->input('rowPerPage', 10); // กำหนดค่าเริ่มต้นคือ 10
    //     $dataAssets = DataAsset::orderBy('id', 'desc')->paginate($rowPerPage);

    //     return response()->json($dataAssets);
    // }






// public function fetchData()
    // {
    //     $dataAssets = DataAsset::all();
    //     return response()->json($dataAssets);
    // }




    // public function fetchData()
    // {
    //     // ใช้ orderBy เพื่อเรียงลำดับข้อมูลตามฟิลด์ created_at ในรูปแบบ DESC
    //     $dataAssets = DataAsset::orderBy('id', 'desc')->get();
    //     return response()->json($dataAssets);
    // }



    // public function fetchData(Request $request)
    // {
    //     // แถวเริ่มต้นต่อหน้า
    //     $rowPerPage = $request->get('rowPerPage', 10);

    //     // ตรวจสอบความถูกต้องของ rowPerPage เพื่อให้แน่ใจว่าตรงกับตัวเลือกที่มีอยู่ (10, 20, 50, 100)
    //     $allowedPerPage = [10, 20, 50, 100];
    //     if (!in_array($rowPerPage, $allowedPerPage)) {
    //         $rowPerPage = 10;
    //     }

    //     // ดึงข้อมูลที่มีการแบ่งหน้าและจำกัดได้สูงสุด 5 เรคคอร์ด
    //     $dataAssets = DataAsset::limit(5)->paginate($rowPerPage);

    //     return response()->json($dataAssets);
    // }









    // public function show($id)
    // {
    //     // ตรวจสอบว่าค่าของ $id เป็นตัวเลขหรือไม่
    //     if (!is_numeric($id)) {
    //         return response()->json(['success' => false, 'message' => 'Invalid ID'], 400);
    //     }

    //     // ค้นหาข้อมูลตาม ID
    //     $dataAsset = DataAsset::find($id);

    //     if ($dataAsset) {
    //         return response()->json(['success' => true, 'data' => $dataAsset]);
    //     } else {
    //         return response()->json(['success' => false, 'message' => 'Data asset not found'], 404);
    //     }
    // }





























    // public function index(Request $request)
    // {
    //     $query = DataAsset::query();

    //     if ($request->has('search') && !empty($request->get('search'))) {
    //         $search = $request->get('search');
    //         $query->where('Name_Customer', 'LIKE', "%{$search}%")
    //             ->orWhere('VehicleID', 'LIKE', "%{$search}%")
    //             // เพิ่มเงื่อนไขค้นหาเพิ่มเติมตามต้องการ
    //             ;
    //     }

    //     $dataAssets = $query->get();

    //     return view('Data_Asset.index', compact('dataAssets'));
    // }


    // public function show($id)
    // {
    //     $asset = DataAsset::find($id);

    //     if (!$asset) {
    //         return response()->json(['message' => 'Asset not found'], 404);
    //     }

    //     return response()->json($asset);
    // }




    // public function destroy($id)
    // {
    //     // ตรวจสอบว่าค่าของ $id เป็นตัวเลขหรือไม่
    //     if (!is_numeric($id)) {
    //         return response()->json(['success' => false, 'message' => 'Invalid ID'], 400);
    //     }

    //     // ค้นหาข้อมูลตาม ID
    //     $asset = DataAsset::find($id);

    //     if ($asset) {
    //         $asset->delete();
    //         return response()->json(['success' => true, 'message' => 'Asset deleted successfully']);
    //     } else {
    //         return response()->json(['success' => false, 'message' => 'Asset not found'], 404);
    //     }
    // }


    // public function destroy($id)
    // {
    //     // ค้นหา asset ตาม id ที่ได้รับมา
    //     $asset = DataAsset::find($id);

    //     // ตรวจสอบว่ามีข้อมูลสินทรัพย์หรือไม่
    //     if ($asset) {
    //         $asset->delete();
    //         return response()->json(['success' => true, 'message' => 'Asset deleted successfully']);
    //     } else {
    //         return response()->json(['success' => false, 'message' => 'Asset not found'], 404);
    //     }
    // }



    // public function destroy($id)
    // {
    //     // ตรวจสอบว่าตัวแปร $id เป็นตัวเลข
    //     if (!is_numeric($id)) {
    //         return response()->json(['error' => 'Invalid ID'], 400);
    //     }

    //     // ดึงข้อมูลสินทรัพย์จากฐานข้อมูล
    //     $asset = DataAsset::findOrFail($id);

    //     // ลบข้อมูลสินทรัพย์
    //     $asset->delete();

    //     return response()->json(['success' => 'Asset deleted successfully']);
    // }



























    // public function destroy($id)
    // {
    //     $dataAsset = DataAsset::find($id);

    //     if ($dataAsset) {
    //         $dataAsset->delete();
    //         return response()->json(['success' => true, 'message' => 'ลบข้อมูลสำเร็จ']);
    //     }

    //     return response()->json(['success' => false, 'message' => 'ไม่พบข้อมูล'], 404);
    // }

    // public function show($id)
    // {
    //     // ดึงข้อมูลสินทรัพย์จากฐานข้อมูลโดยใช้ $id
    //     $asset = DataAsset::findOrFail($id);

    //     // ส่งข้อมูลสินทรัพย์ไปยัง view ที่ต้องการ (ถ้ามี)
    //     return view('data_assets.show', compact('asset'));
    // }

























// public function update(Request $request, $id)
    // {
    //     // $data = $request->validate([
    //     //     'Name_Customer' => 'required|string|max:255',
    //     //     'VehicleID' => 'required|string|max:255',
    //     //     'Make' => 'required|string|max:255',
    //     //     'LicensePlate' => 'required|string|max:255',
    //     //     'Model' => 'required|string|max:255',
    //     //     'YearOfManufacture' => 'required|integer',
    //     // ]);

    //     $data = $request->validate([
    //         'Name_Customer' => 'required|string|max:255',
    //         'VehicleID' => 'required|string|max:255',
    //         'LicensePlate' => 'required|string|max:255',
    //         'Make' => 'required|string|max:255',
    //         'Model' => 'required|string|max:255',
    //         'YearOfManufacture' => 'required|integer',
    //         'Color' => 'nullable|string|max:255',
    //         'VIN' => 'nullable|string|max:255',
    //         'EngineNumber' => 'nullable|string|max:255',
    //         'VehicleType' => 'nullable|string|max:255',
    //         'EngineSize' => 'nullable|string|max:255',
    //         'SeatingCapacity' => 'nullable|integer',
    //         'InsuranceStatus' => 'nullable|string|max:255',
    //         'MaintenanceHistory' => 'nullable|string|max:255',
    //         'Mileage' => 'nullable|integer',
    //         'InspectionStatus' => 'nullable|string|max:255',
    //     ]);

    //     $dataAsset = DataAsset::find($id);
    //     if ($dataAsset) {
    //         $dataAsset->update($data);
    //         return response()->json(['success' => true, 'message' => 'อัปเดตข้อมูลสำเร็จ']);
    //     }
    //     return response()->json(['success' => false, 'message' => 'ไม่พบข้อมูล'], 404);
    // }



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
