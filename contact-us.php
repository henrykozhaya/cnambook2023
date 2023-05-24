<?php require_once 'includes/contact-us.inc.php'?>
<h1>Contact Us</h1>
<div class="form_container">
    <form action="#" method="post">
        <div class="input_container">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" required value="">
        </div>
        <div class="input_container">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" required value="">
        </div>
        <div class="input_container">
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" required value="">
        </div>
        <div class="input_container">
        <label for="mobile_number">Mobile Number</label>
        <input type="text" name="mobile_number" id="mobile_number" required value="">
        </div>
        <div class="input_container">
        <label for="message">Message</label>
        <br>
        <textarea name="message" id="message" style='width:100%;height:100px;'></textarea>
        </div>
        <div class="input_container">
        <input type="submit" name="contactUs" value="Send">
        </div>
    </form>
    <div><?php echo $messageSent?"Your message has been received":"" ?></div>
</div>

</body>
</html>
