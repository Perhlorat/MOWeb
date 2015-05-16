<?php

class Migration_2015_05_09_11_27_46 extends MpmMigration
{

	public function up(PDO &$pdo)
		{
		$pdo->exec("
			CREATE TABLE IF NOT EXISTS `users` (
				`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`username` varchar(45) NOT NULL,
				`email` varchar(60) NOT NULL,
				`password` varchar(256) NOT NULL,
				`type` enum('public','author','admin') NOT NULL,
				`date_entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
				`account` int(10) DEFAULT '0',
				`gameId` int(10) DEFAULT NULL,
				`salt` varchar(256) NOT NULL,
				`avatar` varchar(256) NOT NULL,
				PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;
		");
		}

	public function down(PDO &$pdo)
	{
		$pdo->exec("
			DROP TABLE `users`;
		");
		
	}

}

?>