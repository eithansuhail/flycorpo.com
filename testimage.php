<?php 

include("functions.php");




?>


<html>
<head>
<title>HTML email</title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<body>

<a href="https://www.thesitewizard.com/" rel="noopener noreferrer" target="_blank">thesitewizard.com</a>
<p>This email contains HTML Tags!</p>



<script type="text/javascript">
$(document).ready(function() {
    $("#dealbtn").click(function() {
        var email = $("#emaildeals").val();
        $.ajax({
            type: "GET",
            url: "senddeals.php",
            data: { emaildeals: email }
        }).done(function(data) {
            $("#responsedeals").html(data);
        });
    });
});


</script>

<h4 class='text-center text-success' id="responsedeals"></h4>
    



        <section class="travel-deal-blk">
                    <div class="container">
                        <div class="travel-deal-in" style="background-color: #ff9500 ; ">
                            <h4>Like travel deals? Enter your email and we'll send them your way.</h4>
                            <div class="subscription-blk">
                                <!--<form method="get">-->
                                    <div class="mail-blk">
                                        <span class="cust-form"><input type="email" class="form-control email-box" id="emaildeals" placeholder="Email"></span>
                                        <button id="dealbtn" class="btn btn-proceed">SEND ME DEALS</button>
                                    </div>
                                <!--</form>-->
                                <p>Your privacy is important to us, so we'll never spam you or share your info with third parties.<br>Take a look at our privacy policy.</p>
                            </div>
                        </div>
                    </div>
                </section>
</body>
</html>