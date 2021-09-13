<?php
include_once("databaseconnection.php");
class order{
		public $firstname;
		public $lastname;
		public $emailaddress;
		public $nic;
		public $contactnumber;
		private $con;
	
function __construct(){
		 $this->con = new mysqli (server,username,password,db);
		
	}

	function del($d){
			$sql="update orders set status='dispatched' where id=$d";
			$this->con->query ($sql);
	
	}
		
	function get_by_id($cus_id){
			$sql="select * from customers where id= $cus_id";
			$r=$this->con->query ($sql);
				$row=$r->fetch_array();
					$c=new orders();
					$c->orderdate=$row["orderdate"];
					$c->customerid=$row["customerid"];
					$c->productid=$row["productid"];
					$c->quantity=$row["quantity"];
					$c->id=$row["id"];
		
					return $c;
	}
	
	function get_all_porders(){
			$sql="select * from orders where NOT status='dispatched'";
			$r=$this->con->query ($sql);
			if ($r->num_rows >0){
				$ar=array();
				while($row=$r->fetch_array()){
					$x=new order();
					$x->orderdate=$row["orderdate"];
					$x->customerid=$row["customerid"];
					$x->productId=$row["productId"];
					$x->quantity=$row["quantity"];					
					$x->id=$row["id"];					
					
					$ar[]=$x;
				}
				return $ar;
			}
	}
	function get_all_dorders(){
			$sql="select * from orders where status='dispatched'";
			$r=$this->con->query ($sql);
			if ($r->num_rows >0){
				$ar=array();
				while($row=$r->fetch_array()){
					$x=new order();
					$x->orderdate=$row["orderdate"];
					$x->customerid=$row["customerid"];
					$x->productId=$row["productId"];
					$x->quantity=$row["quantity"];					
					$x->id=$row["id"];					
					
					$ar[]=$x;
				}
				return $ar;
			}
	}
	
}
?>