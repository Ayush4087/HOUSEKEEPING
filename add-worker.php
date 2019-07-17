<html>
<head>
<title>Add Worker</title>
<style type="text/css">

input[type=text] {
  width: 25%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  background-color: white;
  color: black;
}
 .button {
  background-color:#3c64a6;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}

.button1 {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}

.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}



.frame1 {
  background-color:green; 
   
  color: white; 
  padding: 30px 135px; 
  
}
.message1 {
  background-color:blue; 
   
  color: white; 
  padding: 20px 135px; 
  
}
</style>
<body bgcolor="lightblue">
<a href="admin.php">Home</a>
<div class="frame1"><center><h1>Add - Worker</h1></center></div>
<br>
<br>
<center>
<form name = "form" onSubmit="return test()" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
WORKER ID: 
<br>
<input type="text" name="wid" placeholder="eg:w1,w2,w3">
<br>
WORKER NAME:
<br>
<input type="text" name="wname" placeholder="eg:Raju..">
<br>
CAPABILITY OF WORKER:
<br>
<input type="text" name="id" placeholder="eg:1,2,3">
<br>
<br>
<br>

<input type="submit" class="button">
</form></center>
<script type="text/javascript">
                function test()
                {
                    var wid=document.forms["form"]["wid"];
                    var wname=document.forms["form"]["wname"];
					var id=document.forms["form"]["id"];
                    
                    
                    
                    if(wid.value=="")
                        {
                            window.alert("WORKER ID Can't Be Empty!!!");
                            name.focus();
                            return false;
                            
                        }
                    if(wname.value=="")
                        {
                            window.alert("WORKER NAME Can't Be Empty!!!");
                            name.focus();
                            return false;
                            
                        }
						
						if(id.value=="")
                        {
                            window.alert("CAPABILITY FIELD Can't Be Empty!!!");
                            name.focus();
                            return false;
                            
                        }
						
                    
                    return true;
                    
                }
            
            </script>

<br>
<br>
<br>

<center><div class="message1"><h2>Message:-</h2></div></center>

</body>
</head>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{	
include_once "database.php";
error_reporting(E_ERROR | E_WARNING | E_PARSE);

$wid = $_POST["wid"];
$wname = $_POST["wname"];
$id = $_POST["id"];

$obj = new data_base;
$obj->connect();

$msg = $obj->insert_worker($wid,$wname,$id);
echo "<font face='Algerian' color='green'>";
echo $msg;
echo "</font>";

$obj->close();
unset($obj);
}


?>
