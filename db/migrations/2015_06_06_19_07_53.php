<?php

class Migration_2015_06_06_19_07_53 extends MpmMigration
{

    public function up(PDO &$pdo)
    {
        $pdo->exec("ALTER TABLE `widgets`
			  ADD COLUMN `settings` TEXT NOT NULL DEFAULT \"\";
		");
    }

    public function down(PDO &$pdo)
    {
        $pdo->exec("ALTER TABLE `widgets`
              DROP COLUMN `settings`;
		");
    }

}

?>