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
		public function insertData($cname,$adnum,$grade,$dob,$email,$address, $file1,$file2,$file3)
		{	
			$allow = array('jpg', 'jpeg', 'png');
		   	$exntension = explode('.', $file1['name']);
		   	$fileActExt = strtolower(end($exntension));
		   	$fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
		   	$filePath = 'uploads/'.$fileNew; 

			   $allow2 = array('jpg', 'jpeg', 'png');
		   	$exntension2 = explode('.', $file2['name']);
		   	$fileActExt2 = strtolower(end($exntension2));
		   	$fileNew2 = rand() . "." . $fileActExt2;  // rand function create the rand number 
		   	$filePath2 = 'uploads/'.$fileNew2; 

			   $allow3 = array('jpg', 'jpeg', 'png');
		   	$exntension3 = explode('.', $file3['name']);
		   	$fileActExt3 = strtolower(end($exntension3));
		   	$fileNew3 = rand() . "." . $fileActExt3;  // rand function create the rand number 
		   	$filePath3 = 'uploads/'.$fileNew3; 

			
			if (in_array($fileActExt, $allow) && in_array($fileActExt2, $allow2) && in_array($fileActExt3, $allow3)) {
    		          if ($file1['size'] > 0 && $file1['error'] == 0 && $file2['size'] > 0 && $file2['error'] == 0 && $file3['size'] > 0 && $file3['error'] == 0) {
		            if (move_uploaded_file($file1['tmp_name'], $filePath) && move_uploaded_file($file2['tmp_name'], $filePath2) && move_uploaded_file($file3['tmp_name'], $filePath3)) {
		   		$query = "INSERT INTO application(cname,adnum,grade,dob,email,address,file1,file2,file3)
					VALUES('$cname','$adnum','$grade','$dob','$email','$address','$fileNew','$fileNew2','$fileNew3')";
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