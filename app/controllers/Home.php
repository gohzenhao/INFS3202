<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//require_once $_SERVER['DOCUMENT_ROOT'].'/infs3202project/public/vendor/autoload.php';
require_once dirname(APPROOT).'/public/vendor/autoload.php';

	/**
	 * Default and main page controller.
	 * Views are located in /views/home/ folder
	 */
	class Home extends Controller{
		public function __construct(){
			//TODO: add model
		}

		/**
		 * Loads front page of website
		 */
		public function index(){
			$data = ['title' => 'Links for development purposes only...'];
			$this->view('home/index', $data);
		}

		/**
		 * Loads an abot page
		 */
		public function about(){
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				
				$this->sendMail($_POST['subject'], $_POST['body']);

				$data = ['title' => 'POSTed'];
				$this->view('home/about', $data);
			} else {
				$data = ['title' => 'Welcome to the About page! Test email'];
				$this->view('home/about', $data);
			}
		}

		/**
		 * TODO: send mail
		 * 
		 * NOTE: only works when sent from uq zone
		 */
		private function sendMail($subject, $body) {
			$mail = new PHPMailer(true);
			try {
				// Setup server settings
				$mail->SMTPDebug = 2;                                 
			    $mail->isSMTP();              
			    $mail->Host = 'mailhub.eait.uq.edu.au';
			    $mail->SMTPSecure = 'tls';
    			$mail->Port = 25;

    			// Set recipients
    			$mail->setFrom('noreply@its.uq.edu.au', 'TheRecipesProject');
    			$mail->addAddress('yuliang.zhou@uqconnect.edu.au', 'Test User');
    			$mail->addReplyTo('info@example.com', 'Information');

				// Content
				$mail->isHTML(true);
    			$mail->Subject = $subject;
    			$mail->Body = 'This is the HTML message body <b>'.$body.'</b>';

    			$mail->send();
    			echo 'Message has been sent';
			} catch (Exception $e) {
				echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			}
		}
		
	}