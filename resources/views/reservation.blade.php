<!doctype html>
<html lang="en">
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

    <title>HotelCloud - Reservation Management</title>
  </head>
  <body>

    <!--================ Nav Bar =================-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">HotelCloud</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.blade.php">Dashboard</a>
          </li>
          <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Management<span class="sr-only">(current)</span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="reservation.blade.php">Reservations</a>
                <a class="dropdown-item" href="services.blade.php">Services</a>
                <a class="dropdown-item" href="guests.blade.php">Guest</a>
                <a class="dropdown-item" href="stock.blade.php">Stock</a>
                <a class="dropdown-item" href="staff.blade.php">Staff</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="report.blade.php">Bookings Report</a>
              </div>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Setting
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="setting.blade.php">Rooms & Services</a>
              </div>
            </li>
          </ul>

          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Hello, Kanyarush
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="account.blade.php">My Account</a>
              </div>
            </li>
          </ul>

          <!-- Button to Open the "Logout" Modal -->
          <form class="form-inline my-2 my-lg-0">
            <button type="button" class="btn btn-outline-danger" >Log Out</button>
          </form>
      </div>
    </nav>
    <!--================ End Nav Bar =================-->

      <div class="container">
        <div class="row">
          <!--================ Add Booking =================-->
          <div class="col-sm-8"><div class="container">
            <div class="pb-2 mt-4 mb-2 border-bottom"><h4>New Booking</h4></div>
                  <div class="pb-2 mt-4 mb-2 border-bottom"><h4>New Booking test </h4></div>
            <select class="form-control">
                <option>-- Room Name --</option> <!-- ต้องดึงข้อมูลที่ผู้ใช้สร้าง ขึ้นมาแสดง -->
                <option>101</option>
                <option>201</option>
                <option>301</option>
                <option>401</option>
            </select><br>
            <form>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Guest" aria-label="Guest Name" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#newGuest"><ion-icon name="person-add"></ion-icon> New Guest</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                          <label for="datenewbooking" class="col-sm-4 col-form-label">Check In</label>
                          <div class="col-sm-8"><input id="datenewbooking" width="213" /></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label for="nights" class="col-sm-4 col-form-label">Nights</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="nights">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label for="price" class="col-sm-4 col-form-label">Price</label>
                            <div class="col-sm-8"><input type="text" class="form-control" id="price" placeholder="แสดงราคาอัตโนมัติ" disabled></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label for="promo_code" class="col-sm-4 col-form-label">Promotion Code</label>
                            <div class="col-sm-8"><input type="text" class="form-control" id="promo_code" disabled></div>
                        </div>
                    </div>
                </div>

                <div class="button dropdown">
                    <select for="req" class="form-control" id="selector">
                      <option value="nonReq">Non Special Request</option>
                      <option value="addReq">Special Request</option>
                    </select>
                </div>

                <div class="output">
                    <div id="addReq" class="req addReq">
                      <textarea class="form-control" id="" rows="3" placeholder="Typing Special Request Here"></textarea>
                    </div>
                </div>

                <br><button type="submit" class="btn btn-primary">Submit</button>
            </form>

          </div></div>
          <!--================ End Add Booking =================-->

          <!--================ The "Add New Guest" Modal =================-->
          <div class="modal" id="newGuest">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <div class="modal-header">
                    <h4 class="modal-title">New Guest</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <div class="modal-body">
                      <form action=""> <!-- action here -->

                            <div class="row">
                              <div class="col">
                                <div class="form-group row">
                                  <label for="guest_name" class="col-sm-4 col-form-label">First Name</label>
                                  <div class="col-sm-8"><input type="text" class="form-control" id="guest_name"></div>
                                </div>
                              </div>
                              <div class="col">
                                  <div class="form-group row">
                                    <label for="guest_lastname" class="col-sm-4 col-form-label">Last Name</label>
                                    <div class="col-sm-8"><input type="text" class="form-control" id="guest_lastname"></div>
                                  </div>
                              </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="guest_nationalID" class="col-sm-4 col-form-label">National ID</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" id="guest_nationalID"></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="guest_passportID" class="col-sm-4 col-form-label">Passport ID</label>
                                        <div class="col-sm-8"><input type="text" class="form-control" id="guest_passportID"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                  <div class="form-group row">
                                    <label for="guest_email" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8"><input type="text" class="form-control" id="guest_email" placeholder="abc@def.com"></div>
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-group row">
                                      <label for="guest_phone" class="col-sm-4 col-form-label">Phone</label>
                                      <div class="col-sm-8"><input type="text" class="form-control" id="guest_phone" placeholder="012-345-6789"></div>
                                  </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                  <div class="form-group row">
                                    <label for="guest_address" class="col-sm-4 col-form-label">Address</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="guest_address">
                                    </div>
                                  </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="guest_fileType" class="col-sm-4 col-form-label">File Type</label>
                                        <div class="col-sm-8">
                                          <select class="form-control" id="guest_fileType">
                                            <option value="nationalID">National ID</option>
                                            <option value="passportID">Passport ID</option>
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group row">
                                        <label for="guest_file" class="col-sm-4 col-form-label">Add File</label>
                                        <div class="col-sm-8">
                                          <input type="file" class="form-control-file" id="guest_file">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="guest_note">Note: </label>
                                <textarea class="form-control" id="guest_note" rows="2"></textarea>
                            </div>

                      </form>
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-success">Add New Guest</button>
                    </div>

                  </div>
                </div>
              </div>
          <!--================ End "Add New Guest" Modal =================-->

          <!--================ Check Room Available =================-->
          <div class="col-sm-4"><div class="container">
            <form>
            <div class="pb-2 mt-4 mb-2 border-bottom"><h4>Room Available</h4></div>
            <div class="form-group row">
              <label for="" class="col-sm-4 col-form-label">Check in</label>
              <div class="col-sm-8"><input id="datepicker_chkIn" width="206" /></div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-4 col-form-label">Check out</label>
              <div class="col-sm-8"><input id="datepicker_chkOut" width="206" /></div>
            </div>
            <div class="form-group row">
              <label for="room_type" class="col-sm-4 col-form-label">Type</label>
              <div class="col-sm-8">
                <select class="form-control" id="room_type">
                  <option>Standard Room</option>
                  <option>Deluxe Room</option>
                  <option>Joint Room</option>
                  <option>Suite</option>
                </select>
              </div>
            </div>
            <button type="button" class="btn btn-success">Check Available</button>
            </form>
          </div></div>
          <!--================ End Check Room Available =================-->
        </div><!--row-->
      </div>


<div class="container">

<div class="row-mt-3">
  <div class="pb-2 mt-4 mb-2 border-bottom"><h4>Overview</h4></div>
</div>
<div class="row-mt-3">
  <div class="table-responsive">
    <div id="table-scroll" class="table-scroll">
        <div class="table-wrap">
          <table class="main-table">
            <thead>
              <tr>
                <th class="fixed-side" scope="col">&nbsp;</th>
                <th scope="col">1 Nov 2018</th>
                <th scope="col">2 Nov 2018</th>
                <th scope="col">3 Nov 2018</th>
                <th scope="col">4 Nov 2018</th>
                <th scope="col">5 Nov 2018</th>
                <th scope="col">6 Nov 2018</th>
                <th scope="col">7 Nov 2018</th>
                <th scope="col">8 Nov 2018</th>
                <th scope="col">9 Nov 2018</th>
                <th scope="col">10 Nov 2018</th>
                <th scope="col">11 Nov 2018</th>
                <th scope="col">12 Nov 2018</th>
                <th scope="col">13 Nov 2018</th>
                <th scope="col">14 Nov 2018</th>
                <th scope="col">15 Nov 2018</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th class="fixed-side">Standard Room (101)</th>
                <td></td>
                <td><a href="#">Pratchayanee</a></td>
                <td>Pratchayanee</td>
                <td>Pratchayanee</td>
                <td></td>
                <td></td>
                <td>Rangsiman</td>
                <td>Rangsiman</td>
                <td>Rangsiman</td>
                <td>Rangsiman</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <th class="fixed-side">Deluxe Room (201)</th>
                <td>Napa</td>
                <td>Napa</td>
                <td>Napa</td>
                <td></td>
                <td></td>
                <td></td>
                <td>Poompak</td>
                <td>Poompak</td>
                <td></td>
                <td>Sansuay</td>
                <td>Sansuay</td>
                <td>Sansuay</td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <th class="fixed-side">Deluxe Room (301)</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Suda</td>
                <td>Suda</td>
                <td>Suda</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Srijan</td>
                <td>Srijan</td>
                <td>Srijan</td>
                <td></td>
              </tr>
              <tr>
                <th class="fixed-side">Suite (401)</th>
                <td></td>
                <td>Dave</td>
                <td>Dave</td>
                <td></td>
                <td>Ania</td>
                <td>Ania</td>
                <td>Ania</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <th class="fixed-side">Joint Room (403)</th>
                <td></td>
                <td>Praewpan</td>
                <td>Praewpan</td>
                <td>Nantika</td>
                <td>Nantika</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <th class="fixed-side">Joint Room (404)</th>
                <td></td>
                <td>Praewpan</td>
                <td>Praewpan</td>
                <td>Nantika</td>
                <td>Nantika</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th class="fixed-side">Total: 6</th>
                <td>1</td>
                <td>5</td>
                <td>5</td>
                <td>3</td>
                <td>4</td>
                <td>2</td>
                <td>4</td>
                <td>2</td>
                <td>1</td>
                <td>2</td>
                <td>1</td>
                <td>2</td>
                <td>1</td>
                <td>1</td>
                <td>0</td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
  </div>
</div>

</div>


<style>
.table-scroll {
	position:relative;
	max-width:1200px;
	margin:auto;
	overflow:hidden;
	border:1px solid #000;
}
.table-wrap {
	width:100%;
	overflow:auto;
}
.table-scroll table {
	width:100%;
	margin:auto;
	border-collapse:separate;
	border-spacing:0;
}
.table-scroll th, .table-scroll td {
	padding:5px 10px;
	border:1px solid #000;
	white-space:nowrap;
	vertical-align:top;
}
.clone {
	position:absolute;
	top:0;
	left:0;
	pointer-events:none;
}
.clone th, .clone td {
	visibility:hidden
}
.clone td, .clone th {
	border-color:transparent
}
.clone tbody th {
	visibility:visible;
}
.clone .fixed-side {
	border:1px solid #000;
	visibility:visible;
  background: white;
}
.clone thead, .clone tfoot{background:transparent;}
</style>

<script>
// requires jquery library
jQuery(document).ready(function() {
   jQuery(".main-table").clone(true).appendTo('#table-scroll').addClass('clone');
 });
</script>

    <!-- Date JavaScript -->
    <script>

      $('#datenewbooking').datepicker({
          uiLibrary: 'bootstrap4'
      });

      $('#datepicker_chkIn').datepicker({
          uiLibrary: 'bootstrap4'
      });

      $('#datepicker_chkOut').datepicker({
          uiLibrary: 'bootstrap4'
      });

      function addSpecialRequest() {
        // Get the checkbox
        var checkBox = document.getElementById("myCheck");
        // Get the output text
        var textarea = document.getElementById("textarea");

        // If the checkbox is checked, display the output text
        if (checkBox.checked == true){
          textarea.style.display = "block";
        } else {
          textarea.style.display = "none";
        }
      }

      $(function() {
        $('#selector').change(function(){
        $('.req').hide();
        $('#' + $(this).val()).show();
        });
      });

    </script>

    <style>
        .req {
          display: none;
        }
    </style>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
