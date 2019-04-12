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
                <a class="btn-sm btn btn--custom" data-toggle="modal" data-target="#newStaff"
                   style="background-color: #0a6aa1;color:#fff;border-radius: 3px;float: right;"
                   role="button">
                    <i class="fas fa-plus-circle"></i> Add Staff
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
                            Staff
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

            {{--<div class="tab-content" id="myTabContent">--}}
            {{--<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">--}}
            {{--<table class="table table-hover">--}}
            {{--<thead>--}}
            {{--<tr>--}}
            {{--<th><b>#</b></th>--}}
            {{--<th><b>Fullname</b></th>--}}
            {{--<th><b>Email</b></th>--}}
            {{--<th><b>Phone</b></th>--}}
            {{--<th><b>Department</b></th>--}}
            {{--<th><b>Role</b></th>--}}
            {{--<th><b>Role</b></th>--}}
            {{--<th><b>Update</b></th>--}}
            {{--<th >Edit / Read More</th>--}}
            {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody id="sortable">--}}
            {{--@foreach($users as $index =>  $user)--}}
            {{--<td>{{$index+1}}</td>--}}
            {{--<td>{{$user->name}}</td>--}}
            {{--<td>{{$user->emil}}</td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
            {{--<td>{{$user->updated_at}}</td>--}}
            {{--<td>--}}
            {{--<a href="">--}}
            {{--<i class="fas fa-pencil-alt"></i>--}}
            {{--</a>--}}
            {{--<a href="">--}}
            {{--<i class="fas fa-trash"></i>--}}
            {{--</a>--}}
            {{--</td>--}}
            {{--@endforeach--}}
            {{--</tbody>--}}
            {{--</table>--}}
            {{--</div>--}}
            {{--</div>--}}

            <div class="container">

                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                    <h2>
                        {{--Staff--}}
                    </h2>
                    <div class="input-group">
                        <!-- Button to "Search Staff" -->
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search Staff"
                                       aria-label="Search">
                                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>

                        {{--<!-- Button to Open the "Add Staff" Modal -->--}}
                        {{--<div class="btn-group mr-2" role="group" aria-label="Second group">--}}
                        {{--<form class="form-inline my-2 my-lg-0">--}}
                        {{--<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#newStaff"><ion-icon name="add-circle-outline"></ion-icon>New Staff</button>--}}
                        {{--</form>--}}
                        {{--</div>--}}

                        {{--<!-- Button to Open the "New Schedule" Modal -->--}}
                        {{--<div class="btn-group mr-2" role="group" aria-label="Second group">--}}
                        {{--<form class="form-inline my-2 my-lg-0">--}}
                        {{--<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#newSchedule"><ion-icon name="add-circle-outline"></ion-icon>New Schedule</button>--}}
                        {{--</form>--}}
                        {{--</div>--}}
                    </div>
                </div>

                <br>
                <p>
                    {{--The .table-hover class enables a hover state (grey background on mouse over) on table rows:--}}
                </p>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Role</th>
                        <th>Edit / Read More</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $index =>  $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td align="center">
                                <ion-icon name="create" data-toggle="modal" data-target="#editStaff"></ion-icon>
                                <ion-icon name="document" data-toggle="modal" data-target="#staffDetail"></ion-icon>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <!--================ The "Add New Staff" Modal =================-->
            <div class="modal" id="newStaff">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Create New Staff Account</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action=""> <!-- action here -->

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_name" class="col-sm-4 col-form-label">Full Name</label>
                                            <div class="col-sm-8"><input type="text" class="form-control"
                                                                         id="staff_name"></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_id" class="col-sm-4 col-form-label">Staff ID</label>
                                            <div class="col-sm-8"><input type="number" class="form-control"
                                                                         id="staff_id"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_uname" class="col-sm-4 col-form-label">Username</label>
                                            <div class="col-sm-8"><input type="text" class="form-control"
                                                                         id="staff_uname"></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_pwd" class="col-sm-4 col-form-label">Password</label>
                                            <div class="col-sm-8"><input type="password" class="form-control"
                                                                         id="staff_pwd"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_id" class="col-sm-4 col-form-label">Date of Birth</label>
                                            <div class="col-sm-8"><input id="staff_datepicker" width="235"/></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_weigth" class="col-sm-4 col-form-label">Age</label>
                                            <div class="col-sm-8">
                                                <label class="sr-only" for="inlineFormInputGroupUsername"></label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="staff_age">
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
                                                    <input type="number" class="form-control" id="staff_height">
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
                                                    <input type="number" class="form-control" id="staff_weight">
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
                                                <select class="form-control" id="staff_role">
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
                                                                         id="staff_pos"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="inputAddress" class="col-sm-4 col-form-label">Address</label>
                                            <div class="col-sm-8"><input type="text" class="form-control"
                                                                         id="staff_inputAddress"
                                                                         placeholder="1234 Main St"></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="inputAddress2" class="col-sm-4 col-form-label">Address 2</label>
                                            <div class="col-sm-8"><input type="text" class="form-control"
                                                                         id="staff_inputAddress2"
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
                                                                         id="staff_inputAddress3" placeholder="City">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_province" class="col-sm-4 col-form-label">Province</label>
                                            <div class="col-sm-8">
                                                <select id="staff_province" class="form-control">
                                                    <option selected>-- Select --</option>
                                                    <option>Bangkok</option>
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
                                                                         id="staff_email" placeholder="abc@def.com">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_phone" class="col-sm-4 col-form-label">Phone</label>
                                            <div class="col-sm-8"><input type="number" class="form-control"
                                                                         id="staff_phone" placeholder="012-345-6789">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_status" class="col-sm-4 col-form-label">Status</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="staff_status">
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
                                                                         id="staff_preJob"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_status" class="col-sm-4 col-form-label">Picture</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control-file" id="staff_pic">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_status" class="col-sm-4 col-form-label">File</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control-file" id="staff_citizen">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="staff_note">Note: </label>
                                    <textarea class="form-control" id="staff_note" rows="3"></textarea>
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
            <!--================ End "Add New Staff" Modal =================-->

            <!--================ The "Edit Staff" Modal =================-->
            <div class="modal" id="editStaff">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Staff Account</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action=""> <!-- action here -->

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_name" class="col-sm-4 col-form-label">Full Name</label>
                                            <div class="col-sm-8"><input type="text" class="form-control"
                                                                         id="staff_name"></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_id" class="col-sm-4 col-form-label">Staff ID</label>
                                            <div class="col-sm-8"><input type="number" class="form-control"
                                                                         id="staff_id"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_uname" class="col-sm-4 col-form-label">Username</label>
                                            <div class="col-sm-8"><input type="text" class="form-control"
                                                                         id="staff_uname"></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_pwd" class="col-sm-4 col-form-label">Password</label>
                                            <div class="col-sm-8"><input type="password" class="form-control"
                                                                         id="staff_pwd"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_id" class="col-sm-4 col-form-label">Date of Birth</label>
                                            <div class="col-sm-8"><input id="staff_datepickerEdit" width="235"/></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_weigth" class="col-sm-4 col-form-label">Age</label>
                                            <div class="col-sm-8">
                                                <label class="sr-only" for="inlineFormInputGroupUsername"></label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="staff_age">
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
                                                    <input type="number" class="form-control" id="staff_height">
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
                                                    <input type="number" class="form-control" id="staff_weight">
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
                                                <select class="form-control" id="staff_role">
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
                                                                         id="staff_pos"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="inputAddress" class="col-sm-4 col-form-label">Address</label>
                                            <div class="col-sm-8"><input type="text" class="form-control"
                                                                         id="staff_inputAddress"
                                                                         placeholder="1234 Main St"></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="inputAddress2" class="col-sm-4 col-form-label">Address 2</label>
                                            <div class="col-sm-8"><input type="text" class="form-control"
                                                                         id="staff_inputAddress2"
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
                                                                         id="staff_inputAddress3" placeholder="City">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_province" class="col-sm-4 col-form-label">Province</label>
                                            <div class="col-sm-8">
                                                <select id="staff_province" class="form-control">
                                                    <option selected>-- Select --</option>
                                                    <option>Bangkok</option>
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
                                                                         id="staff_email" placeholder="abc@def.com">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_phone" class="col-sm-4 col-form-label">Phone</label>
                                            <div class="col-sm-8"><input type="number" class="form-control"
                                                                         id="staff_phone" placeholder="012-345-6789">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_status" class="col-sm-4 col-form-label">Status</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="staff_status">
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
                                                                         id="staff_preJob"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_status" class="col-sm-4 col-form-label">Picture</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control-file" id="staff_pic">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_status" class="col-sm-4 col-form-label">File</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control-file" id="staff_citizen">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="staff_note">Note: </label>
                                    <textarea class="form-control" id="staff_note" rows="3"></textarea>
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
            <!--================ End "Edit Staff" Modal =================-->

            <!--================ The "Staff Detail" Modal =================-->
            <div class="modal" id="staffDetail">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Staff Datail</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action=""> <!-- action here -->

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_pic" class="col-sm-4 col-form-label">Picture</label>
                                            <div class="col-sm-8"><input type="file" class="form-control" id="staff_pic"
                                                                         placeholder="แสดงรูปพนักงาน" disabled></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_name" class="col-sm-4 col-form-label">Full Name</label>
                                            <div class="col-sm-8"><input type="text" class="form-control"
                                                                         id="staff_name" disabled></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_id" class="col-sm-4 col-form-label">Staff ID</label>
                                            <div class="col-sm-8"><input type="number" class="form-control"
                                                                         id="staff_id" disabled></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_uname" class="col-sm-4 col-form-label">Username</label>
                                            <div class="col-sm-8"><input type="text" class="form-control"
                                                                         id="staff_uname" disabled></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_pwd" class="col-sm-4 col-form-label">Password</label>
                                            <div class="col-sm-8"><input type="password" class="form-control"
                                                                         id="staff_pwd" disabled></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_dob" class="col-sm-4 col-form-label">Date of Birth</label>
                                            <div class="col-sm-8"><input type="text" class="form-control" id="staff_dob"
                                                                         disabled></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_weigth" class="col-sm-4 col-form-label">Age</label>
                                            <div class="col-sm-8">
                                                <label class="sr-only" for="inlineFormInputGroupUsername"></label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="staff_age" disabled>
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
                                                    <input type="number" class="form-control" id="staff_height"
                                                           disabled>
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
                                                    <input type="number" class="form-control" id="staff_weight"
                                                           disabled>
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
                                            <div class="col-sm-8"><input type="text" class="form-control"
                                                                         id="staff_role" disabled></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_pos" class="col-sm-4 col-form-label">Position</label>
                                            <div class="col-sm-8"><input type="text" class="form-control" id="staff_pos"
                                                                         disabled></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="inputAddress" class="col-sm-4 col-form-label">Address</label>
                                            <div class="col-sm-8"><input type="text" class="form-control"
                                                                         id="staff_inputAddress"
                                                                         placeholder="1234 Main St" disabled></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="inputAddress2" class="col-sm-4 col-form-label">Address 2</label>
                                            <div class="col-sm-8"><input type="text" class="form-control"
                                                                         id="staff_inputAddress2"
                                                                         placeholder="Apartment, studio, or floor"
                                                                         disabled></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="inputAddress3" class="col-sm-4 col-form-label">Address 3</label>
                                            <div class="col-sm-8"><input type="text" class="form-control"
                                                                         id="staff_inputAddress3" placeholder="City"
                                                                         disabled></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_province" class="col-sm-4 col-form-label">Province</label>
                                            <div class="col-sm-8"><input type="text" class="form-control"
                                                                         id="staff_province" placeholder="Bangkok"
                                                                         disabled></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_email" class="col-sm-4 col-form-label">Email</label>
                                            <div class="col-sm-8"><input type="email" class="form-control"
                                                                         id="staff_email" placeholder="abc@def.com"
                                                                         disabled></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_phone" class="col-sm-4 col-form-label">Phone</label>
                                            <div class="col-sm-8"><input type="number" class="form-control"
                                                                         id="staff_phone" placeholder="012-345-6789"
                                                                         disabled></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_status" class="col-sm-4 col-form-label">Status</label>
                                            <div class="col-sm-8"><input type="text" class="form-control"
                                                                         id="staff_status" placeholder="Resigned"
                                                                         disabled></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_preJob" class="col-sm-4 col-form-label">Previous
                                                Job</label>
                                            <div class="col-sm-8"><input type="text" class="form-control"
                                                                         id="staff_preJob" disabled></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label for="staff_file" class="col-sm-4 col-form-label">File</label>
                                            <div class="col-sm-8"><input type="file" class="form-control"
                                                                         id="staff_citizen"
                                                                         placeholder="แสดงรูปบัตรปชช." disabled></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="staff_note">Note: </label>
                                    <textarea class="form-control" id="staff_note" rows="3" disabled></textarea>
                                </div>

                            </form> <!-- end action here -->
                        </div>

                    </div>
                </div>
                <!--================ End "Staff Detail" Modal =================-->

                <!-- Optional JavaScript -->

                <!-- DOB JavaScript -->
                <script>
                    $('#staff_datepicker').datepicker({
                        uiLibrary: 'bootstrap4'
                    });
                    $('#staff_datepickerEdit').datepicker({
                        uiLibrary: 'bootstrap4'
                    });
                </script>
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                        crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                        crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                        crossorigin="anonymous"></script>
                </body>
            </div>
        </div>

        @endsection
        @push('scripts')
            <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>



    @endpush
