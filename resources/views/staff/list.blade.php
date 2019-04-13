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
            background-color: #0a6aa1!important;
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
        <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />

        <!-- icon -->
        <script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
                <a  class="btn btn--custom" href="{{url('staff/create')}}"
{{--                    data-toggle="modal" data-target="#newStaff"--}}
                   style="background-color: #0a6aa1;color:#fff;border-radius: 3px;float: right;"
                   role="button">
                    Add Staff  <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="m-portlet m-portlet--full-height m-portlet--tabs">
        <div class="m-portlet__head"  style="margin-top: 20px;">
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
{{--                    <h2>--}}
{{--                        --}}{{--Staff--}}
{{--                    </h2>--}}
{{--                    <div class="input-group">--}}
{{--                        <!-- Button to "Search Staff" -->--}}
{{--                        <div class="btn-group mr-2" role="group" aria-label="First group">--}}
{{--                            <form class="form-inline my-2 my-lg-0">--}}
{{--                                <input class="form-control mr-sm-2" type="search" placeholder="Search Staff" aria-label="Search">--}}
{{--                                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}

{{--                        --}}{{--<!-- Button to Open the "Add Staff" Modal -->--}}
{{--                        --}}{{--<div class="btn-group mr-2" role="group" aria-label="Second group">--}}
{{--                            --}}{{--<form class="form-inline my-2 my-lg-0">--}}
{{--                                --}}{{--<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#newStaff"><ion-icon name="add-circle-outline"></ion-icon>New Staff</button>--}}
{{--                            --}}{{--</form>--}}
{{--                        --}}{{--</div>--}}

{{--                        --}}{{--<!-- Button to Open the "New Schedule" Modal -->--}}
{{--                        --}}{{--<div class="btn-group mr-2" role="group" aria-label="Second group">--}}
{{--                            --}}{{--<form class="form-inline my-2 my-lg-0">--}}
{{--                                --}}{{--<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#newSchedule"><ion-icon name="add-circle-outline"></ion-icon>New Schedule</button>--}}
{{--                            --}}{{--</form>--}}
{{--                        --}}{{--</div>--}}
{{--                    </div>--}}
                </div>

{{--                <br><p>--}}
{{--                    --}}{{--The .table-hover class enables a hover state (grey background on mouse over) on table rows:--}}
{{--                </p>--}}
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
                        <td>{{$user->staff_phone}}</td>
                        <td>-</td>
                        <td>-</td>
                        <td align="center">
                            <a href="/staff/{{ $user->id }}">
                                <ion-icon name="create" data-toggle="modal" data-target="#editStaff"></ion-icon>
                            </a>
                            <a href="/staff/{{ $user->id }}">
                                <ion-icon name="document" data-toggle="modal" data-target="#staffDetail"></ion-icon>
                            </a>

                            <a href="/staff/{{ $user->id }}">
                                <ion-icon name="delete" data-toggle="modal" data-target="#staffDetail"></ion-icon>
                            </a>


                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>

@endsection
@push('scripts')
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>



@endpush
