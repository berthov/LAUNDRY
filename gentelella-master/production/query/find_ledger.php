<?php
	
	// cek ledger id
    $user_check_ledger = "SELECT a.ledger_id as ledger FROM employee a WHERE a.name = '".$user_check."'"; 
    $result_ledger = mysqli_query($conn,$user_check_ledger);
    $existing_ledger = mysqli_fetch_assoc($result_ledger);

    $ledger_new =  $existing_ledger['ledger'];


    $user_check_outlet = 
    "SELECT b.outlet_id as outlet , 
    a.role , 
    b.billing_status,
    b.expiration_date
    FROM employee a , outlet b	
    WHERE a.name = '".$user_check."' 
    and a.ledger_id = b.ledger_id	
    and a.outlet_id = b.outlet_id"; 
    $result_outlet = mysqli_query($conn,$user_check_outlet);
    $existing_outlet = mysqli_fetch_assoc($result_outlet);

    $outlet_new =  $existing_outlet['outlet'];
    $staff_role =  $existing_outlet['role'];
    $outlet_billing_status =  $existing_outlet['billing_status'];
    $outlet_expiration_date =  $existing_outlet['expiration_date'];

    // cek status billing
    $outlet_check_status = "
    SELECT a.billing_status 
    FROM outlet a 
    WHERE a.ledger_id = '".$ledger_new."'
    and a.billing_status in ('Member')"; 
    $result_outlet = mysqli_query($conn,$outlet_check_status);
    $existing_outlet = mysqli_fetch_assoc($result_outlet);

?>