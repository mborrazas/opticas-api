<?php



use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;





$app->get('/mail', function (Request $request, Response $response) {
    try {

        $mail = new PHPMailer\PHPMailer\PHPMailer();

        $mail->SMTPDebug = 3;

        //Set SMTP host name                          
        $mail->Host = "smtp.gmail.com";
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;
        //Provide username and password     
        $mail->Username = "borrazas.trabajo@gmail.com";
        $mail->Password = "Clavered1!";
        //If SMTP requires TLS encryption then set it
        //$mail->SMTPSecure = "tls";                           
        //Set TCP port to connect to 
        $mail->Port = 587;

        $mail->From = "name@gmail.com";
        $mail->FromName = "Full Name";

        $mail->smtpConnect(
            array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            )
        );

        $mail->setFrom('borrazas.trabajo@gmail.com', 'BadgerDating.com');
        $mail->addAddress('borrazas.trabajo@gmail.com');

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Instructions for resetting the password for your account with BadgerDating.com';
        $mail->Body    = "
        <p>Hi,</p>
        <p>            
        Thanks for choosing BadgerDating.com!  We have received a request for a password reset on the account associated with this email address.
        </p>
        <p>
        please disregard this message.
        </p>
        <p>
        If you have any questions about this email, you may contact us at support@badger-dating.com.
        </p>
        <p>
        With regards,
        <br>
        The BadgerDating.com Team
        </p>";
        if (!$mail->send()) {
            var_dump("WTF");
            die;
        }
        $response->getBody()->write("paso");
        return $response;
    } catch (PDOException $e) {
        echo '{"error": {"text"' . $e->getMessage() . '}';
    }
});
