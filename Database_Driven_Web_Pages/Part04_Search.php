<?php include 'common.php'; ?>
<?php include 'connection.php'; 
	if (isset($_GET["title"])){
		$sql = 'select * from artworks where title like "%'.$_GET["title"].'%"';
	}
	else if (isset($_GET["description"])){
		$sql = 'select * from artworks where description like "%'.$_GET["description"].'%"';
	}
	else{
		$sql = 'select * from artworks';
	}
	$result = $conn->query($sql);
?>;
<div class="container"><h2>Search Results</h2></div>
<hr />
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			var getUrlParameter = function getUrlParameter(sParam) {
   	 			var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        		sURLVariables = sPageURL.split('&'),
        		sParameterName,i;
				for (i = 0; i < sURLVariables.length; i++) {
        			sParameterName = sURLVariables[i].split('=');
        			if (sParameterName[0] === sParam) {
            			return sParameterName[1] === undefined ? true : sParameterName[1];
        			}
    			}
			};
			if(getUrlParameter("title")){
				$(".box").not(".FilterByTitle").hide();
		        $(".FilterByTitle").show();
		        $("input[name='title']").attr('value',getUrlParameter("title"));
		        $("input[value='FilterByTitle']").prop('checked',true)
			}
			else if(getUrlParameter("description")){
				$(".box").not(".FilterByDescription").hide();
		        $(".FilterByDescription").show();
		       	$("input[name='description']").attr('value',getUrlParameter("description"));
		        $("input[value='FilterByDescription']").prop('checked',true)
			}
			else{
				$("input[value='NoFilter']").prop('checked',true)
			}	
		    $('input[type="radio"]').change(function(){
		    	//console.log($(this).attr("value"))
		        if($(this).attr("value")=="FilterByTitle"){
		            $(".box").not(".FilterByTitle").hide();
		            $(".FilterByTitle").show();
		        }
		        if($(this).attr("value")=="FilterByDescription"){
		            $(".box").not(".FilterByDescription").hide();
		            $(".FilterByDescription").show();
		        }
		        if($(this).attr("value")=="NoFilter"){
		            $(".box").not(".NoFilter").hide();
		        }
		    });

		    

		    $("#filter").click(function(){
		   		if($(".test:checked").val()=="FilterByTitle"){
		   			var url_test = 'Part04_Search.php?title='+$("input[name=title]").val();
		   		}	
		   		else if($(".test:checked").val()=="FilterByDescription"){		   			
		   			var url_test = 'Part04_Search.php?description='+$("input[name=description]").val();
		   		}
		   		else{
		   			var url_test = 'Part04_Search.php';
		   		}
		   		window.location.replace(url_test);
		    });
		});
</script>

<div class="container" >
  <div class="panel panel-default">
    <div class="panel-body" style="background-color:rgb(249, 249, 249)">
	    <input type="radio" class="test" name="filter" value="FilterByTitle">Filter By Title<br>
	    <div class="FilterByTitle box" style="display:none">
	    	<input type="text" name="title"><br>
	    </div>
	    <input type="radio" class="test" name="filter" value="FilterByDescription">Filter By Description<br>
	    <div class="FilterByDescription box" style="display:none">
	    	<input type="text" name="description"><br>
	    </div>
	    <input type="radio" class="test" name="filter" value="NoFilter">No Filter(show all art works)
	    	<div class="NoFilter box" style="display:none"></div>
	    <br/>
	    <button class="btn btn-primary" id="filter">Filter</button>
	</div>
 </div>
</div>
<div>
<div class="container" style="padding-right: 30px;">
<?php 
if(isset($_GET["title"])) {
		if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            	$imagefilename=$row["ImageFileName"];
            	$keyword = $_GET["title"];
            	$title = preg_replace("/($keyword)/i",'<span style="background-color: #f1f442;">$0</span>', $row["Title"]);
        	    echo "<div class=row>
				  	<div class='thumbnail col-md-2'>
				  		<img id=artistImg class=img-responsive src=images\images\art\works\medium\\".$imagefilename.".jpg width=200 height=200>
				  	</div>
  					<div class=col-md-10>
    						<h4>".$title."</h4>
    						<p>".$row["Description"]."</p>
    				</div>
    			</div>";
            }
        }
    } 
if(isset($_GET["description"]))  {
	if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            	$imagefilename=$row["ImageFileName"];
            	$keyword = $_GET["description"];
            	$result->title = preg_replace("/($keyword)/i",'<span style="background-color: #f1f442;">$0</span>', $row["Description"]);
        	    echo "<div class=row>
				  	<div class='thumbnail col-md-2'>
				  		<img id=artistImg class=img-responsive src=images\images\art\works\medium\\".$imagefilename.".jpg width=200 height=200>
				  	</div>
  					<div class=col-md-10>
    						<h4>".$row["Title"]."</h4>
    						<p>".$result->title."</p>
    				</div>
    			</div>";
            }
        }
    }  
 else{
 	if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            	$imagefilename=$row["ImageFileName"];
            	//$keyword = $_GET["description"];
            	//$result->title = preg_replace("/($keyword)/i",'<span style="background-color: #ffa;>$1</span>', $row["Description"]);
        	    echo "<div class=row>
				  	<div class='thumbnail col-md-2'>
				  		<img id=artistImg class=img-responsive src=images\images\art\works\medium\\".$imagefilename.".jpg width=200 height=200>
				  	</div>
  					<div class=col-md-10>
    						<h4>".$row["Title"]."</h4>
    						<p>".$row["Description"]."</p>
    				</div>
    			</div>";
            }
        }
 }
      ?>
      </div>
</div>

<?php include 'footer.php'; ?>