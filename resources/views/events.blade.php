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

    <style>
      @media (max-width:575px) {
        .display-4 {
            font-size: 1.5rem;
        }
        .day h5 {
            background-color: #f8f9fa;
            padding: 3px 5px 5px;
            margin: -8px -8px 8px -8px;
        }
        .date {
            padding-left: 4px;
        }
      }

      @media (min-width: 576px) {
          .day {
              height: 14.2857vw;
          }
      }
    </style>

    <title>Staff Schedule</title>
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
              <a class="nav-link" href="owner.html">Dashboard</a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Management<span class="sr-only">(current)</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="manage-reserve.html">Reservations</a>
                  <a class="dropdown-item" href="#">Rates</a>
                  <a class="dropdown-item" href="manage-guests.html">Guest</a>
                  <a class="dropdown-item" href="manage-stock.html">Stock</a>
                  <a class="dropdown-item" href="#">Extra Services</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="staff-schedule.html">Staff Schedule</a>
                  <a class="dropdown-item" href="events.blade.php">Events</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Reports
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Bookings</a>
                  <a class="dropdown-item" href="#">Financials</a>
                  <a class="dropdown-item" href="#">Staff</a>
                </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Setting
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="setting-staff.html">New & Search Staff</a>
                <a class="dropdown-item" href="setting-rooms.html">Rooms</a>
                <a class="dropdown-item" href="setting-services.html">Services</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">My Account</a>
                <a class="dropdown-item" href="#">Email Notification</a>
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

      <!--================ Add Event =================-->
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEvent">
        Launch demo modal
      </button>

      <!-- Modal -->
      <div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <!--================ End Add Event =================-->

      <!--================ Staff Calendar =================-->
      <div class="container-fluid">
        <header>
          <h4 class="display-4 mb-4 text-center">November 2018</h4>
          <div class="row d-none d-sm-flex p-1 bg-dark text-white">
            <h5 class="col-sm p-1 text-center">Sunday</h5>
            <h5 class="col-sm p-1 text-center">Monday</h5>
            <h5 class="col-sm p-1 text-center">Tuesday</h5>
            <h5 class="col-sm p-1 text-center">Wednesday</h5>
            <h5 class="col-sm p-1 text-center">Thursday</h5>
            <h5 class="col-sm p-1 text-center">Friday</h5>
            <h5 class="col-sm p-1 text-center">Saturday</h5>
          </div>
        </header>
        <div class="row border border-right-0 border-bottom-0">
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
            <h5 class="row align-items-center">
              <span class="date col-1">29</span>
              <small class="col d-sm-none text-center text-muted">Sunday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
            <h5 class="row align-items-center">
              <span class="date col-1">30</span>
              <small class="col d-sm-none text-center text-muted">Monday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
            <h5 class="row align-items-center">
              <span class="date col-1">31</span>
              <small class="col d-sm-none text-center text-muted">Tuesday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">1</span>
              <small class="col d-sm-none text-center text-muted">Wednesday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">2</span>
              <small class="col d-sm-none text-center text-muted">Thursday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">3</span>
              <small class="col d-sm-none text-center text-muted">Friday</small>
              <span class="col-1"></span>
            </h5>
            <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small bg-info text-white" title="Test Event 1">Test Event 1</a>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">4</span>
              <small class="col d-sm-none text-center text-muted">Saturday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="w-100"></div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">5</span>
              <small class="col d-sm-none text-center text-muted">Sunday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">6</span>
              <small class="col d-sm-none text-center text-muted">Monday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">7</span>
              <small class="col d-sm-none text-center text-muted">Tuesday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">8</span>
              <small class="col d-sm-none text-center text-muted">Wednesday</small>
              <span class="col-1"></span>
            </h5>
            <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small bg-success text-white" title="Test Event 2">Test Event 2</a>
            <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small bg-danger text-white" title="Test Event 3">Test Event 3</a>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">9</span>
              <small class="col d-sm-none text-center text-muted">Thursday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">10</span>
              <small class="col d-sm-none text-center text-muted">Friday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">11</span>
              <small class="col d-sm-none text-center text-muted">Saturday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="w-100"></div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">12</span>
              <small class="col d-sm-none text-center text-muted">Sunday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">13</span>
              <small class="col d-sm-none text-center text-muted">Monday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">14</span>
              <small class="col d-sm-none text-center text-muted">Tuesday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">15</span>
              <small class="col d-sm-none text-center text-muted">Wednesday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">16</span>
              <small class="col d-sm-none text-center text-muted">Thursday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">17</span>
              <small class="col d-sm-none text-center text-muted">Friday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">18</span>
              <small class="col d-sm-none text-center text-muted">Saturday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="w-100"></div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">19</span>
              <small class="col d-sm-none text-center text-muted">Sunday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">20</span>
              <small class="col d-sm-none text-center text-muted">Monday</small>
              <span class="col-1"></span>
            </h5>
            <a class="event d-block p-1 pl-2 pr-2 mb-1 rounded text-truncate small bg-primary text-white" title="Test Event with Super Duper Really Long Title">Test Event with Super Duper Really Long Title</a>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">21</span>
              <small class="col d-sm-none text-center text-muted">Tuesday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">22</span>
              <small class="col d-sm-none text-center text-muted">Wednesday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">23</span>
              <small class="col d-sm-none text-center text-muted">Thursday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">24</span>
              <small class="col d-sm-none text-center text-muted">Friday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">25</span>
              <small class="col d-sm-none text-center text-muted">Saturday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="w-100"></div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">26</span>
              <small class="col d-sm-none text-center text-muted">Sunday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">27</span>
              <small class="col d-sm-none text-center text-muted">Monday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">28</span>
              <small class="col d-sm-none text-center text-muted">Tuesday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">29</span>
              <small class="col d-sm-none text-center text-muted">Wednesday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate ">
            <h5 class="row align-items-center">
              <span class="date col-1">30</span>
              <small class="col d-sm-none text-center text-muted">Thursday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
            <h5 class="row align-items-center">
              <span class="date col-1">1</span>
              <small class="col d-sm-none text-center text-muted">Friday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
            <h5 class="row align-items-center">
              <span class="date col-1">2</span>
              <small class="col d-sm-none text-center text-muted">Saturday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="w-100"></div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
            <h5 class="row align-items-center">
              <span class="date col-1">3</span>
              <small class="col d-sm-none text-center text-muted">Sunday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
            <h5 class="row align-items-center">
              <span class="date col-1">4</span>
              <small class="col d-sm-none text-center text-muted">Monday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
            <h5 class="row align-items-center">
              <span class="date col-1">5</span>
              <small class="col d-sm-none text-center text-muted">Tuesday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
            <h5 class="row align-items-center">
              <span class="date col-1">6</span>
              <small class="col d-sm-none text-center text-muted">Wednesday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
            <h5 class="row align-items-center">
              <span class="date col-1">7</span>
              <small class="col d-sm-none text-center text-muted">Thursday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
            <h5 class="row align-items-center">
              <span class="date col-1">8</span>
              <small class="col d-sm-none text-center text-muted">Friday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
          <div class="day col-sm p-2 border border-left-0 border-top-0 text-truncate d-none d-sm-inline-block bg-light text-muted">
            <h5 class="row align-items-center">
              <span class="date col-1">9</span>
              <small class="col d-sm-none text-center text-muted">Saturday</small>
              <span class="col-1"></span>
            </h5>
            <p class="d-sm-none">No events</p>
          </div>
        </div>
      </div>
    <!--================ End Staff Calendar =================-->

    <!-- Optional JavaScript -->


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
