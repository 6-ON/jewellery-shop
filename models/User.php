<?php

namespace app\models;

use app\core\DbModel;
use app\core\Model;
use app\core\UserModel;

class User extends UserModel
{

    public string $firstName = '';
    public string $lastName = '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';
    public string $role = '';


    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'firstName' => [self::RULE_REQUIRED],
            'lastName' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 32]],
            'passwordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]

        ];
    }

    public static function tableName(): string
    {
        return 'user';
    }

    public function attributes(): array
    {
        return ['firstName',
            'lastName',
            'email',
            'password'];
    }

    public function labels(): array
    {
        return ['firstName' => 'First Name',
            'lastName' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'passwordConfirm' => ' Confirm Password'
        ];
    }

	public static function primaryKey(): string {
        return 'id';    
	}

	public function getDisplayName() :  string {

        return $this->firstName;
	}
}