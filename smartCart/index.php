<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="A simple recipe shopping cart.">
    <meta name="author" content="Daniel Miller">

    <title>Smart Cart Login</title>

    <!-- Bootstrap core CSS -->
    <link href="http://v4-alpha.getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://v4-alpha.getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
  </head>

  <body>

    <div class="container">
      <form class="form-signin" action="loginHandler.php" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="username" class="sr-only">username</label>
        <input type="username" id="username" class="form-control" placeholder="Username" required="" autofocus="" name="username">
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" class="form-control" placeholder="Password" required="" name="password">
        <input class="btn btn-lg btn-primary btn-block" type="submit">
      </form>
    </div> <!-- /container -->
  </body>
</html>
