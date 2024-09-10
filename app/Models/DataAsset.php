<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAsset extends Model
{
    use HasFactory;

    // ชื่อของตารางในฐานข้อมูล
    protected $table = 'Data_Assets';

    // กำหนดว่าไม่ใช้การจัดการกับ timestamp (created_at, updated_at)
    public $timestamps = false;

    // กำหนดฟิลด์ที่สามารถมอบค่าได้ (mass assignable)
    protected $fillable = [
        'Name_Customer',
        'VehicleID',
        'LicensePlate',
        'Make',
        'Model',
        'YearOfManufacture',
        'Color',
        'VIN',
        'EngineNumber',
        'VehicleType',
        'EngineSize',
        'SeatingCapacity',
        'InsuranceStatus',
        'MaintenanceHistory',
        'Mileage',
        'InspectionStatus'
    ];

    // กำหนดชนิดข้อมูลของฟิลด์ (Optional)
    protected $casts = [
        'YearOfManufacture' => 'integer',
        'SeatingCapacity' => 'integer',
        'Mileage' => 'integer',
    ];
}

