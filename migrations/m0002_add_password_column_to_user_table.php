<?php

class m0002_add_password_column_to_user_table {
    public function up()
    {
        $db = \app\Core\Application::$app->db;
        $SQL = "ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL";
        $db->PDO->exec($SQL);
    }

    public function down()
    {
        $db = \app\Core\Application::$app->db;
        $SQL = "ALTER TABLE users DROP COLUMN password";
        $db->PDO->exec($SQL);
    }
}