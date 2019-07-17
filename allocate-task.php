<html>
<head>
<title>Allocation</title>
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
<div class="frame1"><center><h1>Allocation</h1></center></div>
<br>
<br>
<center>
<form name = "form" onSubmit="return test()" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
TASK ID: 
<br>
<input type="text" name="tid" placeholder="eg:t1,t2,t3">
<br>
ASSET ID:
<br>
<input type="text" name="id" placeholder="eg:1,2,3">
<br>
WORKER ID:
<br>
<input type="text" name="wid" placeholder="eg:w1,w2,w3">
<br>
DEADLINE TO FINISH:
<br>
<input type="text" name="hour" placeholder="eg:hours">
<br>
<br>
<input class="button" type="submit">
</form></center>
<script type="text/javascript">
                function test()
                {
                    var taskid=document.forms["form"]["tid"];
                    var assetid=document.forms["form"]["id"];
					var wid=document.forms["form"]["wid"];
					var hour=document.forms["form"]["hour"];
                    
                    
                    
                    if(taskid.value=="")
                        {
                            window.alert("TASK ID Can't Be Empty!!!");
                            name.focus();
                            return false;
                            
                        }
                    if(assetid.value=="")
                        {
                            window.alert("ASSET ID Can't Be Empty!!!");
                            name.focus();
                            return false;
                            
                        }
						
						if(wid.value=="")
                        {
                            window.alert("WORKER ID Can't Be Empty!!!");
                            name.focus();
                            return false;
                            
                        }
						
						if(hour.value=="")
                        {
                            window.alert("HOURS Can't Be Empty!!!");
                            name.focus();
                            return false;
                            
                        }
						
                    
                    return true;
                    
                }
            
            </script>



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

$tid = $_POST["tid"];
$id = $_POST["id"];
$wid = $_POST["wid"];
$hours = $_POST["hour"];


$obj = new data_base;
$obj->connect();

$msg = $obj->allocate($tid,$id,$wid,$hours);
echo "<font face='Algerian' color='green'>";
echo $msg;
echo "</font>";

$obj->close();
unset($obj);
}

?>


