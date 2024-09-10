<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ข้อมูลลูกค้า</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>

<body>
    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header text-center">ข้อมูลลูกค้า</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2"
                            src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-2">ชื่อ - นามสกุล : TEST SYSTEM</div>
                        <div class="small font-italic text-muted mb-4">เลขทะเบียน : คส 9999 พัทลุง</div>
                        <!-- Profile picture upload button-->
                        <button class="btn btn-secondary" type="button">
                            <i class="fas fa-user"></i> ข้อมูลลูกค้า
                        </button><br>
                        <button class="btn btn-success mt-2" type="button">
                            <i class="fas fa-file-alt"></i> ธุระกรรมทะเบียน
                        </button><br>
                        <button class="btn btn-danger mt-2" type="button">
                            <i class="fas fa-shield-alt"></i> คุ้มครองประกันภัย
                        </button><br>
                        <button class="btn btn-warning mt-2" type="button">
                            <i class="fas fa-sticky-note"></i> บันทึกติดตามลูกค้า
                        </button><br>


                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Data Customers (ข้อมูลลูกค้า)</div>
                    <div class="card-body">
                        <form>
                            <!-- Form Group (username)-->
                            {{-- <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username (how your name will appear to
                                    other users on the site)</label>
                                <input class="form-control" id="inputUsername" type="text"
                                    placeholder="Enter your username" value="username">
                            </div> --}}
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">ชื่อ - นามสกุล</label>
                                    <input class="form-control" id="inputFirstName" type="text"
                                        placeholder="กรุณาใส่ ชื่อ - นามสกุล" value="TEST SYSTEM">
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">เลขบัตรประชาชน</label>
                                    <input class="form-control" id="inputLastName" type="text"
                                        placeholder="กรุณาใส่เลขบัตรประชาชน" value="1-5795-22655-395">
                                </div>
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">เบอร์โทรศัพท์</label>
                                    <input class="form-control" id="inputOrgName" type="text"
                                        placeholder="Enter your organization name" value="Start Bootstrap">
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">ที่อยู่</label>
                                    <input class="form-control" id="inputLocation" type="text"
                                        placeholder="Enter your location" value="San Francisco, CA">
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">เลขถัง</label>
                                    <input class="form-control" id="inputOrgName" type="text"
                                        placeholder="Enter your organization name" value="Start Bootstrap">
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">ป้ายทะเบียน</label>
                                    <input class="form-control" id="inputLocation" type="text"
                                        placeholder="Enter your location" value="San Francisco, CA">
                                </div>
                            </div>


                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">เลขเครื่อง</label>
                                    <input class="form-control" id="inputOrgName" type="text"
                                        placeholder="Enter your organization name" value="Start Bootstrap">
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">ยี่ห้อ</label>
                                    <input class="form-control" id="inputLocation" type="text"
                                        placeholder="Enter your location" value="San Francisco, CA">
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">รุ่นรถ</label>
                                    <input class="form-control" id="inputOrgName" type="text"
                                        placeholder="Enter your organization name" value="Start Bootstrap">
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">ปีรถ</label>
                                    <input class="form-control" id="inputLocation" type="text"
                                        placeholder="Enter your location" value="San Francisco, CA">
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">สีรถ</label>
                                    <input class="form-control" id="inputOrgName" type="text"
                                        placeholder="Enter your organization name" value="Start Bootstrap">
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">ประเภทรถ</label>
                                    <input class="form-control" id="inputLocation" type="text"
                                        placeholder="Enter your location" value="San Francisco, CA">
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">ผู้ลงระบบ</label>
                                    <input class="form-control" id="inputOrgName" type="text"
                                        placeholder="Enter your organization name" value="Start Bootstrap">
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">ประเภทรถ</label>
                                    <input class="form-control" id="inputLocation" type="text"
                                        placeholder="Enter your location" value="San Francisco, CA">
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">แผนก</label>
                                    <input class="form-control" id="inputOrgName" type="text"
                                        placeholder="Enter your organization name" value="Start Bootstrap">
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">สังกัด</label>
                                    <input class="form-control" id="inputLocation" type="text"
                                        placeholder="Enter your location" value="San Francisco, CA">
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">ต่อภาษี</label>
                                    <input class="form-control" id="inputOrgName" type="text"
                                        placeholder="Enter your organization name" value="Start Bootstrap">
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">ประกัน</label>
                                    <input class="form-control" id="inputLocation" type="text"
                                        placeholder="Enter your location" value="San Francisco, CA">
                                </div>
                            </div>


                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">ต่อ พ.ร.บ</label>
                                    <input class="form-control" id="inputOrgName" type="text"
                                        placeholder="Enter your organization name" value="Start Bootstrap">
                                </div>
                                <!-- Form Group (insurance)-->
                                <div class="col-md-6 mt-3">
                                    <br>
                                    {{-- <label class="small mb-1">ประกัน</label> --}}
                                    <div class="form-check d-inline-block me-3">
                                        <input class="form-check-input" type="checkbox" id="checkBook" value="check_book">
                                        <label class="form-check-label" for="checkBook">
                                            เช็คเล่ม
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block me-3">
                                        <input class="form-check-input" type="checkbox" id="checkKey" value="check_key">
                                        <label class="form-check-label" for="checkKey">
                                            เช็คกุญแจ
                                        </label>
                                    </div>
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="checkbox" id="checkReceipt" value="check_receipt">
                                        <label class="form-check-label" for="checkReceipt">
                                            เช็คใบเสร็จ
                                        </label>
                                    </div>
                                </div>
                            </div>




                            <!-- Form Group (email address)-->
                            {{-- <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" type="email"
                                    placeholder="Enter your email address" value="name@example.com">
                            </div> --}}
                            <!-- Form Row-->
                            {{-- <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" id="inputPhone" type="tel"
                                        placeholder="Enter your phone number" value="555-123-4567">
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                                    <input class="form-control" id="inputBirthday" type="text" name="birthday"
                                        placeholder="Enter your birthday" value="06/10/1988">
                                </div>
                            </div> --}}
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="button">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>



<style>

    .button-container {
        display: flex;
        flex-direction: column;
        gap: 10px; /* เพิ่มช่องว่างระหว่างปุ่ม */
    }

    .btn-primary {
        /* กำหนดลักษณะของปุ่มได้ที่นี่ */
    }

    body {
        font-family: 'Noto Sans Thai', sans-serif;
        margin-top: 20px;
        background-color: #f2f6fc;
        color: #69707a;
    }

    .img-account-profile {
        height: 10rem;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
    }

    .card .card-header {
        font-weight: 500;
    }

    .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
    }

    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }

    .form-control,
    .dataTable-input {
        display: block;
        width: 100%;
        padding: 0.875rem 1.125rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #69707a;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #c5ccd6;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .nav-borders .nav-link.active {
        color: #0061f2;
        border-bottom-color: #0061f2;
    }

    .nav-borders .nav-link {
        color: #69707a;
        border-bottom-width: 0.125rem;
        border-bottom-style: solid;
        border-bottom-color: transparent;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0;
        padding-right: 0;
        margin-left: 1rem;
        margin-right: 1rem;
    }
</style>
