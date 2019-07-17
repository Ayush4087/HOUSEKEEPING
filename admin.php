<?php 
session_start();
echo '<p align="right">';
echo '<font face="verdana" color="yellow" size="3">You are logged in as :- '.$_SESSION['email'];
echo '</font></p>'
?>


<html>
<head>
<title>House Keeping</title>
<style type="text/css">

input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  background-color: #3CBC8D;
  color: white;
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
  padding: 20px 160px; 
  
}
.message {
  background-color:blue; 
   
  color: white; 
  padding: 40px 200px; 
  
}
</style>
<body bgcolor="lightblue" background="adminback.jpg">
<p align="right">
<a href="index.php"><button>LOG OUT</button></a>
</p>
<div class="frame">
<h1><center><marquee behavior=scroll direction="right" scrollamount="10">HOUSE KEEPING</marquee></center></h1></div>
<br>
<br>

<center>
<a href="add-asset.php"><button class="button button1">ADD ASSET</button></a>
<br>
<br>
<a href="add-task.php"><button class="button button1">ADD TASK</button></a>
<br>
<br>
<a href="add-worker.php"><button class="button button1">ADD WORKER</button></a>
<br>
<br>
<a href="allocate-task.php"><button class="button button1">ALLOCATE TASK</button></a>
<br>
<br>
<a href="all.php"><button class="button button1">SHOW ASSETS</button></a>
<br>
<br>
</center>




<div class="frame">
<h2><center><marquee behavior=scroll direction="left" scrollamount="10">Contact: &nbsp ayushmishra4087@gmail.com &nbsp Regarding &nbsp this &nbsp project..</marquee></center></h2>

</body>
</head>
</html>

