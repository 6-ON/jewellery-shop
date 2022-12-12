<?php

namespace app\core;

abstract class DbModel extends Model
{
    private static function prepare($sql): \PDOStatement
    {
        return Application::$app->db->prepare($sql);
    }

    abstract public static function tableName(): string;

    abstract public function attributes(): array;
    abstract public static function primaryKey(): string;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn ($attr) => ":$attr", $attributes);
        $SQL = "INSERT INTO $tableName(" . implode(',', $attributes) . ")
            VALUES(" . implode(',', $params) . ")";

        $stmt = self::prepare($SQL);

        foreach ($attributes as $attr) {
            $stmt->bindValue(":$attr", $this->{$attr});
        }
        $stmt->execute();
        return true;
    }

    public static function findOne($where)
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = "SELECT * FROM $tableName WHERE " . implode('AND ', array_map(fn ($attr) => "$attr = :$attr", $attributes));
        $stmt = self::prepare($sql);
        foreach ($where as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $stmt->fetchObject(static::class);
    }
}
