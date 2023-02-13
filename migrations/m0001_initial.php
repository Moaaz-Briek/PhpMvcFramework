<?php

class m0001_initial {
    public function up()
    {
        $db = \app\Core\Application::$app->db;
        $SQL = "CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHA(255) NOT NULL,
                firstname VARCHA(255) NOT NULL,
                lastname VARCHA(255) NOT NULL,
                status TINYINT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                ) ENGINE=INNODB;";
        $db->PDO->exec($SQL);
    }

    public function down()
    {
        $db = \app\Core\Application::$app->db;
        $SQL = "DROP TABLE users";
        $db->PDO->exec($SQL);
    }
}