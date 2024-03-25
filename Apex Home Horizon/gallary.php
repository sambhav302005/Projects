<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Photo Perfect Gallery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <title>Home Horizon</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <style>
        body {
            margin: 0;
            padding: 5px;
            font-family: 'Arial', sans-serif;
        }

        .jumbotron {
            color: #284738;
            background: #dce2df;
            margin-top: 50px;
            padding: 20px;
            text-align: center;
        }

        .jumbotron h1 {
            margin: 0;
            font-size: 2.5em;
        }

        .flex {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .col-lg-4,
        .col-sm-4 {
            padding: 0;
        }

        .thumbnail {
            position: relative;
            overflow: hidden;
            margin-bottom: 0;
            height: 100%;

        }

        .thumbnail img {
            transition: transform 0.3s;
            max-width: 100%;
            display: flex;
            width: 100%;
            max-height: 75vh;
            min-width: 0;
        }

        .thumbnail:hover img {
            transform: scale(1.1);
        }

        .thumbnail .caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            text-align: center;
            opacity: 0;
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
            transition: opacity 0.3s;
        }

        .thumbnail:hover .caption {
            opacity: 1;
        }

        .page-content {
            margin-top: 70px;
            margin-bottom: 70px;
        }

        .navbar {
            background-color: #333;
            border-bottom: 2px solid #ddd;
        }

        .navbar-nav li a {
            color: #fff !important;
            font-size: 16px;
            text-transform: uppercase;
        }

        .navbar-nav li.active a {
            color: #4CAF50 !important;
        }

        footer {
            margin-top: 0;
            margin-bottom: 0;
            background-color: #1a1a1a;
            color: #fff;
            padding: 50px;
        }

        footer h4 {
            color: #fff;
        }

        .footer-item p {
            color: #a3a3a3;
        }

        .social-icons {
            list-style: none;
            padding: 0;
        }

        .social-icons li {
            display: inline-block;
            margin-right: 10px;
        }

        .social-icons a {
            color: #fff;
            font-size: 20px;
        }

        .menu-list {
            list-style: none;
            padding: 0;
        }

        .menu-list li {
            margin-bottom: 10px;
        }

        .contact-form {
            text-align: left;
            margin: 20px;
            margin-right: 30px;
        }

        #form-submit {
            background-color: #1a527d;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        #form-submit:hover {
            background-color: #1a527d;
        }
        .dropdown-menu{
            color:black;
        }

    </style>
</head>
<body>

    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Home Horizon<em> Website</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="sambhav/apartment.php">Properties</a>
              </li>
              <li class="nav-item dropdown">
                <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="about.html">About Us</a>
                    <a class="dropdown-item" href="payment.html">Payment</a>
                    <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                    <a class="dropdown-item" href="team.html">Teams</a>
                    <a class="dropdown-item" href="pranav/visitor_log.php">Visitor logs</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pranav/contactus.php">Contact Us</a>

              </li>
              <li class="nav-item">
                <a class="nav-link" href="signin.html">Sign In</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="signup.html">Sign Up</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <div class="container page-content">
        <!-- Jumbotron -->
        <div class="jumbotron">
            <h1>Photo Gallery</h1>
        </div>
        <!-- Gallery -->
        <div class="flex" style="flex-direction: column;">
            <div class="row">
                <?php
                // Directory containing images
                $imageDirectory = "gallery/";

                // Get all files in the directory
                $files = scandir($imageDirectory);

                // Counter for columns
                $colCounter = 0;

                // Loop through each file
                foreach ($files as $file) {
                    // Check if it's a valid image file
                    $fileInfo = pathinfo($file);
                    $extensions = ['jpg', 'jpeg', 'png', 'gif'];
                    if (in_array(strtolower($fileInfo['extension']), $extensions)) {
                        // Output HTML for each image
                        echo '<div class="col-lg-4 col-sm-4">';
                        echo '<div style="width: 500px; height: 350px; overflow: hidden;">'; // Set fixed dimensions and overflow hidden
                        echo '<div class="thumbnail">';
                        echo '<a href="image-detail.html">';
                        echo '<img src="' . $imageDirectory . $file . '" alt="' . $fileInfo['filename'] . '" style="width: 100%; height: 100%;">'; // Make the image fill the container
                        echo '<div class="caption">';
                        echo '<div class="h4">' . $fileInfo['filename'] . '</div>';
                        echo '<p>Bangalore</p>';
                        echo '</div>';
                        echo '</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        $colCounter++;
                    }
                }
                ?>
            </div>
        </div>

    </div>


    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4 footer-item">
            <h4>Home Horizon Website</h4>
            <p>Step into Home Horizon Apartments: where modern design meets comfort. Your perfect living space awaits, blending style with convenience.</p>
            <ul class="social-icons">
              <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="31" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
              </svg></a></li>

              <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="27" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15"/>
              </svg></a></li>
              <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="31" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
              </svg></a></li>
            </ul>
          </div>

          <div class="col-md-4 footer-item">
            <h4><center>Additional Pages</center></h4>
            <ul class="menu-list">
              <li><center><a href="about.html">About Us</a></center></li>
              <li><center><a href="sambhav/apartment.php">Properties</a></center></li>
              <li><center><a href="testimonials.html">Testimonials</a></center></li>
              <li><center><a href="pranav/contactus.php">Contact Us</a></center></li>
              <li><center><a href="team.html">Teams</a></center></li>
            </ul>
          </div>

          <div class="col-md-4 footer-item">
            <center>
              <h4>Contact Us</h4>
              <div class="contact-form">
                <form id="contact footer-contact" action="" method="post">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <fieldset>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                      </fieldset>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <fieldset>
                        <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </center>
          </div>
        </div>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
   <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/accordions.js"></script>

    <script language = "text/Javascript">
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>
</body>
</html>
