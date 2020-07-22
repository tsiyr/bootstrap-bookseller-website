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
    <div style="margin-top:20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>This is a beautiful innovation that infuses Movie into Prints borne to salvage the failing reading Culture by drawing the<br>Society to reading through the prevailing desire for Pictures and Movies.<br><br><br><br></p>
                </div>
                <div class="col-md-6 align-self-center mx-auto"><img class="img-fluid" src="assets/img/pst.jpg" width="100%">
                    <h4 class="text-center">Yemi Adetola</h4>
                </div>
            </div>
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