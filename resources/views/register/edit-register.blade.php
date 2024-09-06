
{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ข้อมูลสมาชิก') }}
        </h2>
    </x-slot>
</x-app-layout> --}}



<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ข้อมูลสมาชิก') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-welcome /> --}}

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            <head>
                                <title>Laravel 11 Ajax CRUD Example</title>
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
                                <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
                                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                                <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
                                <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
                            </head>

                            <div class="container">
                                <div class="card mt-5">
                                    <h2 class="card-header"><i class="fa-regular fa-user"></i> เพิ่มข้อมูลการลงทะเบียน</h2>
                                    <div class="card-body">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                                            <a class="btn btn-success btn-sm" href="javascript:void(0)" id="createNewRegister"> <i class="fa fa-plus"></i> Create New Register</a>
                                        </div>

                                        <table class="table table-bordered data-table">
                                            <thead>
                                                <tr>
                                                    <th width="60px">ID</th>
                                                    <th>ชื่อ - นามสกุล</th>
                                                    <th>รายละเอียด</th>
                                                    <th width="280px">การกระทำ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal สำหรับเพิ่ม/แก้ไขข้อมูล -->
                            <div class="modal fade" id="ajaxModel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="modelHeading"></h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id="registerForm" name="registerForm" class="form-horizontal">
                                                <input type="hidden" name="data_register_id" id="data_register_id">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="Name_regis" class="col-sm-4 control-label">ชื่อ:</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="Name_regis" name="Name_regis" placeholder="Enter Name" value="" maxlength="50">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label">รายละเอียด:</label>
                                                    <div class="col-sm-12">
                                                        <textarea id="detail" name="detail" placeholder="Enter Details" class="form-control"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success mt-2" id="saveBtn" value="create"><i class="fa fa-save"></i> Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal สำหรับแสดงข้อมูล -->
                            <div class="modal fade" id="showModel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="modelHeading"><i class="fa-regular fa-eye"></i> แสดงข้อมูล</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>ชื่อ:</strong> <span class="show-name"></span></p>
                                            <p><strong>รายละเอียด:</strong> <span class="show-detail"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script type="text/javascript">
                                $(function () {
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });

                                    var table = $('.data-table').DataTable({
                                        processing: true,
                                        serverSide: true,
                                        ajax: "{{ route('registers.getDataRegisters') }}", // route สำหรับ getDataRegisters
                                        columns: [
                                            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                                            {data: 'Name_regis', name: 'Name_regis'}, // ใช้ฟิลด์ใน Model
                                            {data: 'detail', name: 'detail'},
                                            {data: 'action', name: 'action', orderable: false, searchable: false},
                                        ]
                                    });


                                    $('#createNewRegister').click(function () {
                                        $('#saveBtn').val("create-register");
                                        $('#data_register_id').val('');
                                        $('#registerForm').trigger("reset");
                                        $('#modelHeading').html("<i class='fa fa-plus'></i> Create New Register");
                                        $('#ajaxModel').modal('show');
                                    });

                                    $('body').on('click', '.editDataRegister', function () {
                                        var data_register_id = $(this).data('id');
                                        $.get("{{ route('registers.index') }}" + '/' + data_register_id + '/edit', function (data) {
                                            $('#modelHeading').html("<i class='fa-regular fa-pen-to-square'></i> Edit Register");
                                            $('#saveBtn').val("edit-data");
                                            $('#ajaxModel').modal('show');
                                            $('#data_register_id').val(data.id);
                                            $('#Name_regis').val(data.Name_regis);
                                            $('#detail').val(data.detail);
                                        })
                                    });

                                    $('#registerForm').submit(function(e) {
                                        e.preventDefault();
                                        let formData = new FormData(this);
                                        $('#saveBtn').html('Sending...');

                                        $.ajax({
                                            type: 'POST',
                                            url: "{{ route('registers.store') }}",
                                            data: formData,
                                            contentType: false,
                                            processData: false,
                                            success: (response) => {
                                                $('#saveBtn').html('Submit');
                                                $('#registerForm').trigger("reset");
                                                $('#ajaxModel').modal('hide');
                                                table.draw();
                                            },
                                            error: function(response) {
                                                $('#saveBtn').html('Submit');
                                                $('#registerForm').find(".print-error-msg").find("ul").html('');
                                                $('#registerForm').find(".print-error-msg").css('display','block');
                                                $.each(response.responseJSON.errors, function(key, value) {
                                                    $('#registerForm').find(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                                                });
                                            }
                                        });
                                    });

                                    $('body').on('click', '.showDataRegister', function () {
                                        var data_register_id = $(this).data('id');
                                        $.get("{{ route('registers.index') }}" + '/' + data_register_id, function (data) {
                                            $('#showModel').modal('show');
                                            $('.show-name').text(data.Name_regis);
                                            $('.show-detail').text(data.detail);
                                        })
                                    });

                                    $('body').on('click', '.deleteDataRegister', function () {
                                        var data_register_id = $(this).data("id");
                                        confirm("Are You sure want to delete?");

                                        $.ajax({
                                            type: "DELETE",
                                            url: "{{ route('registers.destroy', '') }}" + '/' + data_register_id,
                                            success: function (data) {
                                                table.draw();
                                            },
                                            error: function (data) {
                                                console.log('Error:', data);
                                            }
                                        });
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
</x-app-layout>



