<?php
include("databaseconnection.php");
class asset{
		public $assetname;
		public $quantity;
		public $assetcost;
		public $purchasedate;
		public $branch;
		public $assetid;
		public $del;
		private $con;
	
	function __construct(){
		 $this->con = new mysqli (server,username,password,db);
		
	}
	function asset_reg(){
			$sql="Insert into asset(assetname,quantity,assetcost,purchasedate,branch)
			values('$this->assetname','$this->quantity','$this->assetcost','$this->purchasedate','$this->branch')";
			$this->con->query ($sql);
	
	
	
	
	}
	function del($d){
			$sql="update asset set del='del' where assetid=$d";
			$this->con->query ($sql);
	
	
	
	
	}
	function update($assetid){
			$sql="update asset set assetname='$this->assetname',quantity='$this->quantity',assetcost='$this->assetcost',purchasedate='$this->purchasedate',branch='$this->branch' where assetid=$assetid";
			$this->con->query ($sql);
	}
	
	function get_by_id($assetid){
			$sql="select * from asset where assetid= $assetid";
			$r=$this->con->query ($sql);
				$row=$r->fetch_array();
					$c=new asset();
					$c->assetname=$row["assetname"];
					$c->quantity=$row["quantity"];
					$c->assetcost=$row["assetcost"];
					$c->purchasedate=$row["purchasedate"];
					$c->branch=$row["branch"];
					$c->assetid=$row["assetid"];
					
				return $c;
	}
	
	function get_all_asset(){
			$con=new mysqli("localhost","root","","sarilco");
			$sql="select * from asset where del!='del'";
			$r=$this->con->query ($sql);
			if ($r->num_rows >0){
				$ar=array();
				while($row=$r->fetch_array()){
					$x=new asset();
					$x->assetname=$row["assetname"];
					$x->quantity=$row["quantity"];
					$x->assetcost=$row["assetcost"];
					$x->purchasedate=$row["purchasedate"];
					$x->branch=$row["branch"];
					$x->assetid=$row["assetid"];
					
					
					$ar[]=$x;
				}
				return $ar;
			}
	}
}
?>