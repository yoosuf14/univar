<?php
include_once("databaseconnection.php");
class supplier{
		public $sup_id;
		public $sup_name;
		public $sup_tel;
		public $sup_address;
		public $cstatus;
		private $con;
	
	function __construct(){
		 $this->con = new mysqli (server,username,password,db);
		
	}
	function supplier_reg(){
			$sql="Insert into supplier(sup_name,sup_tel,sup_address)
			values('$this->sup_name','$this->sup_tel','$this->sup_address')";
			$this->con->query ($sql);
			
	}
	
	function del($id){
			$sql="update supplier set cstatus='del' where sup_id=$id";
			$this->con->query ($sql);
			
	
	
	
	}function update($sup_id){
			$sql="update supplier set sup_name='$this->sup_name',sup_tel='$this->sup_tel',sup_address='$this->sup_address' where sup_id=$sup_id";
			$this->con->query ($sql);
			//echo $sql;
			//exit;
	}
	
	
		function get_by_id($sup_id){
			$sql="select * from supplier where sup_id= $sup_id";
			$r=$this->con->query ($sql);
				$row=$r->fetch_array();
					$c=new supplier();
					$c->sup_id=$row["sup_id"];
					$c->sup_name=$row["sup_name"];
					$c->sup_tel=$row["sup_tel"];
					$c->sup_address=$row["sup_address"];
					
				return $c;
	}
	
	function get_all_supplier(){
			$sql="select * from supplier where cstatus!='del'";
			$r=$this->con->query ($sql);
			if ($r->num_rows >0){
				$ar=array();
				while($row=$r->fetch_array()){
					$x=new supplier();
					$x->sup_id=$row["sup_id"];
					$x->sup_name=$row["sup_name"];
					$x->sup_tel=$row["sup_tel"];
					$x->sup_address=$row["sup_address"];
					$ar[]=$x;
				}
				return $ar;
			}
	}
}
?>