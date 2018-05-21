<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once dirname(APPROOT).'/public/vendor/autoload.php';

/**
 * Default and main page controller.
 * Views are located in /views/home/ folder
 */
class Home extends Controller{
	/**
	 * TODO: load latest 6 (by creation time) recipes into featured
	 */
	public function __construct(){

		$this->recipesModel = $this->model('RecipesModel');
		$this->userModel = $this->model('UserModel');
	}

	/**
	 * Loads front page of website
	 */
	public function index(){

		$featured = $this->recipesModel->getFeaturedRecipes();
		$ownerid = $featured[0]->ownerid;
		$owner = $this->userModel->getUser($ownerid);
		$data = [
			'title' => 'Links for development purposes only...',
			'featured' => $featured,
			'owner' => $owner
		];

		$this->view('includes/header');
		$this->view('home/index', $data);
		$this->view('includes/footer');
		$this->script('home/rating');
	}

	/**
	 * Loads an abot page
	 */
	public function about(){
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->sendMail($_POST['subject'], $_POST['body']);
			$data = ['title' => 'POSTed'];
		} else {
			$data = ['title' => 'Welcome to the About page! Test email'];
		}

		$this->view('includes/header');
		$this->view('home/about', $data);
		$this->view('includes/footer');
	}

	/**
	 * Send email email using mailhub.eait.uq.edu.au as relay host
	 *
	 * TODO: stylize email content and change address
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
