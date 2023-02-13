<?php

namespace app\Core;

abstract class DbModel extends Model
{
    public abstract function tableName(): string;

    public abstract function attributes(): array;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ':$attr', $attributes);
        $statement = self::prepare("INSERT INTO $tableName (".implode(',', $attributes).") VALUES (".implode(',', $params).")");
    }

    public static function prepare($query)
    {
        Application::$app->db->PDO->prepare($query);
    }
}