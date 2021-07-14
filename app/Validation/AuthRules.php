<?php

namespace App\Validation;

use App\Models\LoginModel;

class AuthRules
{

  public function authValidator(string $str, string $fields, array $data)
  {
    $model = new LoginModel();
    $user = $model->where('login', $data['login'])->first();

    if (!$user) return false;

    return password_verify($data['password'], $user['password']);
  }
}
