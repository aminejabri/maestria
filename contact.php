<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $message_name = $_POST["message-name"];
    $message_email = $_POST["message-email"];
    $message_text = $_POST["your-message"];

    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    $mail->IsHTML(true);
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 2;
    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6
    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;
    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls';
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "maestria.association@gmail.com";
    //Password to use for SMTP authentication
    $mail->Password = "maestria123";
    //Set who the message is to be sent from
    $mail->setFrom('maestria.association@gmail.com', 'Site De Maestria');
    //Set who the message is to be sent to
    $mail->addAddress('francis.tropini@sfr.fr', 'Francis TROPINI');
    //Set the subject line
    $mail->Subject = "Message de ". $message_name .", visiteur de association-maestria.com";

    $mail->Body = "<h1>Nom = ". $message_name ." </h1> <h1>Email = ". $message_email ." </h1> <p>".$message_text."</p>";
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    //Replace the plain text body with one created manually
    $mail->AltBody = 'This is a plain-text message body';
    //Attach an image file
    //send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
        //Section 2: IMAP
        //Uncomment these to save your message in the 'Sent Mail' folder.
        #if (save_mail($mail)) {
        #    echo "Message saved!";
        #}
    }
    //Section 2: IMAP
    //IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
    //Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
    //You can use imap_getmailboxes($imapStream, '/imap/ssl', '*' ) to get a list of available folders or labels, this can
    //be useful if you are trying to get this working on a non-Gmail IMAP server.
}
else  {


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="Poca - Podcast &amp; Audio Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Association - Maestria</title>
    <!-- Favicon -->
    <link rel="icon" href="./img/bg-img/icone.jpg">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header class="header-area2">
      <div class="main-header-area sticky sticky2">
        <div class="classy-nav-container breakpoint-off">
          <nav class="classy-navbar justify-content-between" >
            <div class="classy-menu">
              <div class="classynav">
                <ul >
                  <li ><a href="./index.html"><i class="fa fa-home"></i> ACCUEIL</a></li>
                </ul>
              </div>
            </div>
            <div class="classy-menu">
              <div class="classynav">
                <ul id="nav">
                  <li ><a href="./trio-tosca-et-nous.html">TRIO TOSCA Et NOUS</a></li>
                  <li ><a href="./quatuor-de-clarinet.html">QUATUOR DE CLARINETTES SIB&LA</a></li>
                  <li ><a href="concerts.html">ARCHIVES MAESTRIA</a></li>
                  <li ><a href="enregistrement.html">ENREGISTREMENT FRANCIS TROPINI</a></li>
                  <li class="current-item"><a href="contact.html">CONTACT</a></li>
                </ul>
              </div>
              <!-- Nav End -->
            </div>
          </nav>
        </div>
      </div>
    </header>

    <!-- ***** Contact form ***** -->
    <section class="welcome-area mt-80">
      <!-- Welcome Slides -->
      <!-- Single Welcome Slide -->
      <div style="background-image: url(img/bg-img/15.jpg); background-size: 100%; background-position:right 80px;">
        <div class="container">
          <div class="row align-items-center">
            <!-- Newsletter Content -->
            <!-- Newsletter Form -->
            <div class="col-12">
              <div class="contact-form ">
                <!-- Form -->
                <form id="fr1">
                  <h2><br> <br><br> </h2>
                  <div class="row">
                    <div class="col-12">
                      <div class="contact-information">
                        <h2 class=" font-MTCors  " >Francis Tropini </h2  >
                        <h2 class=" font-MTCors  " >Téléphone : +33 6 11 66 98 97 | e-mail : francis.tropini@sfr.fr  </h2  >
                        <h5> </h5>
                      </div>
                    </div>
                    <h2> <br><br></h2>

                    <h2  class="font-center font-MTCors " >POUR… nous encourager, nous donner votre avis, organiser un concert, une animation n'hésitez pas à nous contacter.</h2>
                    <div class="col-12">
                      <div class="col-12">
                        <input type="text" id="name" name="message-name" class="form-control mb-30" placeholder="Votre nom">
                      </div>
                      <div class="col-12">
                        <input type="email" id="email" name="message-email" class="form-control mb-30" placeholder="Votre Email">
                      </div>
                      <div class="col-12">
                        <textarea name="message" id="message" class="form-control mb-30" placeholder="Votre Message"></textarea>
                      </div>
                      <div class="col-12">
                        <button type="button" id="contact-submit" class=" poca-btn mb-30">Envoyer</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- ******* All JS ******* -->
    <!-- jQuery js -->
    <script src="js/jquery.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js -->
    <script src="js/poca.bundle.js"></script>
    <!-- Active js -->
    <script src="js/default-assets/active.js"></script>
    <!-- for fonts-->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>

    <script>
        $(document).ready(function(){

            $("#contact-submit").click(function(){

                $.post(
                    'contact.php', // Un script PHP que l'on va créer juste après
                    {
                        'message-name': $("#name").val(),
                        'message-email': $("#email").val(),
                        'your-message': $("#message").val()
                    },

                    function(data){
                        alert("Message envoyer avec Success");
                    },

                    'text' // Nous souhaitons recevoir "Success" ou "Failed", donc on indique text !
                );

            });

        });
    </script>


    <script>
        WebFont.load({
            google: {
                families: ["Cookie:regular"]
            }
        });
    </script>
  </body>
</html>
<?php
}
?>