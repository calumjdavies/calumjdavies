<?php
// Check for empty fields


$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['_replyto']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
require 'PHPMailerAutoload.php';

// Load Composer's autoloader

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = false;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.schuller.com.au';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'contact@schuller.com.au';                     // SMTP username
    $mail->Password   = '3$ZQ&Dg$EtH';                               // SMTP password
    $mail->SMTPSecure = 'tls';//PHPMailer::ENCRYPTION_STARTTLS; Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('contact@schuller.com.au', 'Website Message');
    $mail->addAddress('andrew@schuller.com.au');     // Add a recipient
    $mail->addReplyTo($email, $name);
    $mail->addCC('thestudio2@bigpond.com');

    // Attachments
    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $name . " messaged you from your website!";
    $mail->Body    = "Name: " . $name . "<br> <br> Phone Number: " . $phone . "<br><br> Email: " . $email . "<br><br> Message: <br><br>" . $message;

    $mail->send();
    $text = "Thanks, I'll be in touch with you soon.";
} catch (Exception $e) {
  $text = "Sorry, there was an error. Please try again.";

}



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="author" content="" />
        <title>Andrew Schuller</title>
        <!-- Favicon-->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
    </head>

    <script type="text/javascript">

    </script>

    <body id="page-top">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase" id="mainNav">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fas fa-bars"></i>
                    &nbsp;&nbsp;Menu
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Services</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="myModal" class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body py-0">
                <?php
                echo $text;
?>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
              <h2 class="page-section-heading text-center text-uppercase text-white mb-0">Andrew Schuller</h2>

                <p class="masthead-subheading font-weight-light mb-0">Consultancy &nbsp;Services</p>
            </div>
        </header>
        <section class="page-section portfolio" id="portfolio">
            <div class="container" style="max-width: 700px;">
              <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Services</h2>

                <div class="col-10 container d-none d-sm-block" style="">
  <ul class="list-unstyled row" >
    <li class="list-item col-sm-6 border-top py-2"><img class="float-left mr-3" src="assets/img/portfolio/Graphic Design.png">Graphic Design</li>
    <li class="list-item col-sm-6 no-p text-right border-top py-2"><img class="float-right ml-3 mr-0" src="assets/img/portfolio/Photographic Services.png">Photography</li>
    <li class="list-item col-sm-6 border-top py-2"><img class="float-left mr-3" src="assets/img/portfolio/Copywriting.png">Copywriting</li>
    <li class="list-item col-sm-6 no-p text-right border-top py-2"><img class="float-right ml-3 mr-0" src="assets/img/portfolio/Video Editing.png">Video Production</li>


  </ul>
</div>

<div class="col-10 container d-block d-sm-none" style="">
<ul class="list-unstyled row" >
<li class="list-item col-sm-6 border-top py-2"><img class="float-left" src="assets/img/portfolio/Graphic Design.png">Graphic Design</li>
<li class="list-item col-sm-6 border-top py-2"><img class="float-left" src="assets/img/portfolio/Photographic Services.png">Photography</li>
<li class="list-item col-sm-6 border-top py-2"><img class="float-left" src="assets/img/portfolio/Copywriting.png">Copywriting</li>
<li class="list-item col-sm-6 border-top py-2"><img class="float-left" src="assets/img/portfolio/Video Editing.png">Video Production</li>


</ul>
</div>

<div class="modal hide fade" id="myModal">
<div class="modal-header">
<a class="close" data-dismiss="modal">×</a>
<h3>Modal header</h3>
</div>
<div class="modal-body">
<p>One fine body…</p>
</div>
<div class="modal-footer">
<a href="#" class="btn">Close</a>
<a href="#" class="btn btn-primary">Save changes</a>
</div>
</div>
  <p class="lead col-sm-8 offset-sm-2 col-xs-12 text-center mt-4">
    Providing strategic advice and a full range of content creation services.
  </p>
</div>
</div>
            </div>
        </section>

        <section class="page-section bg-primary" id="contact">
            <div class="container">
                <h2 class="page-section-heading text-center text-uppercase text-white mb-0">Contact</h2>

                <div class="row">
                    <div class="col-lg-5 mx-auto bg-white">
                        <form id="contactForm" action="contact_me.php" method="post"name="sentMessage" novalidate="novalidate">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0">
                                    <input class="form-control pt-4" name="name" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0">
                                    <input class="form-control pt-3" name="_replyto" id="email" type="email" placeholder="Email" required="required" data-validation-required-message="Please enter your email address." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0">
                                    <input class="form-control pt-3" name="phone" id="phone" type="tel" placeholder="Phone" required="required" data-validation-required-message="Please enter your phone number." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0">
                                    <textarea class="form-control pt-3" name="message" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <br />
                            <div id="success"></div>
                            <div class="form-group"><button class="btn btn-primary btn-xl btn-block" id="sendMessageButton" type="submit">Send</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright © Andrew Schuller | 2020</small></div>
        </div>
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>


        <!-- <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script> -->
        <script src="js/scripts.js"></script>
    </body>
</html>
