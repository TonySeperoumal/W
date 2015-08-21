<?php


	namespace Controller;

	use \W\Controller\Controller;
	use \Manager\UserManager;
	use \W\Security\AuthentificationManager;
	
	

	class UserController extends Controller
	{
		public function home()
		{
			$userManager = new UserManager;

			$this->show('home');
		}

		public function register()
		{
			$this->allowTo('admin');

			$userManager = new UserManager;

			$error = "";
			$username = "";
			$email = "";


			if (!empty($_POST))
			{

				foreach($_POST as $k => $v)
				{

					$$k =  trim(strip_tags($v));

				}
					// $username = trim(strip_tags($_POST['username']));
					// $email = trim(strip_tags($_POST['email']));
					// $password = trim(strip_tags($_POST['password']));
					// $confirmPassword = trim(strip_tags($_POST['confirmPassword']));




				
				if (strlen($username) < 4)
				{

					$error = 'Identifiant trop court !';
				}

				if ($userManager->usernameExists($username))
				{
					$error = "Pseudo déjà utilisé !";
				}

				
				if (!filter_var($email, FILTER_VALIDATE_EMAIL))
				{
					$error = "Email non valide !";
				}

				if ($userManager-> emailExists($email))
				{
					$error = "Email déjà utilisé !";
				}			
				
				//mots de passe correspondent
				if ($password != $confirmPassword)
				{

					$error = "les mots de passe ne corresponds pas!";
				}

				//si valide
				if (empty($error))
				{
					$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

					$newAdmin = [
						"username" => $username,
						"email" => $email,
						"password" => $hashedPassword,
						"role" => "admin",
						"dateCreated" => date("Y-m-d H:i:s"),
						"dateModified" => date("Y-m-d H:i:s")
					];

					//inserer en base
					$userManager->insert($newAdmin);
				}
			}

			$dataToPassToTheView = ["error" => $error, "username" => $username, "email" => $email];
			$this->show('users/register_administrator', $dataToPassToTheView);
		}

		public function login()
		{
			$authentificationManager = new AuthentificationManager();

			$username = "";
			$password = "";
			$error = "";
			$data = [];

			if (!empty($_POST))
			{
				$username = $_POST['username'];
				$password = $_POST['password'];

				$result = $authentificationManager->isValidLoginInfo($username, $password);

				if ($result > 0){
					$userId = $result;

					//recupere l'utilisateur
					$userManager = new \Manager\UserManager();
					$user = $userManager->find($userId);

					//connecte l'user
					$authentificationManager->logUserIn($user);

					$this->redirectToRoute('show_all_terms');
				}
				else 
				{
					$error = "Mauvais identifiant !";
				}
			}

			$data['error'] = $error;
			$data['username'] = $username;			

			$this->show('users/login', $data);			
		}

		public function logout()
		{
			$authentificationManager = new AuthentificationManager();
			$authentificationManager->logUserOut();
			$this->redirectToRoute('login');
		}
	}