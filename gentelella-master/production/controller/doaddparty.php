<?php

	include("doconnect.php");
	session_start();
	$user_check = $_SESSION['login_user'];
	include("../query/find_ledger.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

	$party_name = $_REQUEST['party_name'];	
	$party_site = $_REQUEST['party_site'];
	$party_type = $_REQUEST['party_type'];
	
	$tax = $_REQUEST['tax']/100;	

	$status = 'Active';
	$created_date =  date("Y-m-d");
	$last_update_date =  date("Y-m-d");
	$category = $_REQUEST['category'];

	$phone = $_REQUEST['phone'];
	$email = $_REQUEST['email'];

	$check_party= "SELECT * FROM hz_party WHERE ledger_id = '".$ledger_new."' and party_name = '".$party_name."' ";
	$result = mysqli_query($conn,$check_party);
	$existing = mysqli_fetch_assoc($result);

	if ($existing) { 
     if ($existing['party_name'] === $party_name) {
	      echo 'Party already exist';
	    }
	}
	else{
		
		$sql = "INSERT INTO hz_party (party_name, party_site,party_type,status,tax , created_by , created_date,last_update_by,last_update_date,ledger_id,phone,email,category)
		VALUES ('".$party_name."', '".$party_site."','".$party_type."','".$status."','".$tax."','".$user_check."','".$created_date."','".$user_check."','".$last_update_date."','".$ledger_new."','".$phone."','".$email."','".$category."')";

		if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);

		header("Location:../form_customer.php");
	}
}

?>