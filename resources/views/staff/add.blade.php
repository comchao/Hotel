@extends('layouts.admin')
@section('content')
    <style>
        .table th {
            padding: 1.2em !important;
            vertical-align: top;
            border-top: 1px solid #f4f5f8;
        }

        .table td {
            padding: 1.5em !important;
            vertical-align: top;
            border-top: 1px solid #f4f5f8;
        }

        .table th {
            background-color: rgba(232, 234, 244, 0.6);
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background: none;
        }

        .table-striped tbody tr:nth-of-type(2n) {
            background-color: rgba(232, 234, 244, 0.3)
        }

        table.dataTable.no-footer {
            border-bottom: unset !important;
        }

        .dataTables_filter {
            display: none;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .title {
            /* บีคอนส์ */
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            font-size: 20px;
            color: #3D438D;
        }

        .marker {
            top: -0.9em !important;
        }

        .m-checkbox.m-checkbox--brand.m-checkbox--solid > input:checked ~ span {
            background: #CC2A87 !important;
        }

        .dataTables_wrapper .pagination .page-item:hover > .page-link {
            background: #F484AE !important;
        }

        #removeChechBox {
            cursor: pointer;
        }

        .check_beacon {
            pointer-events: none
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            border: 1px solid transparent !important;
            border-radius: 18px !important;
            background: #DE238E !important;
            color: #fff !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background-color: #DE238E !important;
            color: white !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: white !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            box-sizing: border-box;
            display: inline-block;
            min-width: 1.5em;
            padding: 0.5em 1em;
            margin-left: 2px;
            text-align: center;
            text-decoration: none !important;
            cursor: pointer;
            border: 1px solid transparent !important;
            border-radius: 18px !important;
            color: #fff !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            box-sizing: border-box;
            display: inline-block;
            min-width: 1.5em;
            padding: 0.5em 1em;
            margin-left: 2px;
            text-align: center;
            text-decoration: none !important;
            cursor: pointer;
            border: 1px solid transparent !important;
            border-radius: 18px !important;
            color: #fff !important;
            background-color: #0a6aa1 !important;
            background: -webkit-linear-gradient(top, #DE238E 0%, #DE238E 100%) !important;
        }

        #eventTable .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: white !important;
        }

        #eventTable .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover {
            color: #fff !important;
        }

        #filter_bar {
            padding: 20px;
            height: auto;
        }

        @media (min-width: 426px) {
            #filter_bar {
                position: fixed;
                top: 107px;
                left: 0;
                right: 0;
                z-index: 10;
            }

            #main-content {
                padding-top: 90px;
            }
        }

        @media (min-width: 1025px) {
            #filter_bar {
                left: 255px;
                top: 70px;
            }
        }

        #search_text {
            width: 150px;
        }

        .dataTables_wrapper .dataTable td .m-checkbox, .dataTables_wrapper .dataTable th .m-checkbox {
            left: 7px;
        }

    </style>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- DOB -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css"/>

        <!-- icon -->
        <script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
              crossorigin="anonymous">
        <title>HotelCloud - Add New Staff & Schedule Management</title>
    </head>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <div class="m-portlet m-portlet--full-height m-portlet--tabs" id="filter_bar">
        <div class="row" style="margin-top: 20px;">
            <div class="col-3">
                {{--<a href="/admin/"> ผู้ใช้งาน</a>--}}
            </div>
            <div class="col-4"></div>
            <div class="col-3"></div>
            <div class="col-2">
                <a  class="btn btn--custom" href="{{route('staff.index')}}"
                   style="background-color: #0a6aa1;color:#fff;border-radius: 5px;float: right;"
                   role="button">
                    <i class="fas fa-back"></i> กลับ
                </a>
            </div>
        </div>
    </div>

    <div class="m-portlet m-portlet--full-height m-portlet--tabs">
        <div class="m-portlet__head" style="margin-top: 20px;">
            <div class="m-portlet__head-tools">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="title">
                            Create New Staff Account
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-portlet__body" id="eventTable">
            <div class="tab-content">
                <div class="tab-pane active" id="m_user_profile_tab_1">

                </div>
                <div class="tab-pane " id="m_user_profile_tab_2"></div>
                <div class="tab-pane " id="m_user_profile_tab_3"></div>
            </div>
        </div>

        <div class="m-portlet__body" id="eventTable">
            <div class="container">

                <div  id="newStaff">
                    <!-- Modal body -->
                            <div class="modal-body">
                                <form action=""> <!-- action here -->

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="staff_name" class="col-sm-4 col-form-label">Full Name</label>
                                                <div class="col-sm-8"><input type="text" class="form-control"
                                                                            name="staff_name" id="staff_name"></div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="staff_id" class="col-sm-4 col-form-label">Staff ID</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"
                                                           name="staff_name" id="staff_name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="staff_uname" class="col-sm-4 col-form-label">Username</label>
                                                <div class="col-sm-8"><input type="text" class="form-control"
                                                                             name="staff_uname" id="staff_uname"></div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="staff_pwd" class="col-sm-4 col-form-label">Password</label>
                                                <div class="col-sm-8"><input type="password" class="form-control"
                                                                             name="staff_pwd" id="staff_pwd"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="staff_id" class="col-sm-4 col-form-label">Date of Birth</label>
                                                <div class="col-sm-8"><input  class="form-control" name="staff_datepicker" id="staff_birth" width="235"/></div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="staff_weigth" class="col-sm-4 col-form-label">Age</label>
                                                <div class="col-sm-8">
                                                    <label class="sr-only" for="inlineFormInputGroupUsername"></label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control"  min="10" name="staff_age" id="staff_age">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">years</div>
                                                        </div>
                                                    </div><!--calculate age automatic-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="staff_height" class="col-sm-4 col-form-label">Height</label>
                                                <div class="col-sm-8 my-1">
                                                    <label class="sr-only" for="inlineFormInputGroupUsername"></label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" min="50" name="staff_height" id="staff_height">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">cm.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="staff_weight" class="col-sm-4 col-form-label">Weight</label>
                                                <div class="col-sm-8 my-1">
                                                    <label class="sr-only" for="inlineFormInputGroupUsername"></label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" min="50" name="staff_weight" id="staff_weight">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">kg.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="staff_role" class="col-sm-4 col-form-label">Department</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="staff_role" id="staff_role">
                                                        <option>-- Select --</option>
                                                        <option>Reception</option>
                                                        <option>Housekeeping</option>
                                                        <option>Food and Beverage</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="staff_pos" class="col-sm-4 col-form-label">Position</label>
                                                <div class="col-sm-8"><input type="text" class="form-control"
                                                                             name="staff_pos" id="staff_pos"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="inputAddress" class="col-sm-4 col-form-label">Address</label>
                                                <div class="col-sm-8"><input type="text" class="form-control"
                                                                             name="staff_inputAddress" id="staff_inputAddress"
                                                                             placeholder="1234 Main St"></div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="inputAddress2" class="col-sm-4 col-form-label">Address 2</label>
                                                <div class="col-sm-8"><input type="text" class="form-control"
                                                                             name="staff_inputAddress2" id="staff_inputAddress2"
                                                                             placeholder="Apartment, studio, or floor">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="inputAddress3" class="col-sm-4 col-form-label">Address 3</label>
                                                <div class="col-sm-8"><input type="text" class="form-control"
                                                                             name="staff_inputAddress3" id="staff_inputAddress3"
                                                                             placeholder="City">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="staff_province" class="col-sm-4 col-form-label">Province</label>
                                                <div class="col-sm-8">
                                                    <select name="staff_province" id="staff_province" class="form-control">
                                                        <option selected>-- Select --</option>
                                                        <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                                                        <option value="กระบี่">กระบี่ </option>
                                                        <option value="กาญจนบุรี">กาญจนบุรี </option>
                                                        <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
                                                        <option value="กำแพงเพชร">กำแพงเพชร </option>
                                                        <option value="ขอนแก่น">ขอนแก่น</option>
                                                        <option value="จันทบุรี">จันทบุรี</option>
                                                        <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
                                                        <option value="ชัยนาท">ชัยนาท </option>
                                                        <option value="ชัยภูมิ">ชัยภูมิ </option>
                                                        <option value="ชุมพร">ชุมพร </option>
                                                        <option value="ชลบุรี">ชลบุรี </option>
                                                        <option value="เชียงใหม่">เชียงใหม่ </option>
                                                        <option value="เชียงราย">เชียงราย </option>
                                                        <option value="ตรัง">ตรัง </option>
                                                        <option value="ตราด">ตราด </option>
                                                        <option value="ตาก">ตาก </option>
                                                        <option value="นครนายก">นครนายก </option>
                                                        <option value="นครปฐม">นครปฐม </option>
                                                        <option value="นครพนม">นครพนม </option>
                                                        <option value="นครราชสีมา">นครราชสีมา </option>
                                                        <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
                                                        <option value="นครสวรรค์">นครสวรรค์ </option>
                                                        <option value="นราธิวาส">นราธิวาส </option>
                                                        <option value="น่าน">น่าน </option>
                                                        <option value="นนทบุรี">นนทบุรี </option>
                                                        <option value="บึงกาฬ">บึงกาฬ</option>
                                                        <option value="บุรีรัมย์">บุรีรัมย์</option>
                                                        <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
                                                        <option value="ปทุมธานี">ปทุมธานี </option>
                                                        <option value="ปราจีนบุรี">ปราจีนบุรี </option>
                                                        <option value="ปัตตานี">ปัตตานี </option>
                                                        <option value="พะเยา">พะเยา </option>
                                                        <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
                                                        <option value="พังงา">พังงา </option>
                                                        <option value="พิจิตร">พิจิตร </option>
                                                        <option value="พิษณุโลก">พิษณุโลก </option>
                                                        <option value="เพชรบุรี">เพชรบุรี </option>
                                                        <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
                                                        <option value="แพร่">แพร่ </option>
                                                        <option value="พัทลุง">พัทลุง </option>
                                                        <option value="ภูเก็ต">ภูเก็ต </option>
                                                        <option value="มหาสารคาม">มหาสารคาม </option>
                                                        <option value="มุกดาหาร">มุกดาหาร </option>
                                                        <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
                                                        <option value="ยโสธร">ยโสธร </option>
                                                        <option value="ยะลา">ยะลา </option>
                                                        <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
                                                        <option value="ระนอง">ระนอง </option>
                                                        <option value="ระยอง">ระยอง </option>
                                                        <option value="ราชบุรี">ราชบุรี</option>
                                                        <option value="ลพบุรี">ลพบุรี </option>
                                                        <option value="ลำปาง">ลำปาง </option>
                                                        <option value="ลำพูน">ลำพูน </option>
                                                        <option value="เลย">เลย </option>
                                                        <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                                                        <option value="สกลนคร">สกลนคร</option>
                                                        <option value="สงขลา">สงขลา </option>
                                                        <option value="สมุทรสาคร">สมุทรสาคร </option>
                                                        <option value="สมุทรปราการ">สมุทรปราการ </option>
                                                        <option value="สมุทรสงคราม">สมุทรสงคราม </option>
                                                        <option value="สระแก้ว">สระแก้ว </option>
                                                        <option value="สระบุรี">สระบุรี </option>
                                                        <option value="สิงห์บุรี">สิงห์บุรี </option>
                                                        <option value="สุโขทัย">สุโขทัย </option>
                                                        <option value="สุพรรณบุรี">สุพรรณบุรี </option>
                                                        <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                                                        <option value="สุรินทร์">สุรินทร์ </option>
                                                        <option value="สตูล">สตูล </option>
                                                        <option value="หนองคาย">หนองคาย </option>
                                                        <option value="หนองบัวลำภู">หนองบัวลำภู </option>
                                                        <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                                                        <option value="อุดรธานี">อุดรธานี </option>
                                                        <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
                                                        <option value="อุทัยธานี">อุทัยธานี </option>
                                                        <option value="อุบลราชธานี">อุบลราชธานี</option>
                                                        <option value="อ่างทอง">อ่างทอง </option>
                                                        <option value="อื่นๆ">อื่นๆ</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="staff_email" class="col-sm-4 col-form-label">Email</label>
                                                <div class="col-sm-8"><input type="email" class="form-control"
                                                                             name="staff_email" id="staff_email" placeholder="abc@def.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="staff_phone" class="col-sm-4 col-form-label">Phone</label>
                                                <div class="col-sm-8"><input type="number" class="form-control"
                                                                             name="staff_phone" id="staff_phone" placeholder="012-345-6789">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="staff_status" class="col-sm-4 col-form-label">Status</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="staff_status" id="staff_status">
                                                        <option>-- Select --</option>
                                                        <option>Working</option>
                                                        <option>Fired</option>
                                                        <option>Resigned</option>
                                                        <option>Retired</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="staff_preJob" class="col-sm-4 col-form-label">Previous
                                                    Job</label>
                                                <div class="col-sm-8"><input type="text" class="form-control"
                                                                             name="staff_previous_job" id="staff_previous_job"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="staff_status" class="col-sm-4 col-form-label">Picture</label>
                                                <div class="col-sm-8">
                                                    <input type="file" class="form-control" name="staff_pic" id="staff_pic">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group row">
                                                <label for="staff_status" class="col-sm-4 col-form-label">File</label>
                                                <div class="col-sm-8">
                                                    <input type="file" class="form-control" name="staff_citizen" id="staff_citizen">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="staff_note">Note: </label>
                                        <textarea class="form-control" name="staff_note" id="staff_note" rows="3"></textarea>
                                    </div>

                                </form> <!-- end action here -->
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button align="center" type="button" class="btn btn-success">Save</button>
                            </div>
                        </div>


            </div>
        </div>
        @endsection
        @push('scripts')
            <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

            <script>
                $('#staff_birth').datepicker({
                    uiLibrary: 'bootstrap4'
                });
            </script>
       @endpush
