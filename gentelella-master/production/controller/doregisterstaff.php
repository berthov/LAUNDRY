<?php

	include("doconnect.php");
	session_start();
	$user_check = $_SESSION['login_user'];
	include("../query/find_ledger.php");

	if($_SERVER["REQUEST_METHOD"]=="POST"){

		$usernameregister = mysqli_escape_string($conn, $_POST['username']);
		$passwordregister = md5(mysqli_escape_string($conn, $_POST['password']));
		$cpasswordregister = md5(mysqli_escape_string($conn, $_POST['cpassword']));
		$emailregister = mysqli_escape_string($conn, $_POST['email']);
		$roleregister = mysqli_escape_string($conn, $_POST['role']);
		$outletregister = mysqli_escape_string($conn, $_POST['outlet']);
		$created = date("Y-m-d H:i:s");

		$user_check_sql = "SELECT * FROM employee WHERE name = '$usernameregister' OR email='$emailregister' ";
		$result = mysqli_query($conn,$user_check_sql);
		$existing_user = mysqli_fetch_assoc($result);

		if($passwordregister == $cpasswordregister){
			if ($existing_user) { 
			     if ($existing_user['name'] === $usernameregister) {
			      echo 'Username already exist';
			    }

			    else if ($existing_user['email'] === $emailregister) {
					echo 'Email already exist';
			    }
			}

			else {

					$sql = "INSERT INTO employee (name, role, email, outlet_id, employee_id, created_by, last_update_by, created_date, last_update_date, password,ledger_id) VALUES ('$usernameregister', '$roleregister', '$emailregister', '$outletregister', NULL, NULL, NULL, '$created', NULL, '$passwordregister','$ledger_new')";
	  				$result = mysqli_query($conn, $sql);

	  				// cek double entry kalau dia input waktu statusnya udah member
	  				$sql_p = "SELECT * FROM employee where ledger_id = '".$ledger_new."' and name = '".$usernameregister."' and email = '".$emailregister."'  ";
	  				$result_p = mysqli_query($conn, $sql_p);
	  				$existing_p = mysqli_fetch_assoc($result_p);


	  				if ($existing_p === NULL) {
						$sql_p = "INSERT INTO employee (name, role, email, outlet_id, employee_id, created_by, last_update_by, created_date, last_update_date, password,ledger_id) VALUES ('$usernameregister', '$roleregister', '$emailregister', '$outletregister', NULL, NULL, NULL, '$created', NULL, '$passwordregister','$ledger_new')";
	  					$result_p = mysqli_query($conn, $sql_p);	
	  				}

					header("location: ../employees.php");
			}
		} else {
			echo 'password did not match';
		}
		
	}
?>