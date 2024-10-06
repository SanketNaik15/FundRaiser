<?php
// Include database connection or any necessary files
include 'dbh.inc.php';

// Dummy database connection for demonstration
//$conn = mysqli_connect("localhost", "username", "password", "database_name");


// Check if form is submitted
if(isset($_POST['submit'])) {
    // Process form submission

    // Retrieve form data
    $amount = $_POST['amount'];
    $address = $_POST['address'];

    // Save uploaded image
    $targetDir = "uploads/";
    $fileName = basename($_FILES["screenshot"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["screenshot"]["tmp_name"], $targetFilePath)){
            // Insert donation proof details into database
            //"INSERT INTO donationproof(donor_id, campaign_id, donate_amount, donor_address, proof_image) VALUES($donorId, $campaignId, $donatedAmount, '$address','$proofImagePath');";
            $sql = "INSERT INTO donationproof (amount, address, screenshot_image) 
                    VALUES ('$amount', '$address', '$targetFilePath')";
            if(mysqli_query($conn, $sql)){
                echo "Donation proof added successfully.";
            } else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else{
            echo "Error uploading file.";
        }
    } else{
        echo "Invalid file format.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Donation Proof</title>
</head>
<body>
    <h1>Submit Donation Proof</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" required><br><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>
        <label for="qrCodeImage">QR Code Image:</label><br>
        <img src="assets/images/QRcode.png" alt="QR Code"><br><br>
        <label for="screenshot">Screenshot Image:</label>
        <input type="file" id="screenshot" name="screenshot" required><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
