<?php

class Migration_2015_05_15_22_05_47 extends MpmMigration
{

    public function up(PDO &$pdo)
    {
        $pdo->exec("
			CREATE TABLE IF NOT EXISTS `widgets` (
				`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                `type` VARCHAR (255) NOT NULL DEFAULT 'IFRAME',
                `url` TEXT,
                `userId` int(10) unsigned NOT NULL,
				PRIMARY KEY (`id`),
				CONSTRAINT  fk_Widgets_User FOREIGN KEY (`userId`) REFERENCES `users`(`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
		");
    }

    public function down(PDO &$pdo)
    {
        $pdo->exec("
			DROP TABLE `widgets`;
		");
    }
}

?>