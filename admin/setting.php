<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fund Raiser | Raise Fund At An Ease</title>
    <link rel="stylesheet" href="setting.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Philosopher" rel="stylesheet">
</head>

<body>
	<?php
	include 'dashboard.html';

	// Database connection
	$conn = mysqli_connect("localhost","root","","FundRaiser");
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	// Fetching data from the database
	$sql = "SELECT * FROM adminlogin;";
	$result = mysqli_query($conn , $sql);
	$data1 = mysqli_fetch_assoc($result); // Assuming data1 contains admin login details

	// Fetching organizer data from the database
	$sql_organizer = "SELECT * FROM organizers;";
	$result_organizer = mysqli_query($conn , $sql_organizer);
	$data2 = mysqli_fetch_assoc($result_organizer); // Assuming data2 contains organizer details

	?>

    <!-- navigation section -->
    
    <div class="main-container">
            <div class="about">
                <h1>Manage Account</h1>
                <table>
                    <tr>
                        <td>Admin UserName</td>
                        <td>:</td>
                        <td><?php echo $data1['admin_username'];?></td>
                    </tr>
                    <tr>
                        <td>Organizer UserName</td>
                        <td>:</td>
                        <td><?php echo $data2['organizer_username'];?></td>
                    </tr>
                    <tr>
                        <td>E-Mail</td>
                        <td>:</td>
                        <td><?php echo $data2['organizer_email'];?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td><?php echo $data2['organizer_phone'];?></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center;">
                        <button id="setting" onclick="window.location.href='http://localhost/FundRaiser-master/organizerProfile.php'">Setting</button>
                        </td>
                    </tr>
                </table>
            </div>
</body>
</html>
