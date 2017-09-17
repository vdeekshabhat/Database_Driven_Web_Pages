<!DOCTYPE html>
<html lang="en">
<?php include 'common.php'; ?>
<link href="bootstrap/css/style.css" rel="stylesheet">
<div class="container">

<?php include 'connection.php'; 
	$id = $_GET['id'] ;
	if( (int)$id == $id && (int)$id > 0 ) {
		$sql = 'SELECT * FROM artists WHERE ArtistID=' . $id;
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
				$details=$row["Details"];
				$firstname=$row["FirstName"];
				$lastname=$row["LastName"];
				$date=$row["YearOfBirth"]."-".$row["YearOfDeath"];
				$nationality=$row["Nationality"];
				$more_info=$row["ArtistLink"];
			}
	}
    else {
        header('Location: error.php'); 
        }
	$sql1= 'SELECT * FROM artworks WHERE ArtistID=' . $id;
	$result_works = $conn->query($sql1);
    }
    else {
        header('Location: error.php'); 
    }
     
	?>



<body>
    <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $firstname." ".$lastname ?></h1>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">

            <div class="col-md-4" id="profile">

                <img class="img-responsive" src="images\images\art\artists\medium\<?php echo $id;?>.jpg" alt="">
            </div>

            <div class="col-md-5">
            	<div>
               		<p> <?php echo (isset($details))?$details:'';?></p>

                	<p class="btn btn-default" id="fav" style="color:blue"><span class="glyphicon glyphicon-heart" aria-hidden="true" style="color:blue"></span> Add to Favorites List</p>
                	<br/>
                	<br/>
                </div>

                <div id="details">
                    <div class="panel panel-default">
  						<div class="panel-heading"><strong>Artist Details</strong></div>
							<table class="table">
							<tr>
								<td><strong>Date: </strong></td>
								<td><?php echo $date ?>
							</tr>
							<tr>
								<td><strong>Nationaliy: </strong></td>
								<td><?php echo $nationality ?></td>
							</tr>
							<tr>
								<td><strong>More Info:</strong></td>
								<td><?php echo "<a href=".$more_info.">$more_info</a>" ?></td>
								</tr>
    
  							</table>
						</div>
                </div>
            </div>

        </div>
  		<div>
  		<h3> Art By <?php echo $firstname." ".$lastname ?> </h3>

        <div class="row text-center">

            
                <?php 
                    if ($result_works->num_rows > 0) {
						while($row = $result_works->fetch_assoc()) {
						echo "<div class='col-md-3 col-sm-6 hero-feature'>
                			  	<div class=thumbnail>
                			  		<img class=img-responsive src=images\art\works\square-thumbs\\".$row["ImageFileName"].".jpg width=150 height=150 border=5>
                			  		<div class=caption>
		                    			<a href=Part03_SingleWork.php?id=".$row["ArtWorkID"].">".$row["Title"].", ".$row["YearOfWork"]. "</a><br/>
                            			<a href=Part03_SingleWork.php?id=".$row["ArtWorkID"]." class='btn btn-primary'><span class='glyphicon glyphicon-info-sign' aria-hidden=true></span> View</a> <a href=# class='btn btn-success'><span class='glyphicon glyphicon-gift' aria-hidden=true></span> Wish</a> <a href=# class='btn btn-info'><span class='glyphicon glyphicon-shopping-cart' aria-hidden=true></span> Cart</a>
            						</div>
            					</div>
            				  </div>"; 
						}
					}
                    else{
                    header('Location: error.php'); 
                    }?>
                </div>
        </div>
    
</div>
<?php include 'footer.php'; ?>
