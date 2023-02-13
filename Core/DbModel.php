<?php

namespace app\Core;

abstract class DbModel extends Model
{
    public abstract function tableName(): string;

    public function save()
    {

    }
}