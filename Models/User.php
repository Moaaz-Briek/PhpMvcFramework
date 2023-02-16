<?php

namespace app\Models;

use app\core\UserModel;

class User extends UserModel
{
    const STATUS_INACTIVE = 0;

    public int $status = self::STATUS_INACTIVE;

    const STATUS_ACTIVE = 1;

    const STATUS_DELETED = 2;

    public string $firstname = '';

    public string $lastname = '';

    public string $email = '';

    public string $password = '';

    public string $confirmPassword = '';

    public function rules(): array
    {
        // TODO: Implement rules() method.
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]], //This field must be unique for that class.
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function labels(): array
    {
        return [
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'confirmPassword' => 'Confirm Password',
        ];
    }

    public function tableName(): string
    {
        // TODO: Implement tableName() method.
        return 'users';
    }

    public function attributes(): array
    {
        return ['firstname', 'lastname', 'email', 'password', 'status'];
    }

    public function save()
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function getName(): string
    {
        return sprintf("%s %s", $this->firstname, $this->lastname);
    }
}