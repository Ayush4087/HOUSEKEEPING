<html>
<head>
<title>ALL Asset</title>
<style type="text/css">
   .body
    {
      background-color: lightblue;
    }

.frame {
  background-color:green; 
   
  color: white; 
  padding: 30px 135px; 
  
}
.message {
  background-color:blue; 
   
  color: white; 
  padding: 40px 135px; 
  
}
</style>
<body bgcolor="lightblue">
<a href="admin.php">Home</a>
<div class="frame"><center><h1>ALL ASSETS</h1></center></div>
<form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

</form>
</body>
</head>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{	

error_reporting(E_ERROR | E_WARNING | E_PARSE);
$servername="localhost";
$username = "root";
$password="";
$databasename="udaan";
$conn = mysqli_connect($servername,$username,$password,$databasename);
$sql = "SELECT * FROM assets";

$ans = mysqli_query($conn,$sql);


if (mysqli_num_rows($ans) > 0) 
		{
			
		while($row = mysqli_fetch_assoc($ans))
			
		{		
			echo "<center><font size='5' face='verdana' color='brown'>";
			echo $row["name"];
			echo "</font></center>";
			echo "<br>";
			
		}
		}
else 
{echo "NO ASSET HAS BEEN DECLARED YET!!!!";}
		
	
mysqli_close($conn);
}


?>