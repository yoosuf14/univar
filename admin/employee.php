<?php
include_once("databaseconnection.php");
class employee{
		public $emp_id;
		public $emp_name;
		public $emptel;
		public $nic;
		public $salary;
		public $appdate;
		public $cstatus;
		private $con;
	
	function __construct(){
		 $this->con = new mysqli (server,username,password,db);
		
	}
	function employee_reg(){
			$sql="Insert into employee(emp_name,emptel,nic,salary,appdate)
			values('$this->emp_name','$this->emptel','$this->nic','$this->salary','$this->appdate')";
			$this->con->query ($sql);
			
	}
	
	function del($id){
			$sql="update employee set cstatus='del' where emp_id=$id";
			$this->con->query ($sql);
			
	
	
	
	}function update($emp_id){
			$sql="update employee set emp_name='$this->emp_name',emptel='$this->emptel',nic='$this->nic',salary='$this->salary',appdate='$this->appdate' where emp_id=$emp_id";
			$this->con->query ($sql);
			//echo $sql;
			//exit;
	}
	
	
		function get_by_id($emp_id){
			$sql="select * from employee where emp_id= $emp_id";
			$r=$this->con->query ($sql);
				$row=$r->fetch_array();
					$c=new employee();
					$c->emp_id=$row["emp_id"];
					$c->emp_name=$row["emp_name"];
					$c->emptel=$row["emptel"];
					$c->nic=$row["nic"];
					$c->salary=$row["salary"];
					$c->appdate=$row["appdate"];
					
				return $c;
	}
	
	function get_all_employee(){
			$sql="select * from employee where cstatus!='del'";
			$r=$this->con->query ($sql);
			if ($r->num_rows >0){
				$ar=array();
				while($row=$r->fetch_array()){
					$x=new employee();
					$x->emp_id=$row["emp_id"];
					$x->emp_name=$row["emp_name"];
					$x->emptel=$row["emptel"];
					$x->nic=$row["nic"];
					$x->salary=$row["salary"];
					$x->appdate=$row["appdate"];
					$ar[]=$x;
				}
				return $ar;
			}
	}
}
?>