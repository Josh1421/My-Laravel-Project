<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

  <!-- Logo -->
  <script src="https://kit.fontawesome.com/fb4c7e2297.js" crossorigin="anonymous"></script>

  <!-- CSS Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/hotel_booking.css') }}">

  <title>Hotel Management System</title>
</head>
<body>
  <div class="wrapper">
    <div class="sidebar">
      <h2>Joshblox</h2>
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

      <div class="social_media">
        <a href="#"><i class="fa-brands fa-facebook"></i></a>
        <a href="#"><i class="fa-brands fa-twitter"></i></a>
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
      </div>
    </div>

    <div class="main_content">
      <main>
        <div class="header">Hotel Management System</div>
        <div class="info">
          @yield('content')
        </div>
      </main>
    </div>
  </div>
  
</body>
</html>