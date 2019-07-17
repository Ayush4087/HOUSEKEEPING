<?php

class data_base
{
	
	private $servername="localhost";
	private $username = "root";
	private $password="";
	private $databasename="udaan";
	
	
	
	
	public $conn;
	public $sqluni,$sqlins;
	public $ans,$rows;
	public $id,$name,$tid,$tname;
	public $sqlop,$ans1,$ans2,$rows1,$rows2;
	public $wid,$wname,$freq,$row,$hours,$d,$ayush;
	public $to_email,$subject,$message,$from,$u_name,$psw;
	
	function connect()
	{
		$this->conn = mysqli_connect($this->servername,$this->username,$this->password,$this->databasename);
		
		
	}
	
	/////////////////////////////////////////////////INSERT ASSETS////////////////////////////////////////////////////////
	
	function insert_assets($id,$name)
	{$this->id = $id;
	$this->name = $name;
		
		
		
		
		$this->sqluni = "SELECT * FROM assets WHERE id='$this->id'";
		$this->ans = mysqli_query($this->conn,$this->sqluni);
		$rows = mysqli_num_rows($this->ans);
		
		if($rows>=1)
		{return "The Asset Exists!!!";}
		
		
		else{
		$this->sqlins = "INSERT INTO assets VALUES ('$this->id','$this->name')";
		$this->ans = mysqli_query($this->conn,$this->sqlins);
		if($this->ans)
			return "ASSET Inserted Successfullly!!!";
		else
			return "Error Occured!!!";
		}
		
		
	}
	////////////////////////////////////////////////INSERT TASK//////////////////////////////////////////////////////////////////////
	
	function insert_task($id,$tid,$tname,$freq)
	{
		$this->id = $id;
	$this->tid = $tid;
	$this->tname = $tname;
	$this->freq = $freq;
		
		
		
		
		$this->sqluni = "SELECT * FROM assets WHERE id='$this->id'";
		$this->sqlop = "SELECT * FROM task WHERE tid='$this->tid'";
		
		$this->ans1 = mysqli_query($this->conn,$this->sqluni);
		$this->ans2 = mysqli_query($this->conn,$this->sqlop);
		
		$rows1 = mysqli_num_rows($this->ans1);
		$rows2 = mysqli_num_rows($this->ans2);
		
		
		if($rows1==0)
		{return "Plz Enter The Valid Asset Id!!!";}
		
		if($rows1>=1 && $rows2>=1)
		{return "The Task Id Has Been Alloted!!!";}
		
		
		else{
		$this->sqlins = "INSERT INTO task VALUES ('$this->id','$this->tid','$this->tname','$this->freq')";
		$this->ans = mysqli_query($this->conn,$this->sqlins);
		if($this->ans)
			return "Asset With Task Inserted Successfullly!!!";
		else
			return "Error Occured!!!";
		}
		
		
	}
	
	
	////////////////////////////////////////////INSERT WORKER//////////////////////////////////////////////////////////////////////////////
	
	function insert_worker($wid,$wname,$id)
	{$this->wid = $wid;
	$this->wname = $wname;
	$this->id = $id;
	
	$this->sqluni = "SELECT * FROM workers WHERE wid='$this->wid'";
		$this->ans = mysqli_query($this->conn,$this->sqluni);
		$rows = mysqli_num_rows($this->ans);
		
		if($rows>=1)
		{return "The Worker Exists!!!";}
		
		
		else{
		$this->sqlins = "INSERT INTO workers VALUES ('$this->wid','$this->wname','$this->id','NULL')";
		$this->ans = mysqli_query($this->conn,$this->sqlins);
		if($this->ans)
			return "WORKER Inserted Successfullly!!!";
		else
			return "Error Occured!!!";
		}
		
		
	}
	
	//////////////////////////////////////////////////////DISPLAY ASSETS//////////////////////////////////////////////////////////////////////////
	
	function show_assets()
	{
		$this->sqluni = "SELECT * FROM assets";
		$this->ans = mysqli_query($this->conn,$this->sqluni);
		
		if (mysqli_num_rows($this->ans) > 0) 
		{
		while($this->row = mysqli_fetch_assoc($this->ans))
		{
			echo $this->row["name"];
			echo "<br>";
		}
		}
		
		else 
		{echo "0 rows";}
		
	}
	
	////////////////////////////////////////////////////////////ALLOCATE///////////////////////////////////////////////////////////////////////////
	function allocate($tid,$id,$wid,$hours)
	{
		$this->tid = $tid;
		$this->id = $id;
		$this->wid = $wid;
		$this->hours = $hours;
		
		$this->d = date('Y-m-d H:i:s');
		
		
		$this->sqluni = "SELECT * FROM allocate WHERE wid='$this->wid'";
		$this->ans = mysqli_query($this->conn,$this->sqluni);
		$rows = mysqli_num_rows($this->ans);
		
		if($rows>=1)
		{return "The Worker Is Not Free!!!";}
		
		
		else{
		$this->sqlins = "INSERT INTO allocate VALUES ('$this->tid','$this->id','$this->wid','$this->d','$this->hours')";
		
		$this->sqluni = "UPDATE workers SET assigned='$this->id' WHERE wid='$this->wid'";
		$this->ayush = mysqli_query($this->conn,$this->sqluni);
		
		$this->ans = mysqli_query($this->conn,$this->sqlins);
		if($this->ans)
			return "ALLOCATION Done Successfullly!!!";
		else
			return "Error Occured!!!";
		}
	}
	
	//////////////////////////////////////////////////////////EMAIL VARIFICATION/////////////////////////////////////////////////////////
	function insert_email($u_name,$email)
	{
		
		$this->u_name = $u_name;
		$this->psw = $this->u_name."2580";
		$this->to_email = $email;
		
		$this->sqluni = "SELECT * FROM email WHERE email='$this->to_email'";
		$this->ans = mysqli_query($this->conn,$this->sqluni);
		$rows = mysqli_num_rows($this->ans);
		if($rows>=1)
		{return "Email Has Been Already Registered!!!";}
	
		else
		{
			
			$this->sqlins = "INSERT INTO email VALUES ('$this->u_name','$this->to_email','$this->psw')";
		
	
		$this->ans = mysqli_query($this->conn,$this->sqlins);
		
		if($this->ans)
			return "This is a one time password , Remember it carefully!!!<br>Your Password Is: $this->psw";
		else
			return "Error Occured!!!";
		}
			
	}
		
	/////////////////////////////////////////////////////PASSWORD VARIFY////////////////////////////////////////////////////////////////
		
	function verify_user($email,$psw)
	{
		
		
		
		$this->to_email = $email;
		$this->psw = $psw;
		
		$this->sqluni = "SELECT * FROM email WHERE email='$this->to_email' AND password='$this->psw' ";
		$this->ans = mysqli_query($this->conn,$this->sqluni);
		$rows = mysqli_num_rows($this->ans);
		if($rows>=1)
		{return "WELCOME $email You Can Use The HouseKeeping API..<br> <a href='admin.php'><button>ADMIN PANEL</button></a>";}
	
		else
		{
			return "$email PLZ ENTER THE CORRECT PASSWORD :/";
		
		}
			
	}
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	function close()
	{
		mysqli_close($this->conn);
	}
	
	
}
?>