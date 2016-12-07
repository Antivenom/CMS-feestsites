<?php

	Class Article {
		public function fetchAll() {
			global $db;

			$sqlQuery = $db->query("SELECT * FROM articles");
			$sqlQuery->execute();

			return $sqlQuery->fetchAll();
		}

		public function fetchData($intId)
		{
			global $db;

			$sqlQuery = $db->prepare("SELECT article_id, article_url, article_title, article_content FROM articles WHERE article_id = :id");
			$sqlQuery->bindValue('id', $intId);
			$sqlQuery->execute();

			return $sqlQuery->fetch();
		}
	}
	
	Class Article2 {
		public function fetchAll() {
			global $db;

			$sqlQuery = $db->query("SELECT * FROM articles2");
			$sqlQuery->execute();

			return $sqlQuery->fetchAll();
		}

		public function fetchData($intId)
		{
			global $db;

			$sqlQuery = $db->prepare("SELECT * FROM articles WHERE article_id = ?");
			$sqlQuery->bindValue(1, $intId);
			$sqlQuery->execute();

			return $sqlQuery->fetch();
		}
	}


?>