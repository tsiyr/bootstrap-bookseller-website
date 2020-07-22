<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daniels</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <div>
         <?php include_once('./includes/navbar.html'); ?>
    </div>
   
    <div class="article-list"></div>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder" style="background-image:url(&quot;assets/img/cont.jpg&quot;);"></div>
            <form method="post">
                <h2 class="text-center"><strong>Contact Us</strong></h2>
                <div class="form-group"><input class="form-control" type="email" name="Name" placeholder="Full Name"></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Book Title"></div>
                <div class="form-group"><input class="form-control" type="password" name="password-repeat" placeholder="Your Address"></div>
                <div class="form-group"><input class="form-control" type="password" name="password-repeat" placeholder="Your Phone Number"></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color:rgb(80,53,188);">Submit Request</button></div>
            </form>
        </div>
    </div>
    <div class="newsletter-subscribe">
        <div class="container">
            <h2 class="text-center">Subscribe for our Newsletter</h2>
            <form class="form-inline" method="post">
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Your Email"></div>
                <div class="form-group"><button class="btn btn-primary" type="submit">Subscribe </button></div>
            </form>
        </div>
    </div>
    <div class="footer-dark">
        <?php include_once('./includes/footer.html'); ?>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>