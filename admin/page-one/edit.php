<?php
	session_start();

	include_once('../../includes/db.php');
	include_once('../../includes/article.php');

	$objArticle = new Article;

	if(isset($_SESSION['logged_in']))
	{
		if(isset($_GET['id']))
		{
			$intId = $_GET['id'];
			$sqlQuery = $db->prepare("UPDATE FROM articles WHERE article_id = ?");
			$sqlQuery->bindValue(1, $intId);
			$sqlQuery->execute();

			header('Location: delete.php');
		}
		$objArticles = $objArticle->fetchAll();
		?>

	<html>
		<head>
			<link rel="stylesheet" href="../css/style.css">
			<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		</head>
		<body>
			<div class="wrapper">
				<a href="#" id="logo">Feestsites.nl CMS</a>

				<br />

				<h4>Bewerk een link</h4>

				<form action="delete.php" method="get">
					<select onchange="this.form.submit();" name="id">
						<option> -- Selecteer een artikel -- </option>
						<?php
							foreach ($objArticles as $objArticle)
						{ ?>
								<option value="<?php echo $objArticle['article_id']; ?>">
									<?php echo $objArticle['article_title'];?>
								</option>
						<?php
							}
						?>
					</select>
				</form>

				<a href="index.php">&larr; Terug</a>
			</div>
		</body>
	</html>

	<?php
	} else {
		header('Location: index.php');
	}

?>
