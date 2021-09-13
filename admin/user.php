<?php
include("databaseconnection.php");
   class user {
	public $uid;
	public $uname;
	public $nic;
	public $user_type;
	public $upassword;
	private $con;


	function __construct(){
		 $this->con = new mysqli  (server,username,password,db);
		
	}
   	function u_reg(){ //TO INSERT USER DATA TO DATABASE
		$sql = "insert into user ( uname,unic,user_type,upassword)
		values ('$this->uname','$this->unic','$this->user_type',md5('$this->upassword'))";
		$this->con->query($sql);
		//echo $sql;

	}
	function getby_id($uid){ //TO GET ALL USERS BY ID
		$sql= "select * from user where uid= $uid";
		$r= $this->con ->query($sql);
		if ($r-> num_rows ==1){
			$row = $r -> fetch_array();
			$this-> uid = $row ["uid"];
			$this-> uname = $row ["uname"];
			$this-> unic = $row ["unic"];
			$this-> user_type = $row ["user_type"];
			$this-> upassword = $row ["upassword"];
			return $this;
		}
	
	}
	function get_all_users(){ //GET ALL USERS
		$sql= "select * from user";
		$r= $this->con ->query($sql);
		if ($r-> num_rows>0){
			$ar = array();
			while ($row = $r -> fetch_array()){
				$x= new user();
			$x-> uid = $row ["uid"];
			$x-> uname = $row ["uname"];
			$x-> unic = $row ["unic"];
			$x-> user_type = $row ["user_type"];
			$x-> upassword = $row ["upassword"];
			$ar[]= $x;
			}
			return $ar;
		}	
		
	}
   	function u_login($un,$pw) {
	$sql= "select * from user where uname='$un' and upassword=md5('$pw') ";
	$r= $this->con->query($sql);
	
	//echo $sql;
	if ($r->num_rows==1){
		
		$row = $r -> fetch_array();
		session_start();
		$_SESSION['login']= "ok";
		$_SESSION['user_type']= $row["user_type"];
		return true;
	}

	}
   }