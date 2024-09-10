{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Data Assets CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <div class="container mt-4">
        <h1>Data Assets</h1>
        <form id="dataAssetForm">
            <!-- Add form fields here -->
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Name Customer</th>
                    <th>Vehicle ID</th>
                    <!-- Add other headers -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="dataAssetTable">
                <!-- Data will be inserted here via Ajax -->
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            fetchData();

            function fetchData() {
                $.ajax({
                    url: '/data-assets',
                    method: 'GET',
                    success: function(data) {
                        let rows = '';
                        data.forEach(item => {
                            rows += `<tr>
                                <td>${item.Name_Customer}</td>
                                <td>${item.VehicleID}</td>
                                <!-- Add other columns -->
                                <td>
                                    <button class="btn btn-info btn-sm" onclick="editData(${item.id})">Edit</button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteData(${item.id})">Delete</button>
                                </td>
                            </tr>`;
                        });
                        $('#dataAssetTable').html(rows);
                    }
                });
            }

            $('#dataAssetForm').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    url: '/data-assets',
                    method: 'POST',
                    data: formData,
                    success: function(data) {
                        $('#dataAssetForm')[0].reset();
                        fetchData();
                    }
                });
            });

            window.editData = function(id) {
                // Add functionality for editing
            };

            window.deleteData = function(id) {
                $.ajax({
                    url: `/data-assets/${id}`,
                    method: 'DELETE',
                    success: function() {
                        fetchData();
                    }
                });
            };
        });
    </script>
</body>
</html> --}}







{{-- <!DOCTYPE html>
<html>
<head>
    <title>Laravel 11 Ajax CRUD Tutorial Example</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>

<div class="container">
    <div class="card mt-5">
        <h2 class="card-header"><i class="fa-regular fa-credit-card"></i> Laravel 11 Ajax CRUD Example</h2>
        <div class="card-body">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                <a class="btn btn-success btn-sm" href="javascript:void(0)" id="createNewDataAsset"> <i class="fa fa-plus"></i> Create New Data Asset</a>
            </div>

            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th width="60px">No</th>
                        <th>Name Customer</th>
                        <th>Vehicle ID</th>
                        <th>License Plate</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Year Of Manufacture</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

</div>

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="dataAssetForm" name="dataAssetForm" class="form-horizontal">
                   <input type="hidden" name="data_asset_id" id="data_asset_id">
                   @csrf

                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>

                    <div class="form-group">
                        <label for="Name_Customer" class="col-sm-2 control-label">Name Customer:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="Name_Customer" name="Name_Customer" placeholder="Enter Name Customer" maxlength="50">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="VehicleID" class="col-sm-2 control-label">Vehicle ID:</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="VehicleID" name="VehicleID" placeholder="Enter Vehicle ID">
                        </div>
                    </div>

                    <!-- Add other fields as required -->

                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-success mt-2" id="saveBtn" value="create"><i class="fa fa-save"></i> Submit
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="showModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"><i class="fa-regular fa-eye"></i> Show Data Asset</h4>
            </div>
            <div class="modal-body">
                <p><strong>Name Customer:</strong> <span class="show-Name_Customer"></span></p>
                <p><strong>Vehicle ID:</strong> <span class="show-VehicleID"></span></p>
                <!-- Add other fields as required -->
            </div>
        </div>
    </div>
</div>

</body>

<script type="text/javascript">
  $(function () {

    /*------------------------------------------
     --------------------------------------------
     Pass Header Token
     --------------------------------------------
     --------------------------------------------*/
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    /*------------------------------------------
    --------------------------------------------
    Render DataTable
    --------------------------------------------
    --------------------------------------------*/
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('data-assets.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'Name_Customer', name: 'Name_Customer'},
            {data: 'VehicleID', name: 'VehicleID'},
            {data: 'LicensePlate', name: 'LicensePlate'},
            {data: 'Make', name: 'Make'},
            {data: 'Model', name: 'Model'},
            {data: 'YearOfManufacture', name: 'YearOfManufacture'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    /*------------------------------------------
    --------------------------------------------
    Click to Button
    --------------------------------------------
    --------------------------------------------*/
    $('#createNewDataAsset').click(function () {
        $('#saveBtn').val("create-data-asset");
        $('#data_asset_id').val('');
        $('#dataAssetForm').trigger("reset");
        $('#modelHeading').html("<i class='fa fa-plus'></i> Create New Data Asset");
        $('#ajaxModel').modal('show');
    });

    /*------------------------------------------
    --------------------------------------------
    Click to Show Button
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.showDataAsset', function () {
      var data_asset_id = $(this).data('id');
      $.get("{{ route('data-assets.index') }}" +'/' + data_asset_id, function (data) {
          $('#showModel').modal('show');
          $('.show-Name_Customer').text(data.Name_Customer);
          $('.show-VehicleID').text(data.VehicleID);
          // Add other fields as required
      })
    });

    /*------------------------------------------
    --------------------------------------------
    Click to Edit Button
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.editDataAsset', function () {
      var data_asset_id = $(this).data('id');
      $.get("{{ route('data-assets.index') }}" +'/' + data_asset_id +'/edit', function (data) {
          $('#modelHeading').html("<i class='fa-regular fa-pen-to-square'></i> Edit Data Asset");
          $('#saveBtn').val("edit-data-asset");
          $('#ajaxModel').modal('show');
          $('#data_asset_id').val(data.id);
          $('#Name_Customer').val(data.Name_Customer);
          $('#VehicleID').val(data.VehicleID);
          // Add other fields as required
      })
    });

    /*------------------------------------------
    --------------------------------------------
    Create Data Asset Code
    --------------------------------------------
    --------------------------------------------*/
    $('#dataAssetForm').submit(function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        $('#saveBtn').html('Sending...');

        $.ajax({
                type:'POST',
                url: "{{ route('data-assets.store') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                      $('#saveBtn').html('Submit');
                      $('#dataAssetForm').trigger("reset");
                      $('#ajaxModel').modal('hide');
                      table.draw();
                },
                error: function(response){
                    $('#saveBtn').html('Submit');
                    $('#dataAssetForm').find(".print-error-msg").find("ul").html('');
                    $('#dataAssetForm').find(".print-error-msg").css('display','block');
                    $.each( response.responseJSON.errors, function( key, value ) {
                        $('#dataAssetForm').find(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                    });
                }
           });

    });

    /*------------------------------------------
    --------------------------------------------
    Delete Data Asset Code
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.deleteDataAsset', function () {

        var data_asset_id = $(this).data("id");
        if (confirm("Are you sure want to delete?")) {

            $.ajax({
                type: "DELETE",
                url: "{{ route('data-assets.store') }}"+'/'+data_asset_id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });

  });
</script>
</html> --}}

















<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
                <table class="table table-striped table-hover">
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
                        @foreach ($dataAssets as $dataAsset)
                            <tr>
                                <td>{{ $dataAsset->Name_Customer }}</td>
                                <td>{{ $dataAsset->VehicleID }}</td>
                                <td>
                                    <a href="{{ route('data_assets.show', $dataAsset->id) }}">View</a>
                                    <a href="{{ route('data_assets.edit', $dataAsset->id) }}">Edit</a>
                                    <form action="{{ route('data_assets.destroy', $dataAsset->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

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
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">เพิ่มข้อมูลสินทรัพย์</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
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
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">แก้ไขข้อมูลสินทรัพย์</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        {{-- <div class="form-group">
                            <label>ชื่อ - นามสกุลลูกค้า</label>
                            <input type="text" class="form-control" required>
                        </div> --}}

                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">ชื่อ - นามสกุล</label>
                                <input class="form-control" id="inputFirstName" type="text"
                                    placeholder="กรุณาใส่ ชื่อ - นามสกุล" value="TEST SYSTEM">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">รหัสสินทรัพย์</label>
                                <input class="form-control" id="inputLastName" type="text"
                                    placeholder="กรุณาใส่รหัสสินทรัพย์" value="000-199">
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">หมายเลขทะเบียน</label>
                                <input class="form-control" id="inputFirstName" type="text"
                                    placeholder="กรุณาใส่ ชื่อ - นามสกุล" value="TEST SYSTEM">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">ยี่ห้อ</label>
                                <input class="form-control" id="inputLastName" type="text"
                                    placeholder="กรุณาใส่รหัสสินทรัพย์" value="000-199">
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">รุ่น</label>
                                <input class="form-control" id="inputFirstName" type="text"
                                    placeholder="กรุณาใส่ ชื่อ - นามสกุล" value="TEST SYSTEM">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">ปีที่ผลิต</label>
                                <input class="form-control" id="inputLastName" type="text"
                                    placeholder="กรุณาใส่รหัสสินทรัพย์" value="000-199">
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">สี</label>
                                <input class="form-control" id="inputFirstName" type="text"
                                    placeholder="กรุณาใส่ ชื่อ - นามสกุล" value="TEST SYSTEM">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">หมายเลขตัวถัง</label>
                                <input class="form-control" id="inputLastName" type="text"
                                    placeholder="กรุณาใส่รหัสสินทรัพย์" value="000-199">
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">หมายเลขเครื่องยนต์</label>
                                <input class="form-control" id="inputFirstName" type="text"
                                    placeholder="กรุณาใส่ ชื่อ - นามสกุล" value="TEST SYSTEM">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">ประเภทของรถยนต์</label>
                                <input class="form-control" id="inputLastName" type="text"
                                    placeholder="กรุณาใส่รหัสสินทรัพย์" value="000-199">
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">ขนาดเครื่องยนต์</label>
                                <input class="form-control" id="inputFirstName" type="text"
                                    placeholder="กรุณาใส่ ชื่อ - นามสกุล" value="TEST SYSTEM">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">จำนวนที่นั่ง</label>
                                <input class="form-control" id="inputLastName" type="text"
                                    placeholder="กรุณาใส่รหัสสินทรัพย์" value="000-199">
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">สถานะการประกัน</label>
                                <input class="form-control" id="inputFirstName" type="text"
                                    placeholder="กรุณาใส่ ชื่อ - นามสกุล" value="TEST SYSTEM">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">ประวัติการซ่อมบำรุง</label>
                                <input class="form-control" id="inputLastName" type="text"
                                    placeholder="กรุณาใส่รหัสสินทรัพย์" value="000-199">
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            {{-- <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">สถานะการประกัน</label>
                                <input class="form-control" id="inputFirstName" type="text"
                                    placeholder="กรุณาใส่ ชื่อ - นามสกุล" value="TEST SYSTEM">
                            </div> --}}
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">สถานะการตรวจสอบสภาพรถ</label>
                                <input class="form-control" id="inputLastName" type="text"
                                    placeholder="กรุณาใส่รหัสสินทรัพย์" value="000-199">
                            </div>
                        </div>




                        {{-- <div class="form-group">
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
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
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
