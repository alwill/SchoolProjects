<!-- Header to include at the top of all pages -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= isset($pageTitle) ? $pageTitle : "TV Guru"?></title>
    <!--<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="/phase5/css/bootstrap_slate.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="#">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
<!-- NAVBAR -->
<!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/phase5/index.php">TV Guru</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="/phase5/index.php">Home</a></li>
              <li><a href="/phase5/pages/profile.php">My Profile</a></li>
              <li><a href="/phase5/pages/topshows.php">Top Shows</a></li>
              <li><a href="/phase5/pages/sports.php">Sports</a></li>
            </ul>
            <div class="col-sm-3 col-md-3 pull-right">
              <form class="navbar-form" role="search" action="/phase5/pages/search.php">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search a movie or series..." name="title">
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon-search"></i></button>
                  </div>
                </div>
              </form>
            </div>
            <ul class="nav navbar-nav navbar-right">
              <!-- checks to see if you are logged in or not for the login button -->
              <li class="pull-right"><a href=<?= isset($loggedin) ? "/phase5/pages/logout.php" : "/phase5/pages/login.php"?>><?= isset($loggedin) ? "Logout" : "Login"?></a></li>              
            </ul>           
          </div><!--/.nav-collapse --> 
        </div><!--/.container-fluid -->
      </nav>
