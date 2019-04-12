<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- icon -->
    <script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>HotelCloud - Stock Management</title>
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
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#signIn">Log Out</button>
          </form>
      </div>
    </nav>
    <!--================ End Nav Bar =================-->


<div class="container">
    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
        <h2>รายงานสินค้าและวัตถุดิบ</h2>
        <div class="input-group">
          <!-- Search -->
          <div class="btn-group mr-2" role="group" aria-label="First group">
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search Room" aria-label="Search">
                  <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
          </div>
          <!-- Button to Open the  Modal -->
          <div class="btn-group mr-2" role="group" aria-label="Second group">
          <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#manageGoods">จัดการประเภทสินค้า</button>
              <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#newGoods"><ion-icon name="add-circle-outline"></ion-icon>รายงานสินค้าใหม่</button>
          </form>
          </div>
          </div>
        </div>
    </div>
    <p>The .table-hover class enables a hover state (grey background on mouse over) on table rows:</p>

  <table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>วันที่</th>
        <th>รายการ</th>
        <th>ชื่อสินค้า</th>
        <th>เลขที่เอกสาร</th>
        <th>Type</th>
        <th>ยกมา</th>
        <th>รับ</th>
        <th>จ่าย</th>
        <th>คงเหลือ</th>
        <th>ผู้ลงนาม</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>01/10/2018</td>
        <td>ยอดยกมา</td>
        <td>ผ้าขนหนู</td>
        <td>A18A016</td>
        <td>ISSUNP</td>
        <td>50</td>
        <td>0</td>
        <td>0</td>
        <td>50</td>
        <td>John Doe</td>
      </tr>
      <tr>
        <td>11/10/2018</td>
        <td>เบิกสินค้า</td>
        <td>ผ้าขนหนู</td>
        <td>A18A016</td>
        <td>ISSUNP</td>
        <td>0</td>
        <td>0</td>
        <td>40</td>
        <td>10</td>
        <td>Jane Doe</td>
      </tr>
      <tr>
        <td>14/10/2018</td>
        <td>ยอดยกมา</td>
        <td>แก้ว</td>
        <td>A18A016</td>
        <td>ISSUNP</td>
        <td>50</td>
        <td>0</td>
        <td>0</td>
        <td>50</td>
        <td>John Doe</td>
      </tr>
      <tr>
        <td>15/10/2018</td>
        <td>เบิกสินค้า</td>
        <td>แก้ว</td>
        <td>A18A016</td>
        <td>ISSUNP</td>
        <td>0</td>
        <td>0</td>
        <td>20</td>
        <td>30</td>
        <td>John Doe</td>
      </tr>
      <tr>
        <td>18/10/2018</td>
        <td>รับสินค้าเข้า</td>
        <td>แก้ว</td>
        <td>A18A016</td>
        <td>ISSUNP</td>
        <td>0</td>
        <td>10</td>
        <td>0</td>
        <td>40</td>
        <td>Alice Doe</td>
      </tr>
    </tbody>
  </table>
</div>

<!--================ Modal New Goods =================-->
<div class="modal fade" id="newGoods" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">รายงานสินค้า</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row-mt-3">
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">วันที่: </span>
                </div>
                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" disabled placeholder="ต้องขึ้นวันที่ ณ ปัจจุบัน อัตโนมัติ">
            </div>
          </div>
          <div class="row-mt-3">
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">รายการ: </span>
                </div>
                <select class="form-control form-control-sm">
                    <option>ยอดยกมา</option>
                    <option>เบิกสินค้า</option>
                    <option>รับสินค้าเข้า</option>
                </select>
            </div>
          </div>
          <div class="row-mt-3">
              <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">ชื่อสินค้า: </span>
                  </div>
                  <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
              </div>
          </div>
          <div class="row-mt-3">
              <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">เลขที่เอกสาร: </span>
                  </div>
                  <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
              </div>
          </div>
          <div class="row-mt-3">
              <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Type: </span>
                  </div>
                  <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
              </div>
          </div>
          <div class="row-mt-3">
              <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                        <select class="form-control form-control-sm" >
                            <option>ยกมา</option>
                            <option>รับ</option>
                            <option>จ่าย</option>
                        </select>
                  </div>
                  <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
              </div>
          </div>
          <div class="row-mt-3">
              <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">ลงนาม: </span>
                  </div>
                  <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" disabled placeholder="ขึ้นชื่อ account ของคนที่ใช้งานอยู่ปัจจุบัน">
              </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Add</button>
        </div>
      </div>
    </div>
</div>
<!--================ End Modal New Goods =================-->

<!--================ Modal Manage Goods =================-->
<div class="modal fade" id="manageGoods" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">เพิ่มสินค้าประเภทใหม่</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-sm">ชื่อสินค้าใหม่: </span>
                </div>
                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                <select class="form-control form-control-sm" >
                    <option>อาหารภายในห้องพัก</option>
                    <option>ของใช้ภายในห้องพัก</option>
                    <option>อุปกรณ์อื่นๆ ภายในห้องพัก</option>
                    <option>อาหารส่วนกลาง</option>
                    <option>ของใช้ส่วนกลาง</option>
                    <option>อุปกรณ์อื่นๆ ส่วนกลาง</option>
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Add</button>
          </div>
        </div>
      </div>
  </div>
<!--================ End Modal Manage Goods =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
