<?php

namespace app\Models;

use app\Core\Model;

class LoginForm extends Model
{
    public string $email;
    public string $password;

    public function rules(): array
    {
        return [
          'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
          'password' => [self::RULE_REQUIRED],
        ];
    }

    public function login()
    {

    }
}