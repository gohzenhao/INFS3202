<?php
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
			$data = ['title' => 'Welcome to the About page!'];
			$this->view('home/about', $data);
		}

		
	}