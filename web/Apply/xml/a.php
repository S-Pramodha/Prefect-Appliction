<?php
$con=mysqli_connect("localhost", "root", "", "vote");

if(!$con){
	echo "DB not Connected...";
}
else{
$result=mysqli_query($con, "Select * from users");
if($result>0){
$xml = new DOMDocument("1.0");

// It will format the output in xml format otherwise
// the output will be in a single row
$xml->formatOutput=true;
$fitness=$xml->createElement("voters");
$xml->appendChild($fitness);
while($row=mysqli_fetch_array($result)){
	$user=$xml->createElement("voter");
	$fitness->appendChild($user);
	
	$uid=$xml->createElement("vid", $row['id']);
	$user->appendChild($uid);
	
	$uname=$xml->createElement("vname", $row['name']);
	$user->appendChild($uname);
	
	$email=$xml->createElement("email", $row['email']);
	$user->appendChild($email);
	
	$description=$xml->createElement("status", $row['status']);
	$user->appendChild($description);
	
	$role=$xml->createElement("nic", $row['nic']);
	$user->appendChild($role);
	
	$pic=$xml->createElement("address", $row['address']);
	$user->appendChild($pic);
	
}
echo "<xmp>".$xml->saveXML()."</xmp>";
$xml->save("a.xml");
}
else{
	echo "error";
}
}
?>
