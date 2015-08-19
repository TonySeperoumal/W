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
	}