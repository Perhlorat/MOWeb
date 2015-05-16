<?php

class Migration_2015_05_15_21_54_34 extends MpmMigration
{

    public function up(PDO &$pdo)
    {
        $pdo->exec("
			CREATE TABLE IF NOT EXISTS `settings` (
				`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
				`view` INT(1) DEFAULT 0,
				`gmail` varchar(45) NOT NULL,
				`yandex` varchar(60) NOT NULL,
				`mail` varchar(60) NOT NULL,
				`vktoken` varchar(60) NOT NULL,
				`fbtoken` varchar(60) NOT NULL,
				`userId` int(10) unsigned NOT NULL,
				PRIMARY KEY (`id`),
				CONSTRAINT  fk_Settings_User FOREIGN KEY (`userId`) REFERENCES `users`(`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
		");
    }

    public function down(PDO &$pdo)
    {
        $pdo->exec("
			DROP TABLE `settings`;
		");
    }

}

?>