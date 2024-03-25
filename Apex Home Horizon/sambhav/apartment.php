<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Home Horizon</title>
    <!--  Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!--  Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- custom CSS -->
    <script>
        function loadXMLDoc(filename) {
            if (window.ActiveXObject) {
                xhttp = new ActiveXObject("Msxml2.XMLHTTP");
            } else {
                xhttp = new XMLHttpRequest();
            }
            xhttp.open("GET", filename, false);
            try {xhttp.responseType = "msxml-document"} catch(err) {} // Helping IE11
            xhttp.send("");
            return xhttp.responseXML;
        }

        function displayResult() {
            xml = loadXMLDoc("apartments.xml");
            xsl = loadXMLDoc("display.xsl");
            // code for IE
            if (window.ActiveXObject || xhttp.responseType == "msxml-document") {
                ex = xml.transformNode(xsl);
                document.getElementById("apartments").innerHTML = ex;
            }
            else if (document.implementation && document.implementation.createDocument) {
                xsltProcessor = new XSLTProcessor();
                xsltProcessor.importStylesheet(xsl);
                resultDocument = xsltProcessor.transformToFragment(xml, document);
                document.getElementById("apartments").appendChild(resultDocument);
            }
        }

        function toggleDarkMode() {
            const body = document.body;
            const button = document.getElementById('darkModeButton');
            body.classList.toggle("dark-mode");
            if (body.classList.contains("dark-mode")) {
                button.innerHTML = '<i class="fa fa-adjust" style="font-size:18px"></i> Toggle Light Mode';
            } else {
                button.innerHTML = '<i class="fa fa-adjust" style="font-size:18px"></i> Toggle Dark Mode';
            }
        }

    </script>
  <style>
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
    }

    #form-submit {
      background-color: #1a527d;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;

    }
    fieldset{
        margin:10px;
    }

    #form-submit:hover {
      background-color: #45a049;
    }

     /* Additional styles for dark mode */
    .dark-mode {
      background-color: #1a1a1a;
      color: #fff;
    }

    .dark-mode footer {
      background-color: #333;
    }

    .dark-mode .footer-item p,
    .dark-mode .footer-item a {
      color: #a3a3a3;
    }
    .dark-mode .content101{
        background-color: #333;
    }



    .dark-mode .box {
      background-color: #1a1a1a;
    }

    .dark-mode .feature {
      color: #3ed2f7; /* Light blue color in dark mode */
      background-color: #444;
    }


    input[type="text"],
    textarea {
      background-color: #f1f1f1; /* Light gray background color for input boxes */
      border: 1px solid #ccc; /* Light gray border */
    }

    .dark-mode input[type="text"],.dark-mode input[type="number"],
    .dark-mode textarea {
      background-color: #444; /* Dark gray background color for input boxes in dark mode */
      border: 1px solid #666; /* Dark gray border */
      color: #fff; /* White text color */
    }
    .dark-mode button{
    background-color: #444;
    }
    .dark-mode select{
    background-color: #444;
    }
    .dark-mode openbtn {
        background-color: black;
        color:white;
    }
    li{
        padding:5px;
    }
          .container {
            display: flex;
            flex-direction: row;
            overflow: hidden;
            margin: 20px;
            height: 100%;
          }
          .reviews {
              padding: 20px;
          }

          .review {
              margin-bottom: 20px;
              border: 1px solid #ccc;
              padding: 10px;
          }

          .review h4 {
              margin-top: 0;
          }

          .review-details {
              margin-top: 10px;
          }

          .review-details span {
              margin-right: 10px;
          }

          .review-date, .review-stars {
              font-weight: bold;
          }
          .btn-default {
                color: #333;
                background-color: #fff;
                border-color: #ccc;
                padding:10px;
                margin-top:10px;
            }

          .sidebar{
            width: 20%;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 10px;
            overflow-y: auto;
            padding:10px;

          }

            .sidebar2 {
              height: 100%;
              width: 0;
              position: fixed;
              z-index: 1;
              top: 0;
              left: 0;
              background-color: #333;
              overflow-x: hidden;
              transition: 0.5s;
              padding-top: 60px;
            }

            .sidebar2 a {
              padding: 8px 8px 8px 32px;
              text-decoration: none;
              font-size: 25px;
              color: #818181;
              display: block;
              transition: 0.3s;
            }

            .sidebar2 a:hover {
              color: #f1f1f1;
            }

            .sidebar2 .closebtn {
              position: absolute;
              top: 0;
              right: 25px;
              font-size: 36px;
              margin-left: 50px;
            }

            .openbtn {
              font-size: 20px;
              cursor: pointer;
              background-color: #fff;;
              color: black;
              padding: 10px 15px;
              border: none;
            }

            .openbtn:hover {
              background-color: #444;;
            }

            #main {
              transition: margin-left .5s;
              padding: 16px;
            }
          aside {
            width: 20%;
            padding-left: 15px;
            float: right;
            font-style: italic;
          }
          .apartment-listings {
            width: 60%;
            overflow-y: auto;
            height: 100%;
          }
          .apartment {
            max-width: 600px;
            max-height: 600px;
            border: 1px solid #ddd;
            margin: 10px;
            margin-left: 20px;
            padding: 15px;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            width: 100%;
          }

          .apartment-info {
            flex: 1;
            padding-right: 20px;
          }
          .rupee {
            padding: 5px;
            border-right: 1px solid #ddd;
          }
          .name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
          }
          .location {
            color: #666;
            margin-bottom: 10px;
          }
          .price-area {
            text-align: center;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
          }
          .price{
            flex: 1;
            margin-left: 50px;
            border-right: 1px solid #ddd;
          }
          .price-month {
            flex: 1;
            margin-left: 50px;
            border-right: 1px solid #ddd;
          }
          .area {
            flex: 1;
            margin-left: 50px;
            border-right: 1px solid #ddd;
          }
          .features {
            margin-top: 10px;
            margin-left: 20px;
          }
          .feature {
            display: inline-block;
            background-color: #f2f2f2;
            padding:10px;
            border-radius: 20px;
            font-size: 14px;
          }
          .images {
            display: flex;
            flex-wrap: wrap;
            width: 200px;
            height: 200px;
            margin-top: 20px;
            overflow: hidden;
          }
          .image {
            width: 100%;
            padding: 5px;
            display: none;
          }
          .image.active {
            display: block;
          }
          .owner-details {
            margin-top: 20px;
            text-align: center;
          }
          .owner-button {
            padding: 5px ;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
          }
          .Parent {
            display: flex;
            flex-direction: row;

          }
          .child1 {
              width: 40%;
              text-align: left;
              color: white;
              padding: 10px;
          }
          .child2 {
              width: 60%;
              padding: 10px;
          }
          .Parent2 {
            display: flex;
            flex-wrap: wrap;

          margin-top: 20px;
          }
          .child20 {
              width: 50%;
              padding: 10px;
              display: flex;
              flex-wrap: wrap;

          }
          .child40 {
              width: 20%;
          }
          .child60 {
              width: 80%;
              border-right: 1px solid #ddd;
          }
          .carousel{
            width: 200px;
               height: 200px;
                margin: 20px;
                overflow: hidden;
          }
            .carousel-inner img {

                overflow: hidden;
                object-fit: cover; /* Maintain aspect ratio and cover entire container */
              }
              p{
                padding:0px;
              }
                      .modal {
                        align-items: center;
                        display: flex;
                        justify-content: center;
                        position: fixed;
                        /* Remove background color */
                        background-color: rgb(0,0,0); /* Fallback color */
                        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
                        transition: none;
                        visibility: hidden;
                        opacity: 10;

                    }

                    .content101 {
                        position: absolute;
                        background: white;
                        width: 400px;
                        padding: 1em 2em;
                        border-radius: 4px;
                    }

                    .modal:target {
                        visibility: visible;
                        opacity: 1;
                    }

                    .box-close {
                        position: absolute;
                        top: 0;
                        right: 15px;
                        color: #fe0606;
                        text-decoration: none;
                        font-size: 30px;
                    }
            .blur-background {
                filter: blur(5px);
            }

            .box {
                width: 150px; /* Set a fixed width for the box */
                height: 150px; /* Set a fixed height for the box */
                border-radius: 50%; /* Make the box perfectly round */
                overflow: hidden;
                position: relative;
                background-color: white; /* Set background color for round box */
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .img-box img {
                width: 100%;
                height: 100%; /* Make sure the image fills the container */
                border-radius: 50%; /* Make the image perfectly round */
                transition: transform 0.3s ease;
                padding: 0; /* Remove padding */
                margin: 0; /* Remove margin */
            }

            .img-box img:hover {
                transform: scale(1.1);
            }
            .nav-link {
                font-size: 20px;
            }
        </style>
</head>


<body onload="displayResult()">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
           <div id="main">
             <button class="openbtn" onclick="openNav()">☰ Open Sidebar</button>
           </div>
      </div>
      <ul class="nav navbar-nav navbar-left">
        <li>
            <a class="nav-link" href="uplodeapartment.html">Sell</a>
        </li>
      </ul>
      <li class="nav-item dropdown">
                <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="about.html">About Us</a>
                    <a class="dropdown-item" href="payment.html">Payment</a>
                    <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                    <a class="dropdown-item" href="team.html">Teams</a>
                    <a class="dropdown-item" href="pranav/visitor_log.php">Visitor logs</a>
                    <a class="dropdown-item" href="gallary.php">Photo Gallery</a>
                    <a class="dropdown-item" href="combine.html">Maintenance</a>
                </div>
              </li>
      <ul class="nav navbar-nav navbar-right">
        <li>
        <button id="darkModeButton" class="btn btn-default" onclick="toggleDarkMode()">
            <i class="fa fa-adjust" style="font-size:18px"></i> Toggle Dark Mode
        </button>

        </li>
      </ul>

    </div>
  </nav>


 <div id="mySidebar" class="sidebar2">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>




<div class="container">
                  <div class="sidebar" id="sidebar">
            <h3>Search Apartments</h3>
            <br/>
            <br/>
            <form id="apartment-form">
              <label for="bhk-type">BHK Type : </label>

              <select id="bhk-type">
                <option value="">Select BHK Type</option>
              </select>
              <hr />

              <label for="location">Location : </label>
              <input type="text" id="location" placeholder="Enter Location"/>
              <hr />

              <label for="price">Price Range : </label>
              <input type="range" id="price" name="price" min="0" max="1000000"/>
              <hr />

              <label for="price-amount">Price Amount : </label>
              <input type="number" id="price-amount" name="price-amount" min="0" max="1000000"/>
              <hr />

              <label for="area">Area : </label>
              <input type="number" id="area" name="area" min="0" max="100000"/>
              <hr />

              <label for="features">Features : </label>
              <input type="text" id="features" placeholder="Enter Features"/>
              <hr />

              <button type="submit">Search</button>
              <hr />
            </form>
          </div>
                <div class="apartment-listings" id="apartment-listings">
                    <?php
                    $servername = "localhost:3308";
                    $username = "root";
                    $password = "";
                    $database = "home_horizon";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $database);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // SQL query to fetch data
                    $sql = "SELECT * FROM apartments";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class='apartment'>
                                <div class='apartment-info'>
                                    <div class='name'><h2><?php echo $row['name']; ?></h2></div>
                                    <div class='location'><?php echo $row['location']; ?></div>
                                    <hr />
                                    <div class='price-area'>
                                        <div class='rupee'><i class="fas fa-rupee-sign" style='font-size:24px'></i></div>
                                        <div class='price'><b>Price: <?php echo $row['price']; ?></b><p>Coars</p></div>
                                        <div class='price-month'><b>Price: <?php echo $row['price_month']; ?></b> <p>Lacs/Month Estimated EMI</p></div>
                                        <div class='area'><b>Area: <?php echo $row['area']; ?></b><p>sqft Builtup</p></div>
                                    </div>
                                    <hr />
                                    <div class='features'><?php echo $row['features']; ?></div>
                                </div>
                                <div class='Parent'>
                                    <div class='child1'>
                                        <div id='carouselExampleIndicators_<?php echo $row['id']; ?>' class='carousel slide' data-ride='carousel'>
                                            <div class='carousel-inner'>
                                                <?php
                                                // Fetching and displaying images
                                                $imagesXML = $row['images'];
                                                $images = explode(',', $imagesXML);
                                                $first = true;
                                                foreach ($images as $key => $image) {
                                                    $imgSrc = trim($image);
                                                    ?>
                                                    <div class='carousel-item <?php if ($first) { echo "active"; } ?>'>
                                                        <img class='d-block w-100' src='<?php echo $imgSrc; ?>' alt='Slide <?php echo $key; ?>'>
                                                    </div>
                                                    <?php
                                                    $first = false;
                                                }
                                                ?>
                                            </div>
                                            <a class='carousel-control-prev' href='#carouselExampleIndicators_<?php echo $row['id']; ?>' role='button' data-slide='prev'>
                                                <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                                <span class='sr-only'>Previous</span>
                                            </a>
                                            <a class='carousel-control-next' href='#carouselExampleIndicators_<?php echo $row['id']; ?>' role='button' data-slide='next'>
                                                <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                                <span class='sr-only'>Next</span>
                                            </a>
                                        </div><!-- .carousel -->
                                    </div><!-- .child1 -->
                                    <div class='child2'>
                                        <div class='Parent2'>
                                            <div class='child20'>
                                                <div class='child40'><i class='fa fa-home' style='font-size:18px;' aria-hidden='true'></i></div>
                                                <div class='child60'><?php echo $row['type']; ?></div>
                                                <hr />
                                                <div class='child40'><i class="fa fa-car" style='font-size:18px' aria-hidden='true'></i></div>
                                                <div class='child60'><?php echo $row['available']; ?></div>
                                                <hr />
                                            </div>
                                            <div class='child20'>
                                                <div class='child40'><i class='fa fa-location-arrow' style='font-size:18px' aria-hidden='true'></i></div>
                                                <div class='child60'><?php echo $row['facing']; ?></div>
                                                <hr />
                                                <div class='child40'><i class="fa fa-bath" style='font-size:18px' aria-hidden='true'></i></div>
                                                <div class='child60'><p>Bathroom: <?php echo $row['bathroom']; ?></p></div>
                                                <hr />
                                            </div>
                                        </div>

                                        <!-- Button to open popup -->
                                        <div class="box">
                                            <a href="#popup-box_<?php echo $row['id']; ?>">
                                                <div class='owner-details'>
                                                    <button class='owner-button' >Get Owner Details</button>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- Popup Box -->

                                         <div id="popup-box_<?php echo $row['id']; ?>" class="modal">
                                                <div class="content101">
                                                    <!-- Display person details and photo -->
                                                    <div class="box">
                                                        <div class="img-box">
                                                            <img src="<?php echo $row['person_photo']; ?>" alt="Person Photo">
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <h4 style="color: blue;"><?php echo $row['person_name']; ?></h4>
                                                    <p><strong>Address:</strong> <?php echo $row['address']; ?></p>
                                                    <p><strong>Phone Number:</strong> <?php echo $row['phone_number']; ?></p>
                                                    <p><strong>Email:</strong> <?php echo $row['email']; ?></p>

                                                    <button class='owner-button' >Pay</button>

                                                    <!-- Close button -->

                                                    <a href="#" class="box-close">Close</a>
                                                </div>
                                         </div>






                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                </div>



          <aside class="reviews">
              <div class="review">
                  <h4>Excellent Apartment Management Solution</h4>
                  <p>Description: I've been using the Home Horizon Apartment Management System for a few months now, and I must say it's been a game-changer for our property management. The system is incredibly user-friendly, making it easy to manage everything from tenant communication to maintenance requests. Highly recommend!</p>
                  <div class="review-details">
                      <span class="review-date">Date: January 15, 2024</span>
                      <span class="review-stars">Stars: ★★★★★</span>
                  </div>
              </div>

              <div class="review">
                  <h4>Seamless Experience with Home Horizon</h4>
                  <p>Description: Home Horizon Apartment Management System has truly simplified our property management tasks. The software's intuitive interface and robust features make it a breeze to handle rent collection, lease agreements, and tenant communication. Couldn't be happier with our decision to switch!</p>
                  <div class="review-details">
                      <span class="review-date">Date: February 8, 2024</span>
                      <span class="review-stars">Stars: ★★★★☆</span>
                  </div>
              </div>

              <div class="review">
                  <h4>Impressive Features and Support</h4>
                  <p>Description: I've been thoroughly impressed with the features offered by Home Horizon. From automated reminders to detailed financial reports, the system has everything we need to efficiently manage our apartment complex. Plus, their customer support team is always responsive and helpful!</p>
                  <div class="review-details">
                      <span class="review-date">Date: March 3, 2024</span>
                      <span class="review-stars">Stars: ★★★★☆</span>
                  </div>
              </div>

              <div class="review">
                  <h4>Highly Recommend Home Horizon</h4>
                  <p>Description: As a property manager, I've tried several apartment management systems, but Home Horizon stands out for its simplicity and effectiveness. The software has helped us streamline our operations and improve tenant satisfaction. I would highly recommend it to anyone in the industry!</p>
                  <div class="review-details">
                      <span class="review-date">Date: April 5, 2024</span>
                      <span class="review-stars">Stars: ★★★★★</span>
                  </div>
              </div>
              <div class="review">
                  <h4>Excellent Apartment Management Solution</h4>
                  <p>Description: I've been using the Home Horizon Apartment Management System for a few months now, and I must say it's been a game-changer for our property management. The system is incredibly user-friendly, making it easy to manage everything from tenant communication to maintenance requests. Highly recommend!</p>
                  <div class="review-details">
                      <span class="review-date">Date: January 15, 2024</span>
                      <span class="review-stars">Stars: ★★★★★</span>
                  </div>
              </div>
          </aside>
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
            <li><center><a href="#">About Us</a></center></li>
            <li><center><a href="#">Properties</a></center></li>
            <li><center><a href="#">Testimonials</a></center></li>
            <li><center><a href="#">Contact Us</a></center></li>
            <li><center><a href="#">Terms</a></center></li>
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
<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
 <!-- Add jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Add Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Your custom JavaScript code -->

    <script>
        // JavaScript code for carousel initialization
        $(document).ready(function() {
            <?php

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "$('#carouselExampleIndicators_" . $row['id'] . "').carousel();";
                }
            }
            ?>
        });
        document.addEventListener("DOMContentLoaded", function() {
            const payRentLink = document.querySelector(".navbar-brand[href='#']");
            if (payRentLink) {
                payRentLink.addEventListener("click", function(event) {
                    event.preventDefault();
                    alert("Not available");
                });
            }
        });
    </script>

</body>
</html>
















