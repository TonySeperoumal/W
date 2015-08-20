<?php


	namespace Controller;

	use \W\Controller\Controller;
	use \Manager\UserManager;
	

	class UserController extends Controller
	{
		public function register()
		{
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

				
				if (!filter_var($email, FILTER_VALIDATE_EMAIL))
				{
					$error = "Email non valide !";
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
			$authentificationManager = new \W\Security\AuthentificationManager;
			$username = "";
			$password = "";
			$error = "";

			if (!empty($_POST))
			{
				foreach ($_POST as $k -> $v)
				{
					$$k = trim(strip_tags($v));
				}

				if (empty($username))
				{
					$error = "Indiquez votre identifiant !";
				}

				if (empty($password))
				{
					$error = "Indiquez votre mot de passe !";
				}

				if (empty($error))
				{

					$authentificationManager -> isValidLoginInfo($user);
				}


			}
			
		}
	}