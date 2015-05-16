<?php

class Migration_2015_05_16_22_18_50 extends MpmMigration
{

    public function up(PDO &$pdo)
    {
        $pdo->exec("
			ALTER TABLE `widgets`
			  ADD COLUMN `top` INT(10) NOT NULL DEFAULT 0,
			  ADD COLUMN `left` INT(10) NOT NULL DEFAULT 0,
			  ADD COLUMN `width` INT(10) NOT NULL DEFAULT 300,
			  ADD COLUMN `height` INT(10) NOT NULL DEFAULT 200;
		");
    }

    public function down(PDO &$pdo)
    {
        $pdo->exec("
			ALTER TABLE `widgets`
			  DROP COLUMN `top`,
			  DROP COLUMN `left`,
			  DROP COLUMN `width`,
			  DROP COLUMN `height`;
		");
    }

}

?>