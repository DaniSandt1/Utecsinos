<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Travel Booking</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="stylesheet" type="text/css" href="./css/home.css"/>
    <link rel="stylesheet" type="text/css" href="./css/aboutus.css"/>
    <link rel="stylesheet" type="text/css" href="./css/service.css"/>
    <script src='main.js'></script>
</head>
<style>
    body{
    background-image: url("./img/back1.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 0%;
    background-attachment: fixed; 
    }
</style>
<body>
    <!--nav bar-->
    <?php include("nav.php"); ?>

    <!--body title of home page-->
    <div class="body-title">
        <h1 class="body-tile-h1">
            tired of a busy life ???
        </h1>
        <p class="parabody">
            take a break & <br> a relax tour...
        </p>
        <a href="signup.php" class="link-for-page" style="text-decoration: none;">
        <button class="get-started-with-us">
            get started with us
        </button></a>
    </div>
    <!--servicess-->
    <br>
    <br>
    <br>

    <h1 class="service-heading">Our Services</h1>
    <br>
    <div class="service-container">
     
        <div class="service-box-single-item">
             <h3 class="service-title">adventure</h3>
        </div>
        <div class="service-box-single-item">
            <h3 class="service-title">hiking</h3>
        </div>
        <div class="service-box-single-item">
            <h3 class="service-title">offroad</h3>
        </div>
        <div class="service-box-single-item">
            <h3 class="service-title">tour-guide</h3>   
        </div>
        <div class="service-box-single-item">
            <h3 class="service-title">camping</h3>   
        </div>
    </div>

    <br>
    <br>
    <br>
    <!--about us-->

    <div class="aboutus-container">
        <div>
            <h1 class="about-us-heading">
                About-Us
            </h1>
        </div>
        <div>
           <p class="paragraph-box">

           "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains."
    
           </p>
        </div>
        
    </div>

    <br>
    <br>
    <br>

    <!--contact us-->

    <div class="text-container">
       <div class="text-one">
            <h1 class="contact-heading">
                    Contact-Us
            </h1>
       </div>
        <div class="text-one">
            <input type="text" placeholder=" TYPE YOUR NAME..." class="one-text">
        </div>
        <div class="text-one">
            <input type="email" placeholder="TYPE YOUR EMAIL..." class="one-text">
        </div>
        <div class="text-one">
            <button class="submit-contact-us">contact us</button>
        </div>
    </div>
   
    
</body>
</html>