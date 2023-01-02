<?php require_once('header.php'); ?>
                <img src="../images/contact.jpg"> 
            </header>
            <div class="container">
                    <?php
			
			//Check for header injection
			
			function has_header_injection($str){
				return preg_match( "/[\r\n]/", $str);
			}
			
			if (isset ($_POST['contact_submit'])){
				
                $name = trim($_POST['name']);
                $subject = trim($_POST['subject']);
                $number = trim($_POST['number']);
				$email = trim($_POST['email']);
				$msg = $_POST['message'];
				
				//Check to see if $name or $email have header incjections
				
			if (has_header_injection($name) || has_header_injection($email)) {
				die();  //if true, kill the script
				}
				
				if (!$name || !$email || !$subject || !$number || !$msg){
					echo '<h4 class="error">All field required.</h4><a href="contact.php" class="button block">Go back and try again</a>';
					exit;
					
				}
				
				//add the recipient email to a variable. put YOUR email here!
				$to = $email;
				
				// Create a subject
				$topic = "$name sent you a message via your contact form";
				
				//construct the message
				$message = "Name: $name\r\n";
                $message .= "Email: $email\r\n";
                $message .= "Number: $number\r\n";
                $message .= "Subject: $subject\r\n";
				$message .= "Message:\r\n$msg";
								
				//If the subscibe checkbox was checked
				if (isset($_POST['subscribe']) && $_POST['subscribe'] == 'Subscribe'){
					
					//Add a new line to the $message
					$message .= "\r\n\r\nPlease add $email to the mailing list.\r\n";
					
				}
				
				$message = wordwrap($message,72);
				
				//Set the mail headers into a variable
				
				$headers = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
				$headers .= "From: $name <$email> \r\n";
				$headers .= "X-Priority: 1\r\n";
				$headers .= "X-MSMail-Priority: High\r\n\r\n";
				
				//Send the email
				mail($to, $topic, $message, $headers);
					
		?>
		
		<!-- Show success message after email has sent -->
		
		<h5>Thanks for contacting us!</h5>
		<p>Please allow 24 hours for a response.</p>
		<p><a href="contact.php" class="button block">&laquo; Go to Home Page</a></p>
		<?php 
			} else {
        ?>
        <!-- contact classes -->
            <h1> Contact Us </h1>
            <h2><div> Send us a message and we will get back to you as soon as we can </div></h2>
                <div id="contact">
                    <div class="contactBox">
                    <form method="post" action="" id="contact-form">
                        <div class="w3-row">
                            <div class="w3-half">
                                <input type="text" name="name" id="name" placeholder="Name">
                            </div><!-- end w3-half -->
                            <div class="w3-half">
                                <input type="text" name="subject" id="subject" placeholder="Subject">
                            </div><!-- end w3-half -->
                        </div><!-- end w3-row -->
                        <div class="w3-row">
                            <div class="w3-half">       
                                <input type="text" name="number" id="number"  placeholder="Phone Number">
                                </div><!-- end w3-half -->
                            <div class="w3-half">
                                <input type="text" name="email" id="email"  placeholder="Email Address">
                            </div><!-- end w3-half -->
                        </div><!-- end w3-row -->
                    <h2> Message </h2>
                            <textarea name="message" id="message" placeholder=""></textarea>
                            <div class="w3-row" style="margin-top: 20px;">
                            <div class="w3-half">
                                <input type="checkbox" id="subscribe" name="subscribe" value="Subscribe">
                                <label for="subscribe">Subscribe to our newsletter</label>
                            </div><!-- end w3-half -->
                            <div class="w3-half">
                                <input type="submit" class="button next" name="contact_submit" value="Send Message">
                            </div><!-- end w3-half -->
                        </div><!-- end w3-row -->
                    </form><!-- end form -->
                    <?php  } ?>
                    </div><!-- end contactBox -->
                </div><!-- end contact -->
        <!-- end contact classes -->
        </div>
<?php require_once('footer.php'); ?>