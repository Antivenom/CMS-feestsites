<?php

	include_once('includes/db.php');
	include_once('includes/article.php');

	$objArticle = new Article2;
	$objArticles = $objArticle->fetchAll();
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Feest sites</title>
	<meta name="Description" content="Wilt u snel een goede site vinden voor uw feesten? Wij hebben een kwalitatieve en feestelijke selectie gemaakt in de beste feestsites!" />
	<link href="css/sheet.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="container">
	  <div id="feestwebsites"><br />
	    <img src="images/feestsites.png" width="414" height="102" border="0" alt="Feestsites.nl" /></div>
	    
	  <div id="tip"><img src="images/tip.png" width="167" height="175" border="0" alt="tip"/></div>
	  
	  <div id="tekstvlak">Wij hebben een selectie gemaakt van de meest bekende websites van Nederland over feesten. Wilt u met uw feestsite op dit lijstje? <a href="contact.php" title="Website aanmelden">Meld dan uw feest website aan.</a> Wij staan altijd open voor suggesties.</div>
	  <br />
	  <br />
	  <div id="blok">
		<?php 
			foreach ($objArticles as $objArticle) { ?>
				<div class="feest_blok">
					<div class="link_tekst">
						<h1><a target="_blank" href="<?php echo $objArticle['article_url'] ?>" title="<?php echo $objArticle['article_title'] ?>"><?php echo $objArticle['article_title'] ?></a></h1>
						<p><?php echo $objArticle['article_content'] ?></p>
	      			</div>
				</div>
			<?php } ?>
	  </div>
	  <div align="center"> 
	    <script type="text/javascript"><!--
			google_ad_client = "ca-pub-4191108935416698";
			/* Feestsites onder */
			google_ad_slot = "4105591189";
			google_ad_width = 728;
			google_ad_height = 90;
			//-->
		</script> 
	    	<script type="text/javascript"src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script> 
	  </div>
	  <br clear="all" />
	  
	  <ul>
	    <li><a href="contact.php" title="Website aanmelden">Website aanmelden</a></li>
	    <li>© Copyright</li>
	    <li><a target="_blank" href="http://www.farlawebmedia.nl" title="Webdesign en Domeinnamen">Farlawebmedia.nl</a></li>
	  </ul>
	</div>
</body>
</html>
