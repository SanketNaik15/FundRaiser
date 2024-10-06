<?php
	if(!isset($_POST['review'])) {
		header("Location: manageDonors.php");
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Review Events</title>
	<link rel="stylesheet" type="text/css" href="assets/css/reviewDonors.css">
</head>
<body>
	<?php 
	include 'dashboard.html';
	  ?>
	  <?php
       $conn=mysqli_connect("localhost","root","","FundRaiser");	  
       ?>
	  <?php
	  if (isset($_POST['review'])) {
	  	$id =$_POST['id'];
	  }
	  ?>
	  <?php
	 
	  $sql1="SELECT * FROM donors,ss_receipt
                        WHERE donors.donor_id = '$id';";

                        //AND donors.campaign_id = ss_receipt.campaign_id ;";
      $result1=mysqli_query($conn,$sql1); 
	

	  
	  ?>
	<div class="titleDiv">
		<h3 class='titleOftable'>Review Campaign</h3>
	</div>	
		<div class="review-section">
		<?php
		while($row= mysqli_fetch_assoc($result1))
          {
          	?>
				<form method="POST" action="includes/reviewDonorAction.php">
			    <label class="label">Donor Name:</label><br>
			    <input type="text" name="donorName" value="<?php echo $row['donor_name'];?>"><br><br>
               
                <label class="label">Donated Amount<br></label>
                <input type="text" min="1" name="donatedAmount" value="<?php echo $row['donor_amount'];?>"><br><br>
                <label class="label">Campaign Name:<br></label>
                <input type="text" name="campaignName" value="<?php 
               				$c_id = $row['campaign_id'];
                            $sql1 = "SELECT campaign_name,campaign_id FROM campaigns
                            WHERE campaign_id = '$c_id';";
                            $result1 = mysqli_query($conn, $sql1);
                            $row1 = mysqli_fetch_assoc($result1);
                            $c_name = $row1['campaign_name'];

                            echo $c_name;
						
                            ?>"><br><br>
                <label class="label">Address:<br></label>
                <input type="text" name="dAddress"  value="<?php echo $row['donor_address'];?>" ><br><br>
                <input type="hidden" name="id" value="<?php echo $row['donor_id'];?>">
                <center>
                	<input type="submit" name="accept" value="Accept">
                    <input type="submit" name="delete" value="Delete">
				</center>
				<?php

$sname= "SELECT ss_receipt.ssImage FROM ss_receipt,donors WHERE donors.donor_email = ss_receipt.email_id AND donors.donor_id='$id';";
$result2 = mysqli_query	($conn, $sname);
if ($result2) {
    // Fetch the result
    if ($row3 = mysqli_fetch_assoc($result2)) {
        // Output the ssImage
        //echo "ssImage: " . $row3['ssImage'];
    } else {
        // Handle case where no result is found
        echo "No result found";
    }
} else {
    // Handle query error
    echo "Query failed: " . mysqli_error($conn);
}
//$row3 = mysqli_fetch_one($result2);
//$s_name = $row3['ssImage'];

function convertToLocalhostURL($localPath) {
    // Replace backslashes with forward slashes
    $localPath = str_replace('\\', '/', $localPath);
    
    // Get the path relative to htdocs
    $relativePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $localPath);
    
    // Replace any backslashes with forward slashes again
    $relativePath = str_replace('\\', '/', $relativePath);
    
    // Build and return the localhost URL
    $localhostURL = 'http://' . $_SERVER['HTTP_HOST'] . $relativePath;
    return $localhostURL;
}

?>
    
				<div class="imgclass"><img src='<?php echo convertToLocalhostURL( $row3['ssImage']);?>' style="width: 300px; height: 300px;"></div>
		</form>
		<?php
	   }
	?>
	</div>
</body>
</html>