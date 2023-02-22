<?php

	class Customers
	{
		private $servername = "localhost";
		private $username   = "root";
		private $password   = "";
		private $dbname     = "apply";
		public  $con;


		// Database Connection 
		public function __construct()
		{
		    try {
			$this->con = new mysqli($this->servername, $this->username, $this->password, $this->dbname);	
		    } catch (Exception $e) {
			echo $e->getMessage();
		    }
		}

		// Insert customer data into customer table
		public function insertData($cname,$adnum,$grade,$dob,$email,$address, $file1)
		{	
			$allow = array('jpg', 'jpeg', 'png');
		   	$exntension = explode('.', $file1['name']);
		   	$fileActExt = strtolower(end($exntension));
		   	$fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
		   	$filePath = 'uploads/'.$fileNew; 
			
			if (in_array($fileActExt, $allow)) {
    		          if ($file1['size'] > 0 && $file1['error'] == 0) {
		            if (move_uploaded_file($file1['tmp_name'], $filePath)) {
		   		$query = "INSERT INTO application(cname,adnum,grade,dob,email,address,file1)
					VALUES('$cname','$adnum','$grade','$dob','$email','$address',$file1)";
				$sql = $this->con->query($query);
				if ($sql==true) {
				   return true;
				}else{
				  return false;
			    }   		    
		        }
		      }
		   }
		}

		// Fetch customer records for show listing

		public function displayData()
		{
		    $sql = "SELECT * FROM application";
		    $query = $this->con->query($sql);
		    $data = array();
		    if ($query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
			    $data[] = $row;
			}
			return $data;
		    }else{
			return false;
		    }
		}

	}
?>