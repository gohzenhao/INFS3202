<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once dirname(APPROOT).'/public/vendor/autoload.php';

/**
 * Default and main page controller.
 * Views are located in /views/home/ folder
 */
class Home extends Controller{
	public function __construct(){
		$this->recipesModel = $this->model('RecipesModel');
		$this->userModel = $this->model('UserModel');
	}

	/**
	 * Loads front page of website
	 */
	public function index(){

		$recipe = $this->recipesModel->getAllRecipes();
		$featured = $this->recipesModel->getFeaturedRecipes();
		$ownerid = $recipe[0]->ownerid;
		$owner = $this->userModel->getUser($ownerid);
		$averageRatings = [];
		for ($x = 0; $x < sizeof($featured); $x++) {
			$average = $this->recipesModel->getAverageRating($featured[$x]->rid);
			$averageRatings[$x] = $average;
		}
		$data = [
			'week' => $recipe[0],
			'featured' => $featured,
			'owner' => $owner,
			'average' => $averageRatings
		];

		$this->view('includes/header');
		$this->view('home/index', $data);
		$this->view('includes/footer');
		$this->script('home/waypoint');
		$this->script('snackbar');
	}

	/**
	 * Loads About page, with form for sending email query to admin
	 */
	public function about(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				'subject' => trim($_POST['subject']),
				'body' => trim($_POST['body']),
				'replyTo' => trim($_POST['replyTo']),

				'subject_error' => '',
				'body_error' => '',
				'replyTo_error' => '',
			];
			// Validate input
			if(empty($data['subject'])) {
                $data['subject_error'] = 'Please enter a subject';
			}
			if(empty($data['body'])) {
                $data['body_error'] = 'Please enter a message';
			}
			if(empty($data['replyTo'])) {
                $data['replyTo_error'] = 'Please enter your email to reply to';
            } else if (!filter_var($data['replyTo'], FILTER_VALIDATE_EMAIL)) {
				$data['replyTo_error'] = 'Please enter a valid email';
			}
			// If no errors then send email
			if (empty($data['subject_error']) && empty($data['body_error']) && empty($data['replyTo_error'])) {
				$result = $this->sendMail($data['subject'], $data['body'], $data['replyTo'] );
				if ($result) {
					flash('email_success', 'Your enquiry has been successfully sent');
				}
			}
		} else {
			$data = [
				'subject' => '',
				'body' => '',
				'replyTo' => '',

				'subject_error' => '',
				'body_error' => '',
				'replyTo_error' => '',
			];
		}

		$this->view('includes/header');
		$this->view('home/about', $data);
		$this->view('includes/footer');
	}

	/**
	 * Send email email using mailhub.eait.uq.edu.au as relay host
	 *
	 * NOTE: only works when sent from uq zone
	 *
	 * @param subject
	 * @param message/body
	 * @param replyTo
	 *
	 * @return
	 */
	private function sendMail($subject, $body, $replyTo) {
		$mail = new PHPMailer(true);
		try {
			// Setup server settings
			//$mail->SMTPDebug = 2;
			$mail->isSMTP();
			$mail->Host = 'mailhub.eait.uq.edu.au';
			$mail->SMTPSecure = 'tls';
			$mail->Port = 25;

			// Set recipients
			$mail->setFrom('noreply@its.uq.edu.au', 'TheRecipesProject');
			$mail->addAddress('yuliang.zhou@uqconnect.edu.au', 'Admin');
			$mail->addReplyTo($replyTo, 'Anonymous User');

			// Content
			$mail->isHTML(true);
			$mail->Subject = 'Enquiry: '.$subject;
			$mail->Body = 'Enquiry Message below: <hr/></br>'.$body.'</br><hr/>From: Anonymous User';

			$mail->send();
			return true;
		} catch (Exception $e) {
			echo 'Message could not be sent: ', $mail->ErrorInfo;
			return true;
		}
	}

}
