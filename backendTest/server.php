<?php 
// session_start(); 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'pixbeydatabase');

	// initialize variables
	$name = "";
	$address = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$Contact =$_POST['Contact'];
		$Email= $_POST['Email'];
		// $address = $_POST['address'];
	
		$TypeofProject = $_POST['TypeofProject'];
		$BudgetRange =$_POST['BudgetRange'];
		$BudgetRangeTo=$_POST['BudgetRangeTo'];
		// $time =$_POST['time'];
		$DataTime= $_POST['DataTime'];
		// $Message = $_POST['']
		
		$Message= $_POST['Message'];
		mysqli_query($db, "INSERT INTO bixbey (name, Contact, Email, TypeofProject, BudgetRange,BudgetRangeTo,DataTime, Message)
		 VALUES ('$name', '$Contact', '$Email', '$TypeofProject', '$BudgetRange','$BudgetRangeTo', '$DataTime','$Message')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: index.php');
	}

// ...
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$address = $_POST['address'];

	mysqli_query($db, "UPDATE bixbey SET name='$name', address='$address' WHERE id=$id");
	$_SESSION['message'] = "Address updated!"; 
	header('location: index.php');
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM bixbey WHERE id=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: index.php');
}