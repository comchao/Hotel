
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
      color: #2F353A;
    }

    .marker {
      top: -0.9em !important;
    }

    .m-checkbox.m-checkbox--brand.m-checkbox--solid > input:checked ~ span {
      background: #0097A7 !important;
    }

    .dataTables_wrapper .pagination .page-item:hover > .page-link {
      background: #0097A7 !important;
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
      background: #0097A7 !important;
      color: #fff !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
      background-color: #0097A7 !important;
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
      background-color: #0097A7 !important;
      background: -webkit-linear-gradient(top, #0097A7 0%, #0097A7 100%) !important;
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


  {{--<!doctype html>--}}
  {{--<html lang="en">--}}
  {{--<head>--}}
    {{--<!-- Required meta tags -->--}}
    {{--<meta charset="utf-8">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}

    {{--<!-- DOB -->--}}
    {{--<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>--}}
    {{--<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />--}}

    {{--<!-- icon -->--}}
    {{--<script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>--}}

    {{--<!-- Bootstrap CSS -->--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}

    {{--<title>HotelCloud - My Account</title>--}}
  {{--</head>--}}
  {{--<body>--}}

  {{--<!--================ Nav Bar =================-->--}}
  {{--<nav class="navbar navbar-expand-lg navbar-light bg-light">--}}
    {{--<a class="navbar-brand" href="#">HotelCloud</a>--}}
    {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
      {{--<span class="navbar-toggler-icon"></span>--}}
    {{--</button>--}}

    {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
      {{--<ul class="navbar-nav mr-auto">--}}
        {{--<li class="nav-item">--}}
          {{--<a class="nav-link" href="dashboard.blade.php">Dashboard</a>--}}
        {{--</li>--}}
        {{--<li class="nav-item dropdown">--}}
          {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
            {{--Management--}}
          {{--</a>--}}
          {{--<div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
            {{--<a class="dropdown-item" href="reservation.blade.php">Reservations</a>--}}
            {{--<a class="dropdown-item" href="services.blade.php">Services</a>--}}
            {{--<a class="dropdown-item" href="guests.blade.php">Guest</a>--}}
            {{--<a class="dropdown-item" href="stock.blade.php">Stock</a>--}}
            {{--<a class="dropdown-item" href="staff.blade.php">Staff</a>--}}
            {{--<div class="dropdown-divider"></div>--}}
            {{--<a class="dropdown-item" href="report.blade.php">Bookings Report</a>--}}
          {{--</div>--}}
        {{--</li>--}}
        {{--<li class="nav-item dropdown">--}}
          {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
            {{--Setting--}}
          {{--</a>--}}
          {{--<div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
            {{--<a class="dropdown-item" href="setting.blade.php">Rooms & Services</a>--}}
          {{--</div>--}}
        {{--</li>--}}
      {{--</ul>--}}

      {{--<ul class="navbar-nav">--}}
        {{--<li class="nav-item dropdown active">--}}
          {{--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
            {{--Hello, Kanyarush<span class="sr-only">(current)</span>--}}
          {{--</a>--}}
          {{--<div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
            {{--<a class="dropdown-item" href="account.blade.php">My Account</a>--}}
          {{--</div>--}}
        {{--</li>--}}
      {{--</ul>--}}

      {{--<!-- Button to Open the "Logout" Modal -->--}}

      {{--<a class="btn btn-outline-danger"  href="{{ route('logout') }}"--}}
         {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>--}}
        {{--{{ __('ออกจากระบบ') }}--}}
      {{--</a>--}}


      {{--<form class="form-inline my-2 my-lg-0"  id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
        {{--@csrf--}}
      {{--</form>--}}

      {{--<form class="form-inline my-2 my-lg-0">--}}
        {{--<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#signIn">Log Out</button>--}}
      {{--</form>--}}
    {{--</div>--}}
  {{--</nav>--}}
  {{--</body>--}}
  {{--</html>--}}


@endsection

@push('scripts')
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@endpush



