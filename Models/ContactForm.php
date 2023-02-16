<?php

namespace app\Models;

use moaazbriek\phpmvc\Model;

class ContactForm extends Model
{
    public string $subject = '';
    public string $body = '';
    public string $email = '';

    public function rules(): array
    {
        return [
          'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
          'subject' => [self::RULE_REQUIRED],
          'body' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Email',
            'subject' => 'Message Subject',
            'body' => 'Subject Body',
         ];
    }

    public function send()
    {
        return true;
    }
}