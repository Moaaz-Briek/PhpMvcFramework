<?php

namespace app\Models;

use app\Core\Model;

class ContactForm extends Model
{
    public string $subject = '';
    public string $body = '';
    public string $email = '';

    public function rules(): array
    {
        return [
          'email' => [self::RULE_REQUIRED],
          'subject' => [self::RULE_REQUIRED],
          'body' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Enter Your Email',
            'subject' => 'Enter Your Subject',
            'Body' => 'Enter Subject Body',
         ];
    }
}