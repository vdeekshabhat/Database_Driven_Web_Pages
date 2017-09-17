<?php include 'common.php'; ?>

<div class="jumbotron">
<div class="container">
  <h1>Welcome to Assignment #3</h1>
  <p>This is third assignment for Deeksha Bhat for CSE5335</p>
  </div>
</div>

<div class="container">
<div class="row">
  <div class="col-md-2">
    <div class="About Us">
      <div class="caption">
        <h4><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> About Us</h4>
        <p>What this is all about and other stuff</p>
        <a href="about.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page</a></p>
      </div>
    </div>
  </div>

    <div class="col-md-2">
    <div class="Artist List">
      <div class="caption">
        <h4><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Artist List</h4>
        <p>Displays a list of artist names as links</p>
        <a href="Part01_ArtistsDataList.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page</a></p>
      </div>
    </div>
  </div>

  <div class="col-md-2">
    <div class="Single Artist">
      <div class="caption">
        <h4><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Single Artist</h4>
        <p>Displays Information for a single artist</p>
        <a href="Part02_SingleArtist.php?id=19" class="btn btn-default" role="button"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page</a></p>
      </div>
    </div>
  </div>

  <div class="col-md-2">
    <div class="Single Work">
      <div class="caption">
        <h4><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Single Work</h4>
        <p>Displays information for a single work</p>
        <a href="Part03_SingleWork.php?id=394" class="btn btn-default" role="button"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page</a></p>
      </div>
    </div>
  </div>

  <div class="col-md-2">
    <div class="Search">
      <div class="caption">
        <h4><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</h4>
        <p>Perform search on artswork table</p>
        <a href="Part04_Search.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-link" aria-hidden="true"></span> Visit Page</a></p>
      </div>
    </div>
  </div>
</div>
</div>

<?php include 'footer.php'; ?>