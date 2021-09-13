<?php
include_once("databaseconnection.php");
class branch{
		public $branchname;
		public $branchlocation;
		public $branchaddress;
		public $branchtel;
		public $branchid;
		private $con;
	
	function __construct(){
		 $this->con = new mysqli (server,username,password,db);
		
	}
	function branch_reg(){
			$sql="Insert into branch(branchname,branchlocation,branchaddress,branchtel)
			values('$this->branchname','$this->branchlocation','$this->branchaddress','$this->branchtel')";
			$this->con->query ($sql);
			//echo $sql;
	
	
	
	
	}
	function del($d){
			$sql="update branch set del='del' where branchid=$d";
			$this->con->query ($sql);
	
	
	
	
	}
	function update($branchid){
			$sql="update branch set branchname='$this->branchname',branchlocation='$this->branchlocation',branchaddress='$this->branchaddress',branchtel='$this->branchtel' where branchid=$branchid";
			$this->con->query ($sql);
	}
	
	function get_by_id($branchid){
			$sql="select * from branch where branchid= $branchid";
			$r=$this->con->query ($sql);
				$row=$r->fetch_array();
					$c=new branch();
					$c->branchname=$row["branchname"];
					$c->branchlocation=$row["branchlocation"];
					$c->branchaddress=$row["branchaddress"];
					$c->branchtel=$row["branchtel"];
					$c->branchid=$row["branchid"];
					
				return $c;
	}
	
	function get_all_branch(){
			$sql="select * from branch where del!='del'";
			$r=$this->con->query ($sql);
			if ($r->num_rows >0){
				$ar=array();
				while($row=$r->fetch_array()){
					$x=new branch();
					$x->branchname=$row["branchname"];
					$x->branchlocation=$row["branchlocation"];
					$x->branchaddress=$row["branchaddress"];
					$x->branchtel=$row["branchtel"];
					$x->branchid=$row["branchid"];
					
					
					$ar[]=$x;
				}
				return $ar;
			}
	}
}
?>