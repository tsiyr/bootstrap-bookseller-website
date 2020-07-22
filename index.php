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
    

    <div class="carousel slide" data-ride="carousel" id="carousel-1" style="margin-top: 60px;">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="jumbotron first carousel-hero">
                    <h1 class="hero-title" style="/*visibility:hidden;*/">Hero Nature</h1>
                    <p class="hero-subtitle">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                    <p><a class="btn btn-primary btn-lg hero-button" role="button" href="#">Learn more</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="jumbotron second carousel-hero">
                    <h1 class="hero-title">Hero Photography</h1>
                    <p class="hero-subtitle">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                    <p><a class="btn btn-primary btn-lg hero-button" role="button" href="#">Learn more</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="jumbotron third carousel-hero">
                    <h1 class="hero-title">Hero Technology</h1>
                    <p class="hero-subtitle">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                    <p><a class="btn btn-primary btn-lg hero-button" role="button" href="#">Learn more</a></p>
                </div>
            </div>
        </div>
        <div style="visibility:hidden;"><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><i class="fa fa-chevron-left"></i><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><i class="fa fa-chevron-right"></i><span class="sr-only">Next</span></a></div>
        <ol
            class="carousel-indicators" style="visibility:hidden;">
            <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-1" data-slide-to="1"></li>
            <li data-target="#carousel-1" data-slide-to="2"></li>
            </ol>
    </div>
    <div class="article-list">
        <div class="container">
            <div class="row articles">
                <div class="col-sm-6 col-md-4 item" onclick="goto('MovieMagazine')"><a ><img id="movie_mag_tnail_home" class="img-fluid" src="assets/img/2_.jpg"></a>
                    <h3 class="name">Movie Magazines [PDF]</h3>
                    <p class="description d-none">Great things never come from comfort zones.<br></p><a class="action"><i class="fa fa-arrow-circle-right"></i></a></div>

                <div class="col-sm-6 col-md-4 item" onclick="goto('Ebook')"><a ><img class="img-fluid" src="assets/img/6.jpg"></a>
                    <h3 class="name">Books [PDF]</h3>
                    <p class="text-left description d-none">One day during our fellowship meeting, our leader spoke about gratitude. After that, he challenged us not to complain about . . .<br></p><a  class="action"><i class="fa fa-arrow-circle-right"></i></a></div>

                <div class="col-sm-6 col-md-4 item" onclick="goto('Media')"><a><img class="img-fluid" src="assets/img/loft.jpg"></a>
                    <h3 class="name">Media</h3>
                    <p class="description d-none">Global outreach tour has been slated for 15th july to 27th september 2020 in the following order, Canada, Australia, Spain, Russia and finall here in Nigeria.</p><a class="action"><i class="fa fa-arrow-circle-right"></i></a></div>
            </div>

        </div>
    </div>
    <div class="newsletter-subscribe d-none">
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
    <script src="assets/js/engine.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>