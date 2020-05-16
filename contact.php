<?php require_once("config.php"); ?>
<?php require_once("includes/header.php"); ?>
<?php require_once("includes/nav.php"); ?>

<section id="content">
<div class="content-blog">
<div class="container">
<div class="row">
<div class="col-md-12">
    <div class="box">
        <div class="box-header">
            <center>
                <h2>Contact Us</h2>
                <p class="text-muted">If you have any questions, feel free to contact us our customer service center is working for you 24/7.</p>
            </center>
        </div><!--Box header Ends -->

        <form action="contact.php" method="post">
            <div class="form-group">
            <label>Name:  </label>
            <input type="text" class="form-control" name="name" required>
            </div>

            <div class="form-group">
                <label for="">Email: </label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="form-group">
                <label>Subject: </label>
                <input type="text" class="form-control" name="subject" required>
            </div>

            <div class="form-group">
                <label>Message: </label>
                <textarea  cols="3" name="message" class="form-control"></textarea> 
            </div>

            <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary">
                <i class="fas fa-user-md"></i> Send Message
            </button>
            </div>
        </form>

        <?php
        
        if(isset($_POST['submit'])) {

            //Admin receives email through this code
            $sender_name = $_POST['name'];
            $sender_email = $_POST['email'];
            $sender_subject = $_POST['subject'];
            $sender_message = $_POST['message'];

            $receiver_email = "iradisavljevic168@gmail.com";

            mail($receiver_email,$sender_name,$sender_email,$sender_subject,$sender_message);

            //Send email to sender through this code //

            $email = $_POST['email'];
            $subject = "Welcome to my website";
            $message = "I shall get you soon, thanks for sending us email";
            $from = "iradisavljevic168@gmail.com";

            mail($email,$subject,$message,$from);

            echo "<h2 align='center'>Your message has been sent successfully</h2>";
        
        
        }
        
        ?>
    </div>
</div>
</div>
</div>
</div>   
</section>















<?php require_once("includes/footer.php"); ?>