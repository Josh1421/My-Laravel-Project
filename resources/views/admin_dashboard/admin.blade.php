<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script src="https://kit.fontawesome.com/fb4c7e2297.js" crossorigin="anonymous"></script>
    <title>Admin Dashboard</title>
  </head>
  <body>
    <div class="wrapper">

      <!-- Sidebar -->
      <div class="sidebar shadow">
        <div class="brand-picture">
          <img src="{{ asset('img/1654398760-Deluxe.jpg') }}" alt="" class="w-100">
        </div>
        <div class="nav-header">
          <b>Main Navigation</b>
        </div>
        <div class="sidebar-menu">
          <ul>
            <li><a href="#"><i class="fa-solid fa-house-user"></i>Home</a></li>
            <li><a href="/HotelBooking/booked"><i class="fa-solid fa-book"></i>Booked</a></li>
            <li><a href="/HotelBooking/checkin"><i class="fa-solid fa-right-to-bracket"></i>Check In</a></li>
            <li><a href="#"><i class="fa-solid fa-right-from-bracket"></i>Check Out</a></li>
            <li><a href="/HotelBooking/room_categories"><i class="fa-solid fa-list"></i>Room Category List</a></li>
            <li><a href="/HotelBooking/rooms"><i class="fa-solid fa-bed"></i>Rooms</a></li>
            <li><a href="#"><i class="fa-solid fa-users"></i>Users</a></li>
            <li><a href="#"><i class="fa-solid fa-gears"></i>Site Settings</a></li>
          </ul>
        </div>

        <div class="social_media">
          <a href="#"><i class="fa-brands fa-facebook"></i></a>
          <a href="#"><i class="fa-brands fa-twitter"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
        </div>
      </div>

      <div class="main_content">
        <main>

          <!-- Header -->
          <div class="header d-flex justify-content-between shadow">
            <div class="d-flex align-items-center"><b style="font-size:1.5em">Dashboard</b></div>
            <div class="search p-1">
              <input type="text">
              <button class="btn-search"><i class="fa-solid fa-magnifying-glass" style="font-size:20px;"></i></button>
            </div>
            <div class="d-flex align-items-center">
              <div>
                <b>Joshua Pagatpat</b>
              </div>
              <div class="ms-2 p-2 round" style="background: #3399ff; border-radius:100%;">
                <i class="fa-solid fa-user" style="color:#ffffff;"></i>
              </div>
            </div>
          </div>

          <div class="info">

            <!-- Cards -->
            <div class="row">

              <div class="col cards-col shadow d-flex align-items-center">
                <div class="">
                  <b style="color: black; font-size:1.5em;">15</b>
                  <p class="fw-bold m-0" style="font-size: 0.9em">Check-in</p>
                </div>
                <div class="ms-auto">
                  <i class="fa-solid fa-building-circle-check" style="font-size: 50px; color:#00cc00;"></i>
                </div>
              </div>

              <div class="col cards-col shadow d-flex align-items-center">
                <div class="">
                  <b style="color: black; font-size:1.5em;">2</b>
                  <p class="fw-bold m-0" style="font-size: 0.9em">Booked</p>
                </div>
                <div class="ms-auto">
                  <i class="fa-solid fa-book" style="font-size: 50px; color:#8080ff;"></i>
                </div>
              </div>

              <div class="col cards-col shadow d-flex align-items-center">
                <div class="">
                  <b style="color: black; font-size:1.5em;">13</b>
                  <p class="fw-bold m-0" style="font-size: 0.9em">Available Rooms</p>
                </div>
                <div class="ms-auto">
                  <i class="fa-solid fa-bed" style="font-size: 50px; color:#80ff80;"></i>
                </div>
              </div>

              <div class="col cards-col shadow d-flex align-items-center">
                <div class="">
                  <b style="color: black; font-size:1.5em;">2</b>
                  <p class="fw-bold m-0" style="font-size: 0.9em">Unavailable Rooms</p>
                </div>
                <div class="ms-auto">
                  <i class="fa-solid fa-bed" style="font-size: 50px; color:#ff8080;"></i>
                </div>
              </div>
            </div>

            <!-- Content Table -->
            <div class="content-2 my-3">
              <div class="row content-row">
                <div class="col shadow">
                  <div class="recent-payments">
                    <div class="recent-payments-header d-flex justify-content-around">
                      <div class="d-flex align-items-center"><b style="font-size:1.3em;">Recent Payments</b></div>
                      <div class="d-flex align-items-center"><button class="btn btn-brand">View All</button></div>
                    </div>
                    <div>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>School</th>
                            <th>Amount</th>
                            <th>Option</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Joshua Pagatpat</td>
                            <td>Techonlogical University of the Philippines</td>
                            <td>$120</td>
                            <td><button class="btn btn-brand">View</button></td>
                          </tr>
                          <tr>
                            <td>Joshua Pagatpat</td>
                            <td>Techonlogical University of the Philippines</td>
                            <td>$120</td>
                            <td><button class="btn btn-brand">View</button></td>
                          </tr>
                          <tr>
                            <td>Joshua Pagatpat</td>
                            <td>Techonlogical University of the Philippines</td>
                            <td>$120</td>
                            <td><button class="btn btn-brand">View</button></td>
                          </tr>
                          <tr>
                            <td>Joshua Pagatpat</td>
                            <td>Techonlogical University of the Philippines</td>
                            <td>$120</td>
                            <td><button class="btn btn-brand">View</button></td>
                          </tr>
                          <tr>
                            <td>Joshua Pagatpat</td>
                            <td>Techonlogical University of the Philippines</td>
                            <td>$120</td>
                            <td><button class="btn btn-brand">View</button></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- <div class="col students-col shadow">
                  <div class="new-students">Hello</div>
                </div> -->
              </div>
            </div>

          </div>
        </main>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  </body>
  <script type="application/javascript">
    $(document).ready(function () {
      $('.table').DataTable({lengthMenu: [3, 5, 10, 20]});
    });
  </script>
</html>