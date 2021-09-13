<?php
include_once("databaseconnection.php");
class customer{
		public $firstname;
		public $lastname;
		public $emailaddress;
		public $nic;
		public $contactnumber;
		public $cus_id;
		public $username;
		public $cstatus;
		private $con;
	
function __construct(){
		 $this->con = new mysqli (server,username,password,db);
		
	}
	function customer_reg(){
			$sql="Insert into customers(username,fname,lname,email,nic,phone,address)
			values('$this->username','$this->firstname','$this->lastname','$this->emailaddress','$this->nic','$this->contactnumber' ,'$this->address')";
			$this->con->query ($sql);
			echo $sql;
	
	
	}
	function del($d){
			$sql="update customers set cstatus='del' where id=$d";
			$this->con->query ($sql);
	
	
	
	
	}
	function check_nic($a){
		$sql="select * from customer where nic='$a'";
		$res=$this->con->query($sql);
		if($res->num_rows>0)
				echo "1";
		else
				echo "0";
		
	}
	
	function update($cus_id){
			$sql="update customers set fname='$this->firstname',lname='$this->lastname',email='$this->emailaddress',nic='$this->nic',phone='$this->contactnumber', address='$this->address' where id=$cus_id";
			$this->con->query ($sql);
	}
	
	function get_by_id($cus_id){
			$sql="select * from customers where id= $cus_id";
			$r=$this->con->query ($sql);
				$row=$r->fetch_array();
					$c=new customer();
					$c->firstname=$row["fname"];
					$c->lastname=$row["lname"];
					$c->emailaddress=$row["email"];
					$c->nic=$row["nic"];
					$c->contactnumber=$row["phone"];
					$c->address=$row["address"];
					$c->cus_id=$row["id"];
					$c->username=$row["username"];
		
					
				return $c;
	}
	
	function get_all_customer(){
			$sql="select * from customers where cstatus!='del'";
			$r=$this->con->query ($sql);
			if ($r->num_rows >0){
				$ar=array();
				while($row=$r->fetch_array()){
					$x=new customer();
					$x->firstname=$row["fname"];
					$x->lastname=$row["lname"];
					$x->emailaddress=$row["email"];
					$x->nic=$row["nic"];
					$x->contactnumber=$row["phone"];
					$x->address=$row["address"];
					$x->cus_id=$row["id"];
					$x->username=$row["username"];
		
					
					
					$ar[]=$x;
				}
				return $ar;
			}
	}
	function getcount(){
			$sql="select count(*)as count from customer where cstatus!='del' ";
			$r=$this->con->query ($sql);
				$row=$r->fetch_array();
					$c=new customer();
					$c->count=$row["count"];
					
				return $c;
	}
	
}
?>