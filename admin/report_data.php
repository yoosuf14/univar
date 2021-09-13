<?php
include_once("databaseconnection.php");
class reportdata{
		public $assetid;
		public $assetname;
		public $quantity;
		public $assetcost;
		public $purchasedate;
		public $branch;
		public $productID;
		public $productName;
		public $productDescription;
		public $quantityAvailable;					
					

		private $con;
	
function __construct(){
		 $this->con = new mysqli (server,username,password,db);
		
	}
	
	function get_current_assets(){
			$sql="select * from asset where NOT del='del'";
			$r=$this->con->query ($sql);
			if ($r->num_rows >0){
				$ar=array();
				while($row=$r->fetch_array()){
					$x=new reportdata();
					$x->assetid=$row["assetid"];
					$x->assetname=$row["assetname"];
					$x->quantity=$row["quantity"];
					$x->assetcost=$row["assetcost"];					
					$x->purchasedate=$row["purchasedate"];					
					$x->branch=$row["branch"];					
					
					$ar[]=$x;
				}
				return $ar;
			}
	}

	function get_current_products(){
			$sql="select * from products";
			$r=$this->con->query ($sql);
			if ($r->num_rows >0){
				$ar=array();
				while($row=$r->fetch_array()){
					$x=new reportdata();
					$x->productID=$row["productID"];
					$x->productName=$row["productName"];
					$x->productDescription=$row["productDescription"];
					$x->quantityAvailable=$row["quantityAvailable"];					
					$x->UnitPrice=$row["UnitPrice"];										
					
					$ar[]=$x;
				}
				return $ar;
			}
	}	
}
?>