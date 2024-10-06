<?php

    if(isset($_GET['campaignId'])) {
        $campaignId = $_GET['campaignId'];
        // echo $campaignId;
    } else {
        header("Location: campaigns.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fund Raiser | Raise Fund At An Ease</title>
    <link rel="stylesheet" href="assets/css/donate.css">

    
</head>
<body>

    <!-- navigation section -->
    <div class="nav-bar">
        <a href="index.php">
            <img src="assets/images/logo.png" alt="Fund Raiser logo">
        </a>
         
        <div class="nav-links">
            <a href="campaigns.php">CAMPAIGNS</a>
            <a href="donors.php">DONORS</a>
        </div>

        <div class="btn-login-signup">
            <button type="submit" id="btn-login" onclick="window.location.href='login.php'">LOGIN</button>
            <button type="submit" id="btn-signup" onclick="window.location.href='signup.php'">SIGN UP</button>
        </div>
    </div>

    <!-- body part -->
    <div class="main-container">
        <br>
        <h1>Donate via Bank | UPI App</h1>

        <div class="bank-details">
            <h2>You can donate in this campaign via Bank Transfer. The Bank details are below:</h2><hr>
                <div class="banks">
                    <table>
                        <tr>
                            <th colspan="3">Central Bank Of India</th>
                            
                        </tr>
                        <tr>
                            <td>Account Holder</td>
                            <td>:</td>
                            <td>Krishna Naik</td>
                        </tr>
                        <tr>
                            <td>Account Number</td>
                            <td>:</td>
                            <td>23423434234234324</td>
                        </tr>
                    </table>
                    <br>
                    <table>
                        <tr>
                            <th colspan="3">Central Bank Of India</th>
                            
                        </tr>
                        <tr>
                            <td>Account Holder</td>
                            <td>:</td>
                            <td>Krishna Naik</td>
                        </tr>
                        <tr>
                            <td>Account Number</td>
                            <td>:</td>
                            <td>23423434234234324</td>
                        </tr>
                    </table>
                    <br>
                    <table>
                        <tr>
                            <th colspan="3">Central Bank Of India</th>
                            
                        </tr>
                        <tr>
                            <td>Account Holder</td>
                            <td>:</td>
                            <td>Krishna Naik</td>
                        </tr>
                        <tr>
                            <td>Account Number</td>
                            <td>:</td>
                            <td>23423434234234324</td>
                        </tr>
                    </table>
                </div>
            <br><hr>
            <div class="donor-notice">Subscribe to Fund Raiser, So that we can track your donation and guide you for the donatation process. Once you submit your details, you can submit the proof of the donation that you made. By doing this, you will be listed in our donor list as an donor.
                The proof file can simply be:
                <ul>
                    <li><strong>Bank deposit voucher or receipt</strong> </li>
                    <li><strong>Screenshot of the fund transfer success page(If donated via onine Banking or online payment wallet)</strong></li>
                </ul>
            </div><br><hr>
            <h2>Be in touch with us</h2>
            <div class="donor-form">
                <div class="boxtwo">
                <br><br>
                    <form action="includes/donate.inc.php?campaignId=<?php echo $campaignId;?>" method="POST"  enctype="multipart/form-data">
                    <!-- to-do full name html pattern -->
                        <input type="text" name="fullname" placeholder="Enter full Name" required><br><br>
                        <input type="email" name="email" placeholder="E-mail" required><br><br>
			            <input type="text" name="address" placeholder="Address" required><br><br>
			            <input type="text" name="amount" placeholder="Amount" required><br><br>
                       <!-- <img src="http://localhost/FundRaiser-master/assets/images/g_pay.png" width="150" height="150"><br><br>-->
                        <span id="ssImage">Upload Proof_Image</span> <br>
                        <input type="file" name="ssPhoto" accept="image/*"><br><br>
                        <input type="submit" name="submit" value="Subscribe" id="submit">
                    </form>
<br>
<br>
                     
<button type="button" class="btn btn-primary buynow" style="padding: 10px 55px; background-color: powderblue; border-radius: 20px;">
    <img src="http://localhost/FundRaiser-master/assets/images/razorpay.svg" alt="Razorpay" style="width: 240px; height: 20px; margin-right: 10px;">
   
</button>










                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
       
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

$(".buynow").click(function()
{

var amount=$('#amount').val();	
var productid=$(this).attr('fullname');	
var productname=$(this).attr('email');	

//var amountInPaise = amount * 100;
	
var options = {
    "key": "rzp_test_bpH90GERGGWtB1", // Enter the Key ID generated from the Dashboard
    "amount":"5000" , // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "name": "FUND_RAISER",
    "description": productname,
    "image": "http://localhost/FundRaiser-master/assets/images/logo.png",
    "handler": function (response){
        var paymentid=response.razorpay_payment_id;
		
		$.ajax({
			url:"payment-process.php",
			type:"POST",
			data:{product_id:productid,payment_id:paymentid},
			success:function(finalresponse)
			{
				if(finalresponse=='done')
				{
					window.location.href="http://localhost/FundRaiser-master/payment-success.php";
				}
				else 
				{
					alert('Please check console.log to find error');
					console.log(finalresponse);
				}
			}
		})
        
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
 rzp1.open();
 e.preventDefault();
});
</script>
    <br>
    <br>
    <br>
   
    <br>
    
    <br> <br>
<br>
<br>
<br>
<br>
<br>
<br>
    <hr>
    <?php
        include_once 'footer.php';
    ?>
