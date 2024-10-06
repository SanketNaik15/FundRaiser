<?php
$conn=mysqli_connect("localhost","root","","FundRaiser");
?>
<?php


if (isset($_POST['accept'])) {
	  	$id = $_POST['id'];
	  	$row=$id;
	  	$donorName=$_POST['donorName'];
	  	$donatedAmount=$_POST['donatedAmount'];
	  	$campaignName=$_POST['campaignName'];
	  	$donorAddress=$_POST['dAddress'];
	  	$approval=1;
	  
	  	
		//$sql2= "UPDATE ss_receipt SET 'admin_approval'=1 WHERE 'email_id'='$id'"
		//$result2=mysqli_query($conn,$sql2)
		$sql1 = "SELECT donor_email FROM donors
		WHERE donor_id = '$id';";
		$result1 = mysqli_query($conn, $sql1);
		$row1 = mysqli_fetch_assoc($result1);
		$email_id= $row1['donor_email'];
		
	  	$sql="UPDATE ss_receipt SET `admin_approval`= 1  WHERE email_id ='$email_id';";
		  //$sql="UPDATE donors,ss_receipt,campaigns SET `donor_name`='$donorName',`donor_amount`='$donatedAmount',`campaign_name`='$campaignName',`donor_address`='$donorAddress', `admin_approval`='$approval'   WHERE 'donor_id'='$email_id'";
		  
	  	$result1=mysqli_query($conn,$sql);
	  	if($result1)
	  	{
	  		echo $email_id;
	  		header("Location: ../successMessage1.php?message=accept");
	  		
	  	}

	  }
	  ?>
	  <?php
	  if (isset($_POST['delete'])) {
	  	$id =$_POST['id'];
	  	echo $id;
	  	$row=$id;
	  	$campaignName=$_POST['campaignName'];
	  	echo $campaignName;

	  	$sql="DELETE FROM `donors` WHERE donor_id =$id ";
	  	$result1=mysqli_query($conn,$sql);
	  	header("Location: ../successMessage1.php?message1=delete");

	  }

	  ?>
	  
	  