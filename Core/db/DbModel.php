<?php

namespace app\Core\db;

use app\Core\Application;
use app\Core\Model;

abstract class DbModel extends Model
{
    public abstract function tableName(): string;

    public abstract function attributes(): array;

    public abstract function primaryKey(): string;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName (".implode(',', $attributes).")VALUES (".implode(',', $params).")");
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }

    public static function prepare($query)
    {
        return Application::$app->db->PDO->prepare($query);
    }

    public function findOne(array $array)
    {
        $tableName = static::tableName();
        $attribute = array_keys($array);
        $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attribute));
        //SELECT * FROM $tableName WHERE email =:email AND firstname =:firstname
        //SELECT * FROM $tableName WHERE $sql
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($array as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }
}