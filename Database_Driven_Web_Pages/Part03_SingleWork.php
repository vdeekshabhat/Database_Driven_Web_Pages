<!DOCTYPE html>
<html lang="en">
<?php include 'common.php'; ?>
<link href="style.css" rel="stylesheet">
<?php include 'connection.php'; 
    $id = $_GET['id'] ;
    if( (int)$id == $id && (int)$id > 0 ) {
        $sql = 'SELECT * FROM artworks WHERE ArtWorkID=' . $id;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $imagefilename=$row["ImageFileName"];
                $artistid=$row["ArtistID"];
                $cost=number_format($row["MSRP"], 2, '.', '');
                $description=$row["Description"];
                $title=$row["Title"];
                $yearofwork=$row["YearOfWork"];
                $medium=$row["Medium"];
                $dimension=$row["Width"]."cm x ".$row["Height"]."cm";
                $originalhome=$row["OriginalHome"];
            }
        }
        else{
        header('Location: error.php'); 
        }
        $sql_genre='SELECT * FROM genres WHERE GenreID in(SELECT GenreID FROM artworkgenres WHERE ArtWorkID="' .$id .'")';
        $genres="";
        $result_genre= $conn->query($sql_genre);
        if ($result_genre->num_rows > 0) {
            while($row = $result_genre->fetch_assoc()) {
                $genres.=nl2br($row["GenreName"]."\n");

            }
        }
       
        $sql_subject='SELECT * FROM subjects WHERE SubjectId in(SELECT SubjectID FROM artworksubjects WHERE ArtWorkID="' .$id .'")';
        $subjects="";
        $result_subject= $conn->query($sql_subject);
        if ($result_subject->num_rows > 0) {
            while($row = $result_subject->fetch_assoc()) {
                $subjects.=nl2br($row["SubjectName"]."\n");
            }
        }
       
        $sql_order='SELECT * FROM orders WHERE OrderID in(SELECT OrderID FROM orderdetails WHERE ArtWorkID="' .$id .'")';
        $orders="";
        $result_order= $conn->query($sql_order);
        if ($result_order->num_rows > 0) {
            while($row = $result_order->fetch_assoc()) {
                $orders.=nl2br(substr($row["DateCreated"],0,10)."\n");
            }
        }
        


    }
     $sql_artist = 'SELECT * FROM artists WHERE ArtistID=' . $artistid;
        $result_artist = $conn->query($sql_artist);
        if ($result_artist->num_rows > 0) {
            $row=$result_artist->fetch_assoc();
            $name=$row["FirstName"]." ".$row["LastName"];
        }

?>
<body>
    <div class="container">
        <h3><?php echo $title?></h3>
        <small>By <a href = "Part02_SingleArtist.php?id=<?php echo $artistid;?>"><?php echo $name;?></a></small>
        <div class="row">
            <div class="col-md-3">
                <img id="artistImg" class="img-responsive" src="images\images\art\works\medium\<?php echo $imagefilename;?>.jpg" width="300" height="500" alt="" data-toggle="modal" data-target="#myModal">
            </div>   
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <span>heading</span>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <img class="img-responsive" src="images\images\art\works\medium\<?php echo $imagefilename;?>.jpg" width="500" height="600" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <p><?php echo $description; ?></p>
                <h3 style="color:red" id="price">$<?php echo $cost; ?> </h3>
                <a href='#' class='btn btn-default'><span class='glyphicon glyphicon-gift' aria-hidden=true></span> Add to Shopping Cart</a>
                <a href='#' class='btn btn-default'><span class='glyphicon glyphicon-shopping-cart' aria-hidden=true></span> Add to Shopping Cart</a>
                <br/>
                <br/>
                <div class="panel panel-default">
                    <div class="panel-heading">Sales</strong></div>
                        <table class="table">
                            <tr>
                                <td><strong>Date:</strong></td>
                                <td><?php echo $yearofwork?></td>
                            </tr>
                            <tr>
                                <td><strong>Medium:</strong></td>
                                <td><?php echo $medium?></td>
                            </tr>
                            <tr>
                                <td><strong>Dimensions:</strong></td>
                                <td><?php echo $dimension?></td>
                            </tr>
                            <tr>
                                <td><strong>Home:</strong></td>
                                <td><?php echo $originalhome?></td>
                            </tr>
                            <tr>
                                <td><strong>Genres:</strong></td>
                                <td><a href='#'><?php echo $genres?></td>
                            </tr>
                            <tr>
                                <td><strong>Subjects:</strong></td>
                                <td><a href='#'><?php echo $subjects?></td>
                            </tr>
                        </table>
                </div>

            </div>
            <div class="col-md-2"> 
                <div class="panel panel-info">
                    <div class="panel-heading"><strong>Sales</strong></div>
                        <table class="table">
                            <tr><td> List of sales </td></tr>
                            <tr><td><a href='#'><?php echo $orders?></td></tr>
                        </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
</body>
</html>

<!-- <?php include 'footer.php'; ?>
 -->