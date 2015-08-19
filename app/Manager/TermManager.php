<?php

	namespace Manager;

	class TermManager extends \W\Manager\Manager
	{
		public function getCurrentWordOfTheDay()
		{
			$dbh = $this->dbh;
			$table = $this->table;

			$sql ="SELECT * FROM terms WHERE is_wotd = 1";
			$sth = $this->dbh->prepare($sql);
			$sth->execute();

			return $sth->fetch();
		}

		public function getRandomWOTD()
		{
			$dbh = $this->dbh;

		$sql = "SELECT * FROM terms ORDER BY RAND() WHERE is_wotd = 0 LIMIT 1";
		$sth = $this->dbh->prepare($sql);		
		$sth->execute();

		return $sth->fetchColumn();
		}
	}