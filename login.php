<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password) && !is_numeric($email))
		{

			//read from database
			$query = "select * from person where email = '$email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['id'] = $user_data['pid'];

						if($user_data['usertype'] == 's'){
							header("Location: index.php");
						}
						else{
							header("Location: jobposted.php");
						}
						die;
					}
				}
			}
			
			echo "wrong email or password!";
		}else
		{
			echo "wrong email or password!";
		}
	}

?>


