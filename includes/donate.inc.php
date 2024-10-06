<?php

if(isset($_GET['campaignId'])) {
    $campaignId = $_GET['campaignId'];
} else {
    header("Location: ../campaigns.php");
    exit();
}

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$address = $_POST['address'];
$amount = $_POST['amount'];
$ssfilename = $_FILES['ssPhoto']['name'];
$sstempname = $_FILES['ssPhoto']['tmp_name'];
$ssfilename = md5($ssfilename.time());
$ssImagePath = 'C:/xampp/htdocs/FundRaiser-master/assets/images/proofImages/'.$ssfilename.'.jpg';
include 'dbh.inc.php';
            
move_uploaded_file($sstempname,$ssImagePath);
 // insert the input value into databas
$sql2 = "INSERT INTO ss_receipt(email_id,campaign_id,donate_amount,ssImage,admin_approval) VALUES('$email','$campaignId','$amount','$ssImagePath',0);";
$insertSuccess = mysqli_query($conn, $sql2);




$sql = "INSERT INTO donors(donor_name, donor_email,donor_address,donor_amount, campaign_id) VALUES('$fullname', '$email','$address','$amount','$campaignId')";
$insertSuccess = mysqli_query($conn, $sql);

if($insertSuccess) {
    // Fetch the donor_id of the newly inserted record
    $donorId = mysqli_insert_id($conn);
    
    // Construct the QR code image URL
    //$qrCodeUrl = "generate_qr_code.php?donorId=$donorId";
    
    // Redirect to a page that displays the QR code
    header("Location: ../assets/html/proof-submission-success.html");
    exit();
} else {
    echo $conn->error;
} 

?>