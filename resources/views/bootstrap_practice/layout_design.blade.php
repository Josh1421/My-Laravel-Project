<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Bootstrap Practice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/layout_design.css') }}">
  </head>
  <body>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white shadow py-3 sticky-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="{{ asset('img/Qrispy_dark.svg') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#menu">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#features">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#team">Team</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#reservation">Reservation</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#blog">Blog</a>
            </li>
          </ul>
          <a href="#" class="btn btn-brand">Order Online</a>
        </div>
      </div>
    </nav>

    <!-- Hero Slider -->
    <div id="HeroSlider" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">

        <div class="carousel-item text-center vh-100 active slide-1 bg-cover">
          <div class="container h-100 d-flex align-items-center justify-content-center">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <h6 class="text-white">WELCOME TO QRISPY</h6>
                <h1 class="display-1 text-white">Char-Grilled and Flavor-Filled</h1>
                <a href="" class="btn btn-brand">Reservation</a>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item text-center bg-dark vh-100 slide-2 bg-cover">
          <div class="container h-100 d-flex align-items-center justify-content-center">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <h6 class="text-white">WELCOME TO QRISPY</h6>
                <h1 class="display-1 text-white">Fresh & Tasty Food</h1>
                <a href="" class="btn btn-brand">Reservation</a>
              </div>
            </div>
          </div>
        </div>

      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#HeroSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#HeroSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <!-- About -->
    <section id="about">
      <div class="container">
        <div class="row align-items-center gy-4">
          <div class="col-lg-5">
            <img src="{{ asset('img/about_new.png') }}" alt="">
          </div>
          <div class="col-lg-5">
            <h1>About Us</h1>
            <div class="divider my-4"></div>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere ab, porro neque beatae omnis alias ratione corrupti qui sint, nobis, dicta sapiente repellat saepe dolore sunt soluta nisi quasi? Amet.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, aliquid laudantium quo corrupti consequuntur culpa ducimus recusandae explicabo. Eos aut praesentium dicta sed consequatur quae iste iusto sint dolore molestias.</p>
            <a href="#" class="btn btn-brand">Explore Menu</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Menu -->
    <section id="menu" class="bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12 intro-text">
            <h1>Explore Our menu</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, id. Odio debitis, ut id tenetur quidem nostrum saepe enim quisquam recusandae animi quo laboriosam soluta labore amet, omnis repudiandae in?</p>
          </div>
        </div>
      </div>
      <div class="container">
        <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">

          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">All Items</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-breakfast-tab" data-bs-toggle="pill" data-bs-target="#pills-breakfast" type="button" role="tab" aria-controls="pills-breakfast" aria-selected="true">Breakfast</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-lunch-tab" data-bs-toggle="pill" data-bs-target="#pills-lunch" type="button" role="tab" aria-controls="pills-lunch" aria-selected="true">Lunch</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-dinner-tab" data-bs-toggle="pill" data-bs-target="#pills-dinner" type="button" role="tab" aria-controls="pills-dinner" aria-selected="true">Dinner</button>
          </li>

        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">
            <div class="row">
              <div class="col-lg-3 col-sm-6">
                <div class="menu-item">
                  <img src="{{ asset('img/item_1.jpg') }}" alt="">
                  <div class="menu-item-content"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade show" id="pills-breakfast" role="tabpanel" aria-labelledby="pills-breakfast-tab" tabindex="0"><h4>Breakfast Dishes</h4></div>
          <div class="tab-pane fade show" id="pills-lunch" role="tabpanel" aria-labelledby="pills-lunch-tab" tabindex="0"><h4>Lunch Dishes</h4></div>
          <div class="tab-pane fade show" id="pills-dinner" role="tabpanel" aria-labelledby="pills-dinner-tab" tabindex="0"><h4>Dinner Dishes</h4></div>
        </div>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>