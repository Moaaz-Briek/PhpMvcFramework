<?php

namespace app\Core;

use app\Core\db\DbModel;

abstract class UserModel extends DbModel
{
    public abstract function getName(): string;
}