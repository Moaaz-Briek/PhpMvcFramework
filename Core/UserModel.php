<?php

namespace app\Core;

abstract class UserModel extends DbModel
{
    public abstract function getName(): string;
}