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

                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i> <span>เพิ่มข้อมูลสินทรัพย์</span></a>
                            <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i
                                    class="material-icons">&#xE15C;</i> <span>ลบข้อมูล</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover" id="data-asset-table">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>ID</th>
                            <th>ชื่อ - นามสกุลลูกค้า</th>
                            <th>รหัสสินทรัพย์</th>
                            <th>ยี่ห้อ</th>
                            <th>หมายเลขทะเบียน</th>
                            <th>รุ่น</th>
                            <th>ปีที่ผลิต</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- ข้อมูลจะถูกแทรกที่นี่โดย JavaScript -->
                    </tbody>
                </table>


                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        fetch('/fetch-data-assets')
                            .then(response => response.json())
                            .then(data => {
                                const tableBody = document.querySelector('#data-asset-table tbody');
                                tableBody.innerHTML = ''; // Clear existing data

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
                                        <td>${asset.YearOfManufacture}</td>
                                        <td>
                                            <a href="#editEmployeeModal" class="edit" data-toggle="modal" data-id="${asset.id}" data-name-customer="${asset.Name_Customer}" data-vehicle-id="${asset.VehicleID}" data-license-plate="${asset.LicensePlate}" data-make="${asset.Make}" data-model="${asset.Model}" data-year-of-manufacture="${asset.YearOfManufacture}"><i class="material-icons" data-toggle="tooltip" title="แก้ไข">&#xE254;</i></a>
                                        </td>
                                    `;
                                    tableBody.appendChild(row);
                                });

                                // Handle edit button click
                                // document.querySelectorAll('.edit').forEach(button => {
                                //     button.addEventListener('click', function() {
                                //         const id = this.getAttribute('data-id');
                                //         const nameCustomer = this.getAttribute('data-name-customer');
                                //         const vehicleID = this.getAttribute('data-vehicle-id');
                                //         const licensePlate = this.getAttribute('data-license-plate');
                                //         const make = this.getAttribute('data-make');
                                //         const model = this.getAttribute('data-model');
                                //         const yearOfManufacture = this.getAttribute('data-year-of-manufacture');

                                //         // Fill the edit form
                                //         document.getElementById('editId').value = id;
                                //         document.getElementById('inputNameCustomer').value = nameCustomer;
                                //         document.getElementById('inputVehicleID').value = vehicleID;
                                //         document.getElementById('inputLicensePlate').value = licensePlate;
                                //         document.getElementById('inputMake').value = make;
                                //         document.getElementById('inputModel').value = model;
                                //         document.getElementById('inputYearOfManufacture').value = yearOfManufacture;
                                //     });
                                // });

                                document.querySelectorAll('.edit').forEach(button => {
                                button.addEventListener('click', function() {
                                    const id = this.getAttribute('data-id');
                                    const nameCustomer = this.getAttribute('data-name-customer');
                                    const vehicleID = this.getAttribute('data-vehicle-id');
                                    const licensePlate = this.getAttribute('data-license-plate');
                                    const make = this.getAttribute('data-make');
                                    const model = this.getAttribute('data-model');
                                    const yearOfManufacture = this.getAttribute('data-year-of-manufacture');
                                    const color = this.getAttribute('data-color');
                                    const vin = this.getAttribute('data-vin');
                                    const engineNumber = this.getAttribute('data-engine-number');
                                    const vehicleType = this.getAttribute('data-vehicle-type');
                                    const engineSize = this.getAttribute('data-engine-size');
                                    const seatingCapacity = this.getAttribute('data-seating-capacity');
                                    const insuranceStatus = this.getAttribute('data-insurance-status');
                                    const maintenanceHistory = this.getAttribute('data-maintenance-history');
                                    const mileage = this.getAttribute('data-mileage');
                                    const inspectionStatus = this.getAttribute('data-inspection-status');

                                    // Fill the edit form
                                    document.getElementById('editId').value = id;
                                    document.getElementById('inputNameCustomer').value = nameCustomer;
                                    document.getElementById('inputVehicleID').value = vehicleID;
                                    document.getElementById('inputLicensePlate').value = licensePlate;
                                    document.getElementById('inputMake').value = make;
                                    document.getElementById('inputModel').value = model;
                                    document.getElementById('inputYearOfManufacture').value = yearOfManufacture;
                                    document.getElementById('inputColor').value = color;
                                    document.getElementById('inputVIN').value = vin;
                                    document.getElementById('inputEngineNumber').value = engineNumber;
                                    document.getElementById('inputVehicleType').value = vehicleType;
                                    document.getElementById('inputEngineSize').value = engineSize;
                                    document.getElementById('inputSeatingCapacity').value = seatingCapacity;
                                    document.getElementById('inputInsuranceStatus').value = insuranceStatus;
                                    document.getElementById('inputMaintenanceHistory').value = maintenanceHistory;
                                    document.getElementById('inputMileage').value = mileage;
                                    document.getElementById('inputInspectionStatus').value = inspectionStatus;
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
                                            $('#editEmployeeModal').modal('hide');
                                            location.reload(); // Reload the page to see updated data
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



                    {{-- <tbody>
                        @foreach ($dataAssets as $dataAsset)
                        <tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox{{ $dataAsset->id }}" name="options[]" value="{{ $dataAsset->id }}">
                                    <label for="checkbox{{ $dataAsset->id }}"></label>
                                </span>
                            </td>
                            <td>{{ $dataAsset->id }}</td>
                            <td>{{ $dataAsset->Name_Customer }}</td>
                            <td>{{ $dataAsset->VehicleID }}</td>
                            <td>{{ $dataAsset->Make }}</td>
                            <td>{{ $dataAsset->LicensePlate }}</td>
                            <td>{{ $dataAsset->Model }}</td>
                            <td>{{ $dataAsset->YearOfManufacture }}</td>
                            <td style="width: 200px;">
                                <a href="#showEmployeeModal" class="show" data-toggle="modal"><i class="fas fa-eye" data-toggle="tooltip" title="แสดง"></i></a>
                                <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="แก้ไข">&#xE254;</i></a>
                                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="ลบ">&#xE872;</i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody> --}}


                    {{-- <tbody>
                        <tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                    <label for="checkbox1"></label>
                                </span>
                            </td>
                            <td>1</td>
                            <td>Thomas Hardy</td>
                            <td>thomashardy@mail.com</td>
                            <td>Test001</td>
                            <td>89 Chiaroscuro Rd, Portland, USA</td>
                            <td>(171) 555-2222</td>
                            <td>2563</td>
                            <td style="width: 200px;">
                                <a href="#showEmployeeModal" class="show" data-toggle="modal">
                                    <i class="fas fa-eye" data-toggle="tooltip" title="แสดง"></i></a>
                                <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i
                                        class="material-icons" data-toggle="tooltip" title="แก้ไข">&#xE254;</i></a>
                                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i
                                        class="material-icons" data-toggle="tooltip" title="ลบ">&#xE872;</i></a>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox2" name="options[]" value="1">
                                    <label for="checkbox2"></label>
                                </span>
                            </td>
                            <td>2</td>
                            <td>Dominique Perrier</td>
                            <td>dominiqueperrier@mail.com</td>
                            <td>Test002</td>
                            <td>Obere Str. 57, Berlin, Germany</td>
                            <td>(313) 555-5735</td>
                            <td>2563</td>
                            <td style="width: 200px;">
                                <a href="#showEmployeeModal" class="show" data-toggle="modal">
                                    <i class="fas fa-eye" data-toggle="tooltip" title="แสดง"></i></a>
                                <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i
                                        class="material-icons" data-toggle="tooltip" title="แก้ไข">&#xE254;</i></a>
                                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i
                                        class="material-icons" data-toggle="tooltip" title="ลบ">&#xE872;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox3" name="options[]" value="1">
                                    <label for="checkbox3"></label>
                                </span>
                            </td>
                            <td>3</td>
                            <td>Maria Anders</td>
                            <td>mariaanders@mail.com</td>
                            <td>Test003</td>
                            <td>25, rue Lauriston, Paris, France</td>
                            <td>(503) 555-9931</td>
                            <td>2563</td>
                            <td style="width: 200px;">
                                <a href="#showEmployeeModal" class="show" data-toggle="modal">
                                    <i class="fas fa-eye" data-toggle="tooltip" title="แสดง"></i></a>
                                <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i
                                        class="material-icons" data-toggle="tooltip" title="แก้ไข">&#xE254;</i></a>
                                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i
                                        class="material-icons" data-toggle="tooltip" title="ลบ">&#xE872;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox4" name="options[]" value="1">
                                    <label for="checkbox4"></label>
                                </span>
                            </td>
                            <td>4</td>
                            <td>Fran Wilson</td>
                            <td>franwilson@mail.com</td>
                            <td>Test004</td>
                            <td>C/ Araquil, 67, Madrid, Spain</td>
                            <td>(204) 619-5731</td>
                            <td>2563</td>
                            <td style="width: 200px;">
                                <a href="#showEmployeeModal" class="show" data-toggle="modal">
                                    <i class="fas fa-eye" data-toggle="tooltip" title="แสดง"></i></a>
                                <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i
                                        class="material-icons" data-toggle="tooltip" title="แก้ไข">&#xE254;</i></a>
                                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i
                                        class="material-icons" data-toggle="tooltip" title="ลบ">&#xE872;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox5" name="options[]" value="1">
                                    <label for="checkbox5"></label>
                                </span>
                            </td>
                            <td>5</td>
                            <td>Martin Blank</td>
                            <td>martinblank@mail.com</td>
                            <td>Test005</td>
                            <td>Via Monte Bianco 34, Turin, Italy</td>
                            <td>(480) 631-2097</td>
                            <td>2563</td>
                            <td style="width: 200px;">
                                <a href="#showEmployeeModal" class="show" data-toggle="modal">
                                    <i class="fas fa-eye" data-toggle="tooltip" title="แสดง"></i></a>
                                <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i
                                        class="material-icons" data-toggle="tooltip" title="แก้ไข">&#xE254;</i></a>
                                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i
                                        class="material-icons" data-toggle="tooltip" title="ลบ">&#xE872;</i></a>
                            </td>
                        </tr>
                    </tbody> --}}

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
    <!-- Edit Modal HTML -->
    {{-- <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">เพิ่มข้อมูลสินทรัพย์</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div> --}}
                    {{-- <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div> --}}

                    {{-- <div class="modal-body">
                        <input type="hidden" id="editId">
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputNameCustomer">ชื่อ - นามสกุล</label>
                                <input class="form-control" id="inputNameCustomer" type="text" placeholder="กรุณาใส่ ชื่อ - นามสกุล">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputVehicleID">รหัสสินทรัพย์</label>
                                <input class="form-control" id="inputVehicleID" type="text" placeholder="กรุณาใส่รหัสสินทรัพย์">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLicensePlate">หมายเลขทะเบียน</label>
                                <input class="form-control" id="inputLicensePlate" type="text" placeholder="กรุณาใส่หมายเลขทะเบียน">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputMake">ยี่ห้อ</label>
                                <input class="form-control" id="inputMake" type="text" placeholder="กรุณาใส่ยี่ห้อ">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputModel">รุ่น</label>
                                <input class="form-control" id="inputModel" type="text" placeholder="กรุณาใส่รุ่น">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputYearOfManufacture">ปีที่ผลิต</label>
                                <input class="form-control" id="inputYearOfManufacture" type="number" placeholder="กรุณาใส่ปีที่ผลิต">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">บันทึกการเปลี่ยนแปลง</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    {{-- <div id="addEmployeeModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addForm">
                    <div class="modal-header">
                        <h4 class="modal-title">เพิ่มข้อมูลสินทรัพย์</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="addNameCustomer">ชื่อ - นามสกุล</label>
                                <input class="form-control" id="addNameCustomer" type="text" placeholder="กรุณาใส่ ชื่อ - นามสกุล" required>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="addVehicleID">รหัสสินทรัพย์</label>
                                <input class="form-control" id="addVehicleID" type="text" placeholder="กรุณาใส่รหัสสินทรัพย์" required>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="addLicensePlate">หมายเลขทะเบียน</label>
                                <input class="form-control" id="addLicensePlate" type="text" placeholder="กรุณาใส่หมายเลขทะเบียน" required>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="addMake">ยี่ห้อ</label>
                                <input class="form-control" id="addMake" type="text" placeholder="กรุณาใส่ยี่ห้อ" required>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="addModel">รุ่น</label>
                                <input class="form-control" id="addModel" type="text" placeholder="กรุณาใส่รุ่น" required>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="addYearOfManufacture">ปีที่ผลิต</label>
                                <input class="form-control" id="addYearOfManufacture" type="number" placeholder="กรุณาใส่ปีที่ผลิต" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

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
                                <input class="form-control" id="addColor" type="text" placeholder="กรุณาใส่สี">
                            </div>
                            <!-- Form Group (VIN) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addVIN">หมายเลข VIN</label>
                                <input class="form-control" id="addVIN" type="text" placeholder="กรุณาใส่หมายเลข VIN">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Engine Number) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addEngineNumber">หมายเลขเครื่องยนต์</label>
                                <input class="form-control" id="addEngineNumber" type="text" placeholder="กรุณาใส่หมายเลขเครื่องยนต์">
                            </div>
                            <!-- Form Group (Vehicle Type) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addVehicleType">ประเภทของรถ</label>
                                <input class="form-control" id="addVehicleType" type="text" placeholder="กรุณาใส่ประเภทของรถ">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Engine Size) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addEngineSize">ขนาดเครื่องยนต์</label>
                                <input class="form-control" id="addEngineSize" type="text" placeholder="กรุณาใส่ขนาดเครื่องยนต์">
                            </div>
                            <!-- Form Group (Seating Capacity) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addSeatingCapacity">ความจุที่นั่ง</label>
                                <input class="form-control" id="addSeatingCapacity" type="number" placeholder="กรุณาใส่ความจุที่นั่ง">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Insurance Status) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addInsuranceStatus">สถานะการประกันภัย</label>
                                <input class="form-control" id="addInsuranceStatus" type="text" placeholder="กรุณาใส่สถานะการประกันภัย">
                            </div>
                            <!-- Form Group (Maintenance History) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addMaintenanceHistory">ประวัติการบำรุงรักษา</label>
                                <input class="form-control" id="addMaintenanceHistory" type="text" placeholder="กรุณาใส่ประวัติการบำรุงรักษา">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Mileage) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addMileage">ระยะทาง</label>
                                <input class="form-control" id="addMileage" type="number" placeholder="กรุณาใส่ระยะทาง">
                            </div>
                            <!-- Form Group (Inspection Status) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="addInspectionStatus">สถานะการตรวจสอบ</label>
                                <input class="form-control" id="addInspectionStatus" type="text" placeholder="กรุณาใส่สถานะการตรวจสอบ">
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




    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editForm">
                    <div class="modal-header">
                        <h4 class="modal-title">แก้ไขข้อมูลสินทรัพย์</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editId">
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputNameCustomer">ชื่อ - นามสกุล</label>
                                <input class="form-control" id="inputNameCustomer" type="text" placeholder="กรุณาใส่ ชื่อ - นามสกุล">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputVehicleID">รหัสสินทรัพย์</label>
                                <input class="form-control" id="inputVehicleID" type="text" placeholder="กรุณาใส่รหัสสินทรัพย์">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLicensePlate">หมายเลขทะเบียน</label>
                                <input class="form-control" id="inputLicensePlate" type="text" placeholder="กรุณาใส่หมายเลขทะเบียน">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputMake">ยี่ห้อ</label>
                                <input class="form-control" id="inputMake" type="text" placeholder="กรุณาใส่ยี่ห้อ">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputModel">รุ่น</label>
                                <input class="form-control" id="inputModel" type="text" placeholder="กรุณาใส่รุ่น">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputYearOfManufacture">ปีที่ผลิต</label>
                                <input class="form-control" id="inputYearOfManufacture" type="number" placeholder="กรุณาใส่ปีที่ผลิต">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">บันทึกการเปลี่ยนแปลง</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">ลบข้อมูลสินทรัพย์</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>คุณแน่ใจหรือไม่ว่าต้องการลบบันทึกเหล่านี้?</p>
                        <p class="text-warning"><small>การดำเนินการนี้จะไม่สามารถยกเลิกได้</small></p>
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
