<?php
    require "../../src/mail/Mailing.php";
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])):
        echo $_POST['name'];

        $name = htmlspecialchars(trim(stripslashes($_POST['name'])));
        $email = htmlspecialchars(trim(stripslashes($_POST['email'])));
        $message = htmlspecialchars(trim(stripslashes($_POST['message'])));

        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $message = filter_var($message, FILTER_SANITIZE_STRING);

        $mailing = new Mailing($email, $name, $message);
        $mailing->config();
        $mailing->set_params("SimpBuild");
        if($mailing->send_mail()):
            echo "done";
        else:
            echo "failed";
        endif;

    endif;
?>