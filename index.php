<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Homepage</title>

    <!-- JQuery and Bootstrap JavaScript for carousel -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- Custom styles -->
    <link rel="stylesheet" href="style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="jumbotron">
        <h1>Daniel Miller</h1>
        <blockquote class="blockquote-reverse">
          <p>I have always wished for my computer to be as easy to use as my telephone; my wish has come true because I can no longer figure out how to use my telephone.</p>
          <footer><cite title="Source Title">Bjarne Stroustrup</cite></footer>
        </blockquote>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading"><h2>About Me</h2></div>
            <div class="panel-body">
              <h3>General</h3>
              <p>I was born in Olympia, Washington. I lived in Yelm for the first 15 years of my life. Then we moved to Lacey till I was 23. During my time there I learned how to (badly) play the trumpet. Since coming to BYU-I I have gotten married in 2012 and now have a beautiful little girl. I love watching and reading fantasy and have recently picked up watching some anime.</p>
              <h3>Computer Science Interests</h3>
              <p>I have always loved the power that computers give to people. I began programming in C++ in high school and have continued doing so on the side ever since. When I graduated with my second associates degree I decided that I needed a higher education. After coming to BYU-I I found that a lot of my credits did not transfer. Though this was saddening I also found that due to this set back I had the opportunity to switch my major. Since I loved programming and knew this was a growing field I decided to switch over.</p>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <!-- TODO: Get pictures that are the same dimensions -->

              <div class="item active">
                <img src="./assets/wedding.jpg" alt="Wedding Pic">
                <div class="carousel-caption">
                  <h3 class="black-text">Wedding Picture</h3>
                  <p class="black-text">We got married at the Winter Quarter Temple.</p>
                </div>
              </div>

              <div class="item">
                <img src="./assets/honeymoon.jpg" alt="Honeymoon Pic">
                <div class="carousel-caption">
                  <h3 class="black-text">Honeymoon Picture</h3>
                  <p class="black-text">We had our honeymoon in Washington State.</p>
                </div>
              </div>

              <div class="item">
                <img src="./assets/family.jpg" alt="Family Pic">
                <div class="carousel-caption">
                  <h3 class="black-text">Family Picture</h3>
                  <p class="black-text">Our happy family. This is one of our current photos.</p>
                </div>
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2  class="center-header-text">More Info</h2>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-4 border darken">
                  <h4>Email: d.miller1.work@gmail.com</h4>
                </div>
                <div class="col-md-4 border darken">
                  <h4>Phone: 402.659.0008</h4>
                </div>
                <div class="col-md-2">
                  <a class="btn btn-primary" role="button" href="https://www.linkedin.com/in/daniel-miller-10b6b83a">Linkedin</a>
                </div>
                <div class="con-md-2">
                  <a href="assignments.php" class="btn btn-primary" role="button">Assignments</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="copyright">Copyright &#169; 2016 Daniel Miller</footer>
  </body>
</html>