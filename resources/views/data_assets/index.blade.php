<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ข้อมูลสินทรัพย์ (Data Asset)</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    {{-- Font Thai --}}
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">

    {{-- CDN Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
</head>

<body>
    <div class="container-fluid">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><i class="fas fa-box-open"></i> ข้อมูลสินทรัพย์</h2>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end align-items-center">
                            <input type="text" class="form-control" id="searchAsset" placeholder="ค้นหาข้อมูลสินทรัพย์" style="max-width: 200px; height: 35px;">

                            <a href="#addEmployeeModal" class="btn btn-success ml-2" data-toggle="modal">
                                <i class="material-icons">&#xE147;</i> <span>เพิ่มข้อมูลสินทรัพย์</span>
                            </a>
                        </div>
                    </div>
                </div>



                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dataAssetModal" onclick="fetchData(1)">Show Data Asset</button> --}}


                <!-- Modal -->
                {{-- <div class="modal fade" id="dataAssetModal" tabindex="-1" role="dialog" aria-labelledby="dataAssetModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="dataAssetModalLabel">Data Asset Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <pre id="modalContent">Loading...</pre>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    async function fetchData(id) {
                        try {
                            const response = await fetch(`/api/data-asset/${id}`);
                            const result = await response.json();
                            if (result.success) {
                                // Display data in modal
                                document.getElementById('modalContent').textContent = JSON.stringify(result.data, null, 2);
                            } else {
                                document.getElementById('modalContent').textContent = `Error: ${result.message}`;
                            }
                        } catch (error) {
                            document.getElementById('modalContent').textContent = `Error: ${error.message}`;
                        }
                    }

                    async function fetchData(id) {
                        try {
                            const response = await fetch(`/api/data-asset/${id}`);
                            const contentType = response.headers.get("content-type");

                            if (contentType && contentType.includes("application/json")) {
                                const result = await response.json();
                                if (result.success) {
                                    // Display data in modal
                                    document.getElementById('modalContent').textContent = JSON.stringify(result.data, null, 2);
                                } else {
                                    document.getElementById('modalContent').textContent = `Error: ${result.message}`;
                                }
                            } else {
                                document.getElementById('modalContent').textContent = `Unexpected response format: ${await response.text()}`;
                            }
                        } catch (error) {
                            document.getElementById('modalContent').textContent = `Error: ${error.message}`;
                        }
                    }

                </script> --}}

                {{-- ///////////////////////////////////////// --}}


                <table class="table table-striped table-hover" id="data-asset-table">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <div class="mb-3">
                                <label for="rowPerPage" class="form-label">แสดงผลต่อหน้า:</label>
                                <select id="rowPerPage" class="form-select">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>


                            <th>ID</th>
                            <th>ชื่อ - นามสกุลลูกค้า</th>
                            <th>รหัสสินทรัพย์</th>
                            <th>ยี่ห้อ</th>
                            <th>หมายเลขทะเบียน</th>
                            <th>รุ่น</th>
                            <th>สี</th>
                            <th>ปีที่ผลิต</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- ข้อมูลจะถูกแทรกที่นี่โดย JavaScript -->
                    </tbody>
                </table>

                </table>
                <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>



    <!-- Add Asset Modal -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addForm">
                    <div class="modal-header">
                        <h4 class="modal-title">เพิ่มข้อมูลสินทรัพย์</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Name Customer) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addNameCustomer">ชื่อ - นามสกุล</label>
                                <input class="form-control" id="addNameCustomer" type="text" placeholder="กรุณาใส่ ชื่อ - นามสกุล" required>
                            </div>
                            <!-- Form Group (Vehicle ID) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addVehicleID">รหัสสินทรัพย์</label>
                                <input class="form-control" id="addVehicleID" type="text" placeholder="กรุณาใส่รหัสสินทรัพย์" required>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (License Plate) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addLicensePlate">หมายเลขทะเบียน</label>
                                <input class="form-control" id="addLicensePlate" type="text" placeholder="กรุณาใส่หมายเลขทะเบียน" required>
                            </div>
                            <!-- Form Group (Make) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addMake">ยี่ห้อ</label>
                                <input class="form-control" id="addMake" type="text" placeholder="กรุณาใส่ยี่ห้อ" required>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Model) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addModel">รุ่น</label>
                                <input class="form-control" id="addModel" type="text" placeholder="กรุณาใส่รุ่น" required>
                            </div>
                            <!-- Form Group (Year Of Manufacture) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addYearOfManufacture">ปีที่ผลิต</label>
                                <input class="form-control" id="addYearOfManufacture" type="number" placeholder="กรุณาใส่ปีที่ผลิต" required>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Color) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addColor">สี</label>
                                <input class="form-control" id="addColor" type="text" placeholder="กรุณาใส่สี" required>
                            </div>
                            <!-- Form Group (VIN) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addVIN">หมายเลข VIN</label>
                                <input class="form-control" id="addVIN" type="text" placeholder="กรุณาใส่หมายเลข VIN" required>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Engine Number) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addEngineNumber">หมายเลขเครื่องยนต์</label>
                                <input class="form-control" id="addEngineNumber" type="text" placeholder="กรุณาใส่หมายเลขเครื่องยนต์" required>
                            </div>
                            <!-- Form Group (Vehicle Type) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addVehicleType">ประเภทของรถ</label>
                                <input class="form-control" id="addVehicleType" type="text" placeholder="กรุณาใส่ประเภทของรถ" required>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Engine Size) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addEngineSize">ขนาดเครื่องยนต์</label>
                                <input class="form-control" id="addEngineSize" type="text" placeholder="กรุณาใส่ขนาดเครื่องยนต์" required>
                            </div>
                            <!-- Form Group (Seating Capacity) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addSeatingCapacity">ความจุที่นั่ง</label>
                                <input class="form-control" id="addSeatingCapacity" type="number" placeholder="กรุณาใส่ความจุที่นั่ง" required>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Insurance Status) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addInsuranceStatus">สถานะการประกันภัย</label>
                                <input class="form-control" id="addInsuranceStatus" type="text" placeholder="กรุณาใส่สถานะการประกันภัย" required>
                            </div>
                            <!-- Form Group (Maintenance History) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addMaintenanceHistory">ประวัติการบำรุงรักษา</label>
                                <input class="form-control" id="addMaintenanceHistory" type="text" placeholder="กรุณาใส่ประวัติการบำรุงรักษา" required>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Mileage) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addMileage">ระยะทาง</label>
                                <input class="form-control" id="addMileage" type="number" placeholder="กรุณาใส่ระยะทาง" required>
                            </div>
                            <!-- Form Group (Inspection Status) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addInspectionStatus">สถานะการตรวจสอบ</label>
                                <input class="form-control" id="addInspectionStatus" type="text" placeholder="กรุณาใส่สถานะการตรวจสอบ" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Edit Asset Modal -->
    <div id="editCustomerModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editForm">
                    <div class="modal-header">
                        <h4 class="modal-title">แก้ไขข้อมูลสินทรัพย์</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editId" name="id">
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Name Customer) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputNameCustomer">ชื่อ - นามสกุล</label>
                                <input class="form-control" id="inputNameCustomer" type="text" placeholder="กรุณาใส่ ชื่อ - นามสกุล" required>
                            </div>
                            <!-- Form Group (Vehicle ID) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputVehicleID">รหัสสินทรัพย์</label>
                                <input class="form-control" id="inputVehicleID" type="text" placeholder="กรุณาใส่รหัสสินทรัพย์" required>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (License Plate) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLicensePlate">หมายเลขทะเบียน</label>
                                <input class="form-control" id="inputLicensePlate" type="text" placeholder="กรุณาใส่หมายเลขทะเบียน" required>
                            </div>
                            <!-- Form Group (Make) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputMake">ยี่ห้อ</label>
                                <input class="form-control" id="inputMake" type="text" placeholder="กรุณาใส่ยี่ห้อ" required>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Model) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputModel">รุ่น</label>
                                <input class="form-control" id="inputModel" type="text" placeholder="กรุณาใส่รุ่น" required>
                            </div>
                            <!-- Form Group (Year Of Manufacture) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputYearOfManufacture">ปีที่ผลิต</label>
                                <input class="form-control" id="inputYearOfManufacture" type="number" placeholder="กรุณาใส่ปีที่ผลิต" required>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Color) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputColor">สี</label>
                                <input class="form-control" id="inputColor" type="text" placeholder="กรุณาใส่สี">
                            </div>
                            <!-- Form Group (VIN) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputVIN">หมายเลขตัวถัง</label>
                                <input class="form-control" id="inputVIN" type="text" placeholder="กรุณาใส่หมายเลขตัวถัง">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Engine Number) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputEngineNumber">หมายเลขเครื่องยนต์</label>
                                <input class="form-control" id="inputEngineNumber" type="text" placeholder="กรุณาใส่หมายเลขเครื่องยนต์">
                            </div>
                            <!-- Form Group (Vehicle Type) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputVehicleType">ประเภทของรถ</label>
                                <input class="form-control" id="inputVehicleType" type="text" placeholder="กรุณาใส่ประเภทของรถ">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Engine Size) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputEngineSize">ขนาดเครื่องยนต์</label>
                                <input class="form-control" id="inputEngineSize" type="text" placeholder="กรุณาใส่ขนาดเครื่องยนต์">
                            </div>
                            <!-- Form Group (Seating Capacity) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputSeatingCapacity">ความจุที่นั่ง</label>
                                <input class="form-control" id="inputSeatingCapacity" type="number" placeholder="กรุณาใส่ความจุที่นั่ง">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Insurance Status) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputInsuranceStatus">สถานะประกันภัย</label>
                                <input class="form-control" id="inputInsuranceStatus" type="text" placeholder="กรุณาใส่สถานะประกันภัย">
                            </div>
                            <!-- Form Group (Maintenance History) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputMaintenanceHistory">ประวัติการซ่อมบำรุง</label>
                                <input class="form-control" id="inputMaintenanceHistory" type="text" placeholder="กรุณาใส่ประวัติการซ่อมบำรุง">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Mileage) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputMileage">ไมล์สะสม</label>
                                <input class="form-control" id="inputMileage" type="number" placeholder="กรุณาใส่ไมล์สะสม">
                            </div>
                            <!-- Form Group (Inspection Status) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputInspectionStatus">สถานะการตรวจสอบ</label>
                                <input class="form-control" id="inputInspectionStatus" type="text" placeholder="กรุณาใส่สถานะการตรวจสอบ">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">ปิด</button>
                        <button class="btn btn-primary" type="submit">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal for delete confirmation -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="deleteForm">
                    <div class="modal-header">
                        <h4 class="modal-title">ลบข้อมูลสินทรัพย์</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>คุณแน่ใจหรือไม่ว่าต้องการลบบันทึกเหล่านี้?</p>
                        <p class="text-warning"><small>การดำเนินการนี้จะไม่สามารถยกเลิกได้</small></p>
                        <!-- Hidden input to store the id of the asset to be deleted -->
                        {{-- <input type="hidden" id="deleteId" name="id" value=""> --}}
                        <!-- Ensure you have a hidden input field for id -->
                        <input type="hidden" id="deleteId" name="deleteId" value="">

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="ยกเลิก">
                        <input type="submit" class="btn btn-danger" value="ลบข้อมูล">
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>



<style>
    body {
        color: #566787;
        background: #f5f5f5;
        /* font-family: 'Varela Round', sans-serif; */
        font-family: 'Noto Sans Thai', sans-serif;
        font-size: 13px;
    }

    .tooltip-inner {
        font-family: 'Noto Sans Thai', sans-serif;
    }

    .table-responsive {
        margin: 30px 0;
    }

    .table-wrapper {
        background: #fff;
        padding: 20px 25px;
        border-radius: 3px;
        min-width: 1000px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-title {
        padding-bottom: 15px;
        background: #435d7d;
        color: #fff;
        padding: 16px 30px;
        min-width: 100%;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }

    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }

    .table-title .btn-group {
        float: right;
    }

    .table-title .btn {
        color: #fff;
        float: right;
        font-size: 13px;
        border: none;
        min-width: 50px;
        border-radius: 2px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }

    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }

    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }

    table.table tr th,
    table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }

    table.table tr th:first-child {
        width: 60px;
    }

    table.table tr th:last-child {
        width: 100px;
    }

    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }

    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }

    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }

    table.table td:last-child i {
        opacity: 0.9;
        font-size: 22px;
        margin: 0 5px;
    }

    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
        outline: none !important;
    }

    table.table td a:hover {
        color: #2196F3;
    }

    table.table td a.edit {
        color: #FFC107;
    }

    table.table td a.delete {
        color: #F44336;
    }

    table.table td i {
        font-size: 19px;
    }

    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }

    .pagination {
        float: right;
        margin: 0 0 5px;
    }

    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }

    .pagination li a:hover {
        color: #666;
    }

    .pagination li.active a,
    .pagination li.active a.page-link {
        background: #03A9F4;
    }

    .pagination li.active a:hover {
        background: #0397d6;
    }

    .pagination li.disabled i {
        color: #ccc;
    }

    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }

    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }

    /* Custom checkbox */
    .custom-checkbox {
        position: relative;
    }

    .custom-checkbox input[type="checkbox"] {
        opacity: 0;
        position: absolute;
        margin: 5px 0 0 3px;
        z-index: 9;
    }

    .custom-checkbox label:before {
        width: 18px;
        height: 18px;
    }

    .custom-checkbox label:before {
        content: '';
        margin-right: 10px;
        display: inline-block;
        vertical-align: text-top;
        background: white;
        border: 1px solid #bbb;
        border-radius: 2px;
        box-sizing: border-box;
        z-index: 2;
    }

    .custom-checkbox input[type="checkbox"]:checked+label:after {
        content: '';
        position: absolute;
        left: 6px;
        top: 3px;
        width: 6px;
        height: 11px;
        border: solid #000;
        border-width: 0 3px 3px 0;
        transform: inherit;
        z-index: 3;
        transform: rotateZ(45deg);
    }

    .custom-checkbox input[type="checkbox"]:checked+label:before {
        border-color: #03A9F4;
        background: #03A9F4;
    }

    .custom-checkbox input[type="checkbox"]:checked+label:after {
        border-color: #fff;
    }

    .custom-checkbox input[type="checkbox"]:disabled+label:before {
        color: #b8b8b8;
        cursor: auto;
        box-shadow: none;
        background: #ddd;
    }

    /* Modal styles */
    .modal .modal-dialog {
        max-width: 1000px;
    }

    .modal .modal-header,
    .modal .modal-body,
    .modal .modal-footer {
        padding: 20px 30px;
    }

    .modal .modal-content {
        border-radius: 3px;
        font-size: 14px;
    }

    .modal .modal-footer {
        background: #ecf0f1;
        border-radius: 0 0 3px 3px;
    }

    .modal .modal-title {
        display: inline-block;
    }

    .modal .form-control {
        border-radius: 2px;
        box-shadow: none;
        border-color: #dddddd;
    }

    .modal textarea.form-control {
        resize: vertical;
    }

    .modal .btn {
        border-radius: 2px;
        min-width: 100px;
    }

    .modal form label {
        font-weight: normal;
    }
</style>



<script>
    $(document).ready(function() {
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();

        // Select/Deselect checkboxes
        var checkbox = $('table tbody input[type="checkbox"]');
        $("#selectAll").click(function() {
            if (this.checked) {
                checkbox.each(function() {
                    this.checked = true;
                });
            } else {
                checkbox.each(function() {
                    this.checked = false;
                });
            }
        });
        checkbox.click(function() {
            if (!this.checked) {
                $("#selectAll").prop("checked", false);
            }
        });
    });
</script>




<script>
    document.addEventListener('DOMContentLoaded', () => {
        fetch('/fetch-data-assets')
            .then(response => response.json())
            .then(data => {
                const tableBody = document.querySelector('#data-asset-table tbody');
                tableBody.innerHTML = ''; // ล้างข้อมูลที่มีอยู่

                data.forEach(asset => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" class="select-item" value="${asset.id}">
                                <label></label>
                            </span>
                        </td>
                        <td>${asset.id}</td>
                        <td>${asset.Name_Customer}</td>
                        <td>${asset.VehicleID}</td>
                        <td>${asset.Make}</td>
                        <td>${asset.LicensePlate}</td>
                        <td>${asset.Model}</td>
                        <td>${asset.Color}</td>
                        <td>${asset.YearOfManufacture}</td>

                        <td style="width: 200px;">

                            <a href="#editCustomerModal" class="edit" data-toggle="modal" id="show-data" style="color: #91a7ff;"
                                data-id="${asset.id}"
                                data-name-customer="${asset.Name_Customer}"
                                data-vehicle-id="${asset.VehicleID}"
                                data-license-plate="${asset.LicensePlate}"
                                data-make="${asset.Make}"
                                data-model="${asset.Model}"
                                data-year-of-manufacture="${asset.YearOfManufacture}"
                                data-color="${asset.Color}"
                                data-vin="${asset.VIN}"
                                data-engine-number="${asset.EngineNumber}"
                                data-vehicle-type="${asset.VehicleType}"
                                data-engine-size="${asset.EngineSize}"
                                data-seating-capacity="${asset.SeatingCapacity}"
                                data-insurance-status="${asset.InsuranceStatus}"
                                data-maintenance-history="${asset.MaintenanceHistory}"
                                data-mileage="${asset.Mileage}"
                                data-inspection-status="${asset.InspectionStatus}">
                                <i class="fas fa-eye" data-toggle="tooltip" title="แสดง">&#xE254;</i></a>

                            <a href="#editCustomerModal" class="edit" data-toggle="modal"
                                data-id="${asset.id}"
                                data-name-customer="${asset.Name_Customer}"
                                data-vehicle-id="${asset.VehicleID}"
                                data-license-plate="${asset.LicensePlate}"
                                data-make="${asset.Make}"
                                data-model="${asset.Model}"
                                data-year-of-manufacture="${asset.YearOfManufacture}"
                                data-color="${asset.Color}"
                                data-vin="${asset.VIN}"
                                data-engine-number="${asset.EngineNumber}"
                                data-vehicle-type="${asset.VehicleType}"
                                data-engine-size="${asset.EngineSize}"
                                data-seating-capacity="${asset.SeatingCapacity}"
                                data-insurance-status="${asset.InsuranceStatus}"
                                data-maintenance-history="${asset.MaintenanceHistory}"
                                data-mileage="${asset.Mileage}"
                                data-inspection-status="${asset.InspectionStatus}">
                                <i class="material-icons" data-toggle="tooltip" title="แก้ไข">&#xE254;</i></a>

                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" data-id="${asset.id}">
                                <i class="material-icons" data-toggle="tooltip" title="ลบ">&#xE872;</i>
                            </a>
                        </td>
                    `;
                    tableBody.appendChild(row);
                });



                // จัดการคลิกปุ่มแก้ไข
                document.querySelectorAll('.edit').forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        document.getElementById('editId').value = id;
                        document.getElementById('inputNameCustomer').value = this.getAttribute('data-name-customer');
                        document.getElementById('inputVehicleID').value = this.getAttribute('data-vehicle-id');
                        document.getElementById('inputLicensePlate').value = this.getAttribute('data-license-plate');
                        document.getElementById('inputMake').value = this.getAttribute('data-make');
                        document.getElementById('inputModel').value = this.getAttribute('data-model');
                        document.getElementById('inputYearOfManufacture').value = this.getAttribute('data-year-of-manufacture');
                        document.getElementById('inputColor').value = this.getAttribute('data-color');
                        document.getElementById('inputVIN').value = this.getAttribute('data-vin');
                        document.getElementById('inputEngineNumber').value = this.getAttribute('data-engine-number');
                        document.getElementById('inputVehicleType').value = this.getAttribute('data-vehicle-type');
                        document.getElementById('inputEngineSize').value = this.getAttribute('data-engine-size');
                        document.getElementById('inputSeatingCapacity').value = this.getAttribute('data-seating-capacity');
                        document.getElementById('inputInsuranceStatus').value = this.getAttribute('data-insurance-status');
                        document.getElementById('inputMaintenanceHistory').value = this.getAttribute('data-maintenance-history');
                        document.getElementById('inputMileage').value = this.getAttribute('data-mileage');
                        document.getElementById('inputInspectionStatus').value = this.getAttribute('data-inspection-status');
                    });
                });

                // Handle form submission
                document.getElementById('editForm').addEventListener('submit', function(event) {
                    event.preventDefault();
                    const id = document.getElementById('editId').value;
                    const data = {
                        Name_Customer: document.getElementById('inputNameCustomer').value,
                        VehicleID: document.getElementById('inputVehicleID').value,
                        LicensePlate: document.getElementById('inputLicensePlate').value,
                        Make: document.getElementById('inputMake').value,
                        Model: document.getElementById('inputModel').value,
                        YearOfManufacture: document.getElementById('inputYearOfManufacture').value,
                        Color: document.getElementById('inputColor').value,
                        VIN: document.getElementById('inputVIN').value,
                        EngineNumber: document.getElementById('inputEngineNumber').value,
                        VehicleType: document.getElementById('inputVehicleType').value,
                        EngineSize: document.getElementById('inputEngineSize').value,
                        SeatingCapacity: document.getElementById('inputSeatingCapacity').value,
                        InsuranceStatus: document.getElementById('inputInsuranceStatus').value,
                        MaintenanceHistory: document.getElementById('inputMaintenanceHistory').value,
                        Mileage: document.getElementById('inputMileage').value,
                        InspectionStatus: document.getElementById('inputInspectionStatus').value,
                    };


                    fetch(`/data-assets/update/${id}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify(data),
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success) {
                            alert(result.message);
                            $('#editCustomerModal').modal('hide');
                            location.reload(); // โหลดหน้านี้ซ้ำเพื่อดูข้อมูลที่อัปเดต
                        } else {
                            alert(result.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));
                });
            })
            .catch(error => console.error('Error:', error));
    });
</script>

<script>
   document.addEventListener('DOMContentLoaded', () => {
        // Handle form submission
        document.getElementById('addForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const data = {
                Name_Customer: document.getElementById('addNameCustomer').value,
                VehicleID: document.getElementById('addVehicleID').value,
                LicensePlate: document.getElementById('addLicensePlate').value,
                Make: document.getElementById('addMake').value,
                Model: document.getElementById('addModel').value,
                YearOfManufacture: document.getElementById('addYearOfManufacture').value,
                Color: document.getElementById('addColor').value,
                VIN: document.getElementById('addVIN').value,
                EngineNumber: document.getElementById('addEngineNumber').value,
                VehicleType: document.getElementById('addVehicleType').value,
                EngineSize: document.getElementById('addEngineSize').value,
                SeatingCapacity: document.getElementById('addSeatingCapacity').value,
                InsuranceStatus: document.getElementById('addInsuranceStatus').value,
                MaintenanceHistory: document.getElementById('addMaintenanceHistory').value,
                Mileage: document.getElementById('addMileage').value,
                InspectionStatus: document.getElementById('addInspectionStatus').value
            };

            fetch('/data-assets/create', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data),
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    alert(result.message);
                    $('#addEmployeeModal').modal('hide');
                    location.reload(); // Reload the page to see updated data
                } else {
                    alert(result.message);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

</script>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        $('#deleteEmployeeModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes
            var modal = $(this);
            modal.find('#deleteId').val(id); // Set the value of the hidden input
        });

        document.getElementById('deleteForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const id = document.getElementById('deleteId').value;

            // ตรวจสอบว่า ID เป็นตัวเลข
            if (isNaN(id) || id.trim() === '') {
                alert('Invalid ID');
                return;
            }

            fetch(`/data-assets/delete/${id}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    alert(result.message);
                    $('#deleteEmployeeModal').modal('hide');
                    location.reload(); // Reload the page to reflect the changes
                } else {
                    alert(result.message);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

</script>




























<!-- jQuery -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}



{{-- แสดงข้อมูลใน Modal --}}
{{-- <script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.show').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id-show');

            fetch(`/data-assets/show/${id}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('showNameCustomer').innerText = data.asset.Name_Customer;
                        document.getElementById('showVehicleID').innerText = data.asset.VehicleID;
                        document.getElementById('showLicensePlate').innerText = data.asset.LicensePlate;
                        document.getElementById('showMake').innerText = data.asset.Make;
                        document.getElementById('showModel').innerText = data.asset.Model;
                        document.getElementById('showYearOfManufacture').innerText = data.asset.YearOfManufacture;
                        document.getElementById('showColor').innerText = data.asset.Color;
                        document.getElementById('showVIN').innerText = data.asset.VIN;
                        document.getElementById('showEngineNumber').innerText = data.asset.EngineNumber;
                        document.getElementById('showVehicleType').innerText = data.asset.VehicleType;
                        document.getElementById('showEngineSize').innerText = data.asset.EngineSize;
                        document.getElementById('showSeatingCapacity').innerText = data.asset.SeatingCapacity;
                        document.getElementById('showInsuranceStatus').innerText = data.asset.InsuranceStatus;
                        document.getElementById('showMaintenanceHistory').innerText = data.asset.MaintenanceHistory;
                        document.getElementById('showMileage').innerText = data.asset.Mileage;
                        document.getElementById('showInspectionStatus').innerText = data.asset.InspectionStatus;

                        $('#showEmployeeModal').modal('show');
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
});

</script>



<!-- Show Asset Modal -->
<div id="showEmployeeModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="showEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showEmployeeModalLabel">Asset Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Name:</strong> <span id="showNameCustomer"></span></p>
                <p><strong>Vehicle ID:</strong> <span id="showVehicleID"></span></p>
                <p><strong>License Plate:</strong> <span id="showLicensePlate"></span></p>
                <p><strong>Make:</strong> <span id="showMake"></span></p>
                <p><strong>Model:</strong> <span id="showModel"></span></p>
                <p><strong>Year of Manufacture:</strong> <span id="showYearOfManufacture"></span></p>
                <p><strong>Color:</strong> <span id="showColor"></span></p>
                <p><strong>VIN:</strong> <span id="showVIN"></span></p>
                <p><strong>Engine Number:</strong> <span id="showEngineNumber"></span></p>
                <p><strong>Vehicle Type:</strong> <span id="showVehicleType"></span></p>
                <p><strong>Engine Size:</strong> <span id="showEngineSize"></span></p>
                <p><strong>Seating Capacity:</strong> <span id="showSeatingCapacity"></span></p>
                <p><strong>Insurance Status:</strong> <span id="showInsuranceStatus"></span></p>
                <p><strong>Maintenance History:</strong> <span id="showMaintenanceHistory"></span></p>
                <p><strong>Mileage:</strong> <span id="showMileage"></span></p>
                <p><strong>Inspection Status:</strong> <span id="showInspectionStatus"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> --}}

















