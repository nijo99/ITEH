<?php 
include_once("user.inc.php");
echo("Ubacivanje usera");

class InsertUser {
	
	private $errors = array();

	public function signup($POST){
		$User= new User();
		$datas= $User->getAllUsers();
		//validate
		foreach ($POST as $key => $value) {
			# code...

			//username
			if($key == "username"){

				if(trim($value) == ""){

					$this->errors[] = "Please enter a valid username";
				}

				if(is_numeric($value)){

					$this->errors[] = "Username can not be a number";
				}

				if(preg_match("/[0-9]+/", $value)){

					$this->errors[] = "Username can not contain numbers";
				}
				
			}

			//email
			if($key == "email"){

				if(trim($value) == ""){

					$this->errors[] = "Please enter a valid email";
				}

				if(!filter_var($value,FILTER_VALIDATE_EMAIL)){

					$this->errors[] = "Email is not valid";
				}
			}

			//password
			if($key == "password"){

				//check if its empty
				if(trim($value) == ""){

					$this->errors[] = "Please enter a valid password";
				}

				//password length
				if(strlen($value) < 4){

					$this->errors[] = "Password must be atleast 4 characters long";
				}
				
			}
   		

			if($User->exist($key, $value)!=false){
				$this->errors[] = $User->exist($key, $value);
	
			}
		}

		


		//save to database
		if(count($this->errors) == 0){

			//save
			

			$username = $POST['username'];
			$email = $POST['email'];
			$password = $POST['password'];
			$query = "INSERT INTO users (firstName,email,password) VALUES ('$username','$email','$password')";

			$result = $User->write($query);
			if(!$result){
				$this->errors[] = "Your data could not be saved";
			}
		}

		return $this->errors;
	}
}








?>