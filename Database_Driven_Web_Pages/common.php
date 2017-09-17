<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CSE5335-Assignment#3</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/style.css" rel="stylesheet">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script> 
    <script type="text/javascript">
      $(document).ready(function(){
        $("#search").click(function(){
            //console.log($("input[name='search_text']").val());
            var url_test = 'Part04_Search.php?title='+$("input[name=search_text]").val();
            console.log(url_test);
            window.location.replace(url_test);
          });
      });
  </script>
  </head>
  <body>

  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Assign 3</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="Default.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="about.php">About Us</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Part01_ArtistsDataList.php">Artists Data List (Part 1)</a></li>
            <li><a href="Part02_SingleArtist.php?id=19">Single Artist (Part 2)</a></li>
            <li><a href="Part03_SingleWork.php?id=394">Single Work (Part 3)</a></li>
            <li><a href="Part04_Search.php">Search (Part 4)</a></li>
          </ul>
        </li>
      </ul>
      
      <div class="nav navbar-nav navbar-right input-group">
        <a class = "col-md-4" href="#" style=>Deeksha Bhat</a>        
        <div class="input-group col-md-8">
        <input type="text" class="form-control" placeholder="Search Paintings" name="search_text">
          <span class="input-group-btn">
              <button class="btn btn-primary" class="form-control" id="search">Search</button> -->
          </span>
        </div><!-- /input-group -->
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>