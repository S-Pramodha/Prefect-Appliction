<?php
if(isset($_POST['xml'])){
	$con=mysqli_connect("localhost", "root", "", "apply");

if(!$con){
	echo "DB not Connected...";
}
else{
$result=mysqli_query($con, "Select * from application");
if($result>0){
$xml = new DOMDocument("1.0");

// It will format the output in xml format otherwise
// the output will be in a single row
$xml->formatOutput=true;
$fitness=$xml->createElement("users");
$xml->appendChild($fitness);
while($row=mysqli_fetch_array($result)){
	$user=$xml->createElement("user");
	$fitness->appendChild($user);
	
	
	
	$uname=$xml->createElement("uname", $row['cname']);
	$user->appendChild($uname);
	
	$email=$xml->createElement("email", $row['email']);
	$user->appendChild($email);
	
	$password=$xml->createElement("address", $row['address']);
	$user->appendChild($password);
	
	$description=$xml->createElement("grade", $row['grade']);
	$user->appendChild($description);
	
	$role=$xml->createElement("dob", $row['dob']);
	$user->appendChild($role);
	
	$pic=$xml->createElement("admision_no", $row['adnum']);
	$user->appendChild($pic);
	
}
echo "<xmp>".$xml->saveXML()."</xmp>";
$xml->save("a.xml");
}
else{
	echo "error";
}
}
}
?>
