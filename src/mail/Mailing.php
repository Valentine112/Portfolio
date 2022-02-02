<?php
    
    require '../../vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    //use PHPMailer\PHPMailer\Exception;

    class Mailing extends PHPMailer{

        public function __construct(string $email, string $full_name, string $message) {
            //Instantiation and passing 'true' enables exceptions
            parent::__construct(false);

            $this->email = (string) $email;
            $this->full_name = (string) $full_name;
            $this->message = (string) $message;
        }

        public function config() {
            $gmail_id = "developer@simpbuild.com";
            $gmail_pass = "Anthonyval1";
            //Server settings
            $this->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $this->isSMTP();                                            // Send using SMTP
            $this->CharSet = "utf-8";
            $this->Host       = 'simpbuild.com';                    // Set the SMTP server to send through
            $this->SMTPAuth   = true;                                   // Enable SMTP authentication
            $this->Username   = $gmail_id;                     // SMTP username
            $this->Password   = $gmail_pass;                               // SMTP password
            $this->SMTPSecure = 'TLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $this->Port       =  587;                                    // TCP port to connect to
            $this->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
        }

        public function set_params(string $subject) {
            //Recipients
            $this->setFrom($this->email, $this->full_name);
            $this->addAddress('valentinethedeveloper@gmail.com', "Ngene Valentine");     // Add a recipient

            $this->isHTML(true);                                  // Set email format to HTML
            $this->Subject = $subject;

            $path = './../user/mail-text.html';
            $message = file_get_contents(dirname('portfolio').$path);

            $message = str_replace('%name%', $this->full_name, $message);
            $message = str_replace('%email%', $this->email, $message);
            $message = str_replace('%message%', $this->message, $message);

            $this->msgHTML($message);
            
            $this->AltBody = $this->message;
       
        }

        public function send_mail() : bool {
            return $this->send();
        }
    }
?>