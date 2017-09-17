<?php include 'common.php'; ?>
<div class="container">
<h1>Artists Data List (Part 01)</h1>
<hr />
<?php include 'connection.php'; ?>
<?php

$sql = "SELECT * FROM artists ORDER BY LastName ASC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href=Part02_SingleArtist.php?id=".$row["ArtistID"]. ">".$row["FirstName"]. " " . $row["LastName"]. " (".$row["YearOfBirth"]. " - ".$row["YearOfDeath"]. ")</a><br>"; 
    } 
} else {
    echo "0 results";
}
$conn->close();
?>
</div>
<?php include 'footer.php'; ?>

