<?php
	session_start();

	include_once('../includes/db.php');

	if(isset($_SESSION['logged_in']))
	{
		?>

			<html>
					<head>
						<link rel="stylesheet" href="css/style.css">
					</head>
					<body>
						<div class="wrapper">
							<a href="index.php" id="logo">Feestsites.nl CMS | Selecteer een pagina</a>

							<br />

							<ol>
								<li><a href="page-one/index.php">Beheer pagina 1</a></li>
								<li><a href="page-two/index.php">Beheer pagina 2</a></li>
							</ol>

							<a href="logout.php">Log Out</a>
						</div>
					</body>
				</html>


		<?php
	} else
	{
		if(isset($_POST['username'], $_POST['password']))
		{
			$strUsername = $_POST['username'];
			$strPassword = md5($_POST['password']);

			if(empty($strUsername) or empty($strPassword))
			{
				$strError = 'Alle velden zijn vereist!';
			} else {
				$sqlQuery = $db->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");

				$sqlQuery->bindValue(1, $strUsername);
				$sqlQuery->bindValue(2, $strPassword);
				$sqlQuery->execute();

				$arrRows = $sqlQuery->fetchAll();

				$intNumRows = count($arrRows);
				if($intNumRows == 1)
				{
					$_SESSION['logged_in'] = true;

					header('Location: index.php');
					exit();
				} else {
					$strError = 'Incorrect Details';
				}
				
			}
		}
		?>
			<html>
				<head>
				</head>
				<body>
					<div class="container">
							<a href="index.php" id="logo">Feestsites.nl CMS | Log In</a>
	
							<br /><br />
	
							<?php if (isset($strError))
							{ ?>
								<small style="color: #aa0000"><?php echo $strError; ?></small>
								<br /><br />
							<?php } ?>
	
	
	
							<form action="index.php" method="post" autocomplete="off">
							<input type="text" name ="username" placeholder="username"> <br />
							<input type="password" name="password" placeholder="password"> <br />
	
							<input type="submit" value="Log In">
							</form>
	
							<a href="../index.php">&larr; Terug</a>
					</div>
				</body>
			</html>
		<?php
	}
?>