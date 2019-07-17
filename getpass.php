<html>
<head>
<title>getpass</title>
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
  padding: 20px 135px; 
  
}
</style>
<body bgcolor="lightblue">
<a href="getpass.php">Refresh</a>
<div class="frame"><center><h1>GET PASSWORD</h1></center></div>
<br>
<br>
<center>
<form name = "form" onSubmit="return test()" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
NAME : 
<br>
<input type="text" name="u_name" placeholder="Put Your Name Here!!!">
<br>
EMAIL : 
<br>
<input type="text" name="email" placeholder="Put Your Email To Get Password!!!">
<br>

<input class="button" type="submit">
</form></center>
<script type="text/javascript">
                function test()
                {
                    var name=document.forms["form"]["u_name"];
                    var email=document.forms["form"]["email"];
                    
                    
                    if(email.value=="")
                        {
                            window.alert("Email Can't Be Empty!!!");
                            name.focus();
                            return false;
                            
                        }
                    if(name.value=="")
                        {
                            window.alert("Name Can't Be Empty!!!");
                            name.focus();
                            return false;
                            
                        }
                    
                    return true;
                    
                }
            
            </script>
<br>

<center><div class="message"><h2>Message:-</h2></div></center>

</body>
</head>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
include_once "database.php";
error_reporting(E_ERROR | E_WARNING | E_PARSE);

$u_name = $_POST["u_name"];
$email = $_POST["email"];



$obj = new data_base;
$obj->connect();
$msg = $obj->insert_email($u_name,$email);
echo "<font face='Algerian' color='green'>";
echo $msg;
echo "</font>";
echo "<br> <a href='index.php'><button class='button'> LOGIN HERE</button></a>";



$obj->close();
unset($obj);


}
?>


