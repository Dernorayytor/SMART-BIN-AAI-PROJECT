<?php
include 'connect.php';
$result = mysqli_query($conn, "SELECT * FROM SMART_BIN_Data");
?>

  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data from sensors</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    
    body {
    font: 400 15px/1.8 Lato, sans-serif;
    color: rgb(24, 17, 55);
    /* สีฟอนเล็ก */
    }

  
    h3, h4 {
    margin: 10px 0 30px 0;
    letter-spacing: 10px;      
    font-size: 20px;
    color: rgb(21, 55, 92);
    /* สีฟอนหนา */
    }
    .container {
    padding: 80px 120px;
    }
    .person {
    border: 10px solid transparent;
    margin-bottom: 25px;
    width: 80%;
    height: 80%;
    opacity: 0.7;
    }
    .person:hover {
    border-color: #f1f1f1;
    }
    .carousel-inner img {
    -webkit-filter: grayscale(90%);
    filter: grayscale(90%); /* make all photos black and white */ 
    width: 100%; /* Set width to 100% */
    margin: auto;
    }
    .carousel-caption h3 {
    color: rgb(46, 60, 255) !important;
    /* สีตัวหนากลางรูป */
    }
    @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
        }
    }
    .bg-1 {
    background:rgb(37, 37, 38);
    color: #bdbdbd;
    }
    .bg-1 h3 {color: #fff;}
    .bg-1 p {font-style: italic;}
    .list-group-item:first-child {
        border-top-right-radius: 0;
        border-top-left-radius: 0;
    }
    .list-group-item:last-child {
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    .thumbnail {
        padding: 0 0 15px 0;
        border: none;
        border-radius: 0;
    }
    .thumbnail p {
        margin-top: 15px;
        color: #555;
    }
    .btn {
        padding: 10px 20px;
        background-color: #340cc4;
        /* สีปุ่มส่ง */
        color: #ffffff;
        /* สีฟอนในปุ่มส่ง */
        border-radius: 0;
        transition: .2s;
    }
    .btn:hover, .btn:focus {
        border: 1px solid rgb(44, 44, 47);
        background-color: #fff;
        color: #000;
    }
    .modal-header, h4, .close {
        background-color: #333;
        color: #fff !important;
        text-align: center;
        font-size: 30px;
    }
    .modal-header, .modal-body {
        padding: 40px 50px;
    }
    .nav-tabs li a {
        color: #777;
    }
    #googleMap {
        width: 100%;
        height: 400px;
        -webkit-filter: grayscale(100%);
        filter: grayscale(100%);
    }  
    .navbar {
        font-family: Montserrat, sans-serif;
        margin-bottom: 0;
        background-color:rgb(50, 29, 170);
        /* สีแถบ */
        border: 0;
        font-size: 11px !important;
        letter-spacing: 4px;
        opacity: 0.9;
    }
    .navbar li a, .navbar .navbar-brand { 
        color: #d5d5d5 !important;
        /* สีหัวในแถบ */
    }
    .navbar-nav li a:hover {
        color: rgb(255, 255, 255) !important;
    }
    .navbar-nav li.active a {
        color: rgb(255, 255, 255) !important;
        /* สีฟอนหัวในแถบตรงติ่ง */
        background-color: rgb(50, 29, 170) !important;
        /* สีติ่ง */
    }
    .navbar-default .navbar-toggle {
        border-color: transparent;
    }
    .open .dropdown-toggle {
        color: #fff;
        background-color: #555 !important;
    }
    .dropdown-menu li a {
        color: #000 !important;
    }
    .dropdown-menu li a:hover {
        background-color: rgb(8, 0, 99) !important;
        /* สีปุ่มที่ถูกชี้ในติ่ง */
    }
    footer {
        background-color:rgb(50, 29, 170);
        /* สีแถบ */
        color: #f5f5f5;
        padding: 32px;
    }
    footer a {
        color: #f5f5f5;
    }
    footer a:hover {
        color: #777;
        text-decoration: none;
    }  
    .form-control {
        border-radius: 0;
    }
    textarea {
        resize: none;
    }
    </style>
   
  
  

</head>
<!-- <body>
    <table widt ="50000000" cellspacing ="0" border="3" >
        <tr>
            <th>ID</th>
            <th>Bottle1</th>
            <th>Bottle2</th>
            <th>Bottle3</th>
            <th>Time</th>
            
        </tr>
        <?php while($row=mysqli_fetch_array($result)) : ?>
         <tr>
              <td> <?php echo $row['id'] ?> </td>
              <td> <?php echo $row['Bottle1'] ?> </td>
              <td> <?php echo $row['Bottle2'] ?> </td>
              <td> <?php echo $row['Bottle3'] ?> </td>
              <td> <?php echo $row['ReadingTime'] ?> </td>
         </tr>
        <?php endwhile; ?>
     </table> -->






    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">


        <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="#myPage">SMART BIN</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="index2.php">About SMART BIN (เนื้อหาข้อมูลประวัติและอื่นๆ)</a></li>
                    <!-- <li><a href="#contact">Contact Us</a></li> -->
                    <li><a href="#myPage">Table (ดูขวด)</a></li>
                </ul>
                </li>
                <!-- <li><a href="ค้นหา.html"><span class="glyphicon glyphicon-search"></span></a></li> -->
            </ul>
            </div>
        </div>
        </nav>




        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            


        <!-- Container (The Band Section) -->
        <div id="band" class="container text-center">
            <h3>...SMART BIN...</h3>
            <p><em>We can help you count plastic bottle!!! </em></p>
            <p>OUR SMART BIN is a website that will help you easily count a plastic bottle.
            <br>We use a photo sensor to detect plastic bottles and display the number of plastic bottles in this table.
            <br>⬇⬇⬇ Let's check the tables here ⬇⬇⬇</p>
            
        </div>
        
    <body>
    <center><table widt ="50000000" cellspacing ="0" border="3" >
        <tr>
            <th>ID</th>
            <th>Bottle1</th>
            <th>Bottle2</th>
            <th>Bottle3</th>
            <th>Time</th>
            
        </tr>
        <?php while($row=mysqli_fetch_array($result)) : ?>
         <tr>
              <td> <?php echo $row['id'] ?> </td>
              <td> <?php echo $row['Bottle1'] ?> </td>
              <td> <?php echo $row['Bottle2'] ?> </td>
              <td> <?php echo $row['Bottle3'] ?> </td>
              <td> <?php echo $row['ReadingTime'] ?> </td>
         </tr>
        <?php endwhile; ?>
     </table>

     <br>
     <br>


        <footer class="text-center">
            <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
            <span class="glyphicon glyphicon-chevron-up"></span>
            </a><br><br>
    
        </footer>

        <script>
        $(document).ready(function(){
        // Initialize Tooltip
        $('[data-toggle="tooltip"]').tooltip(); 
        
        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {

            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 900, function(){
        
                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
            } // End if
        });
        })
        </script>

    </body>




</body>
</html>





</body>
</html>

