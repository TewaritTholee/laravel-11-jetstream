<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRegister extends Model
{
    use HasFactory;

    protected $table = 'Data_Registers'; // ชื่อตารางในฐานข้อมูล
    protected $primaryKey = 'id'; // ชื่อ primary key

    // ถ้าต้องการให้ใช้งาน timestamp fields
    public $timestamps = true;

    // กำหนด attributes ที่จะ fill ได้
    protected $fillable = [
        'Status_regis',
        'Flag_regis',
        'Name_regis',
        'IDUse_regis',
        'Phone_regis',
        'Address_regis',
        'Regno_regis',
        'Type_regis',
        'IDTank_regis',
        'STRNO_regis',
        'BrandCar_regis',
        'ModelCar_regis',
        'YearCar_regis',
        'ColourCar_regis',
        'DateCus_regis',
        'Community_regis',
        'Notes_regis',
        'CheckBooks_regis',
        'CheckKeys_regis',
        'CheckReceipt_regis',
        'DateInsurance_regis',
        'DateLastInsur',
        'DateAct_regis',
        'DateLastAct',
        'DateRegister_regis',
        'DateTransferOut_regis',
        'DateLastRegist',
        'UserInsert'
    ];
}
