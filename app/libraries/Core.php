<?php
	/*
	 * App Core Class
	 * Creates URL & loads core controller
	 * URL format: /controller/method/params
	 */

	class Core {
		protected $currentController = 'Pages';
		protected $currentMethod = 'index';
		protected $params = [];

		public function __construct(){
			$url = $this->getUrl();

			// check if the first item in the array is a controller that exists
			if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
				$this->currentController = ucwords($url[0]);
				unset($url[0]);
			}
			// require and instantiate the controller
			require_once '../app/controllers/' . $this->currentController . '.php';
			$this->currentController = new $this->currentController;
		}

		public function getUrl(){
			if(isset($_GET['url'])){
				$url = rtrim($_GET['url'], '/');
				$url = filter_var($url, FILTER_SANITIZE_URL);
				$url = explode('/', $url);
				return $url;
			}
		}
	}