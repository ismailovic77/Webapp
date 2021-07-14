<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'login' => 'required|max_length[50]',
                'password' => 'required|max_length[255]|authValidator[login,password]',
            ];

            $errors = [
                'password' => [
                    'authValidator' => 'login or Password don\'t match',
                ],
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $user_model = new LoginModel();
                $user = $user_model->where('login', $this->request->getVar('login'))->first();
                if ($user["role"] == "ADMIN") {
                    $user_model->update($user["id"], ["total_logins" => $user["total_logins"] + 1]);
                    $this->analyticsIncrimentor("tt_user_logs");
                    $this->setUserSession($user);
                    return redirect()->to('/');
                } else {
                    return redirect()->to('/login');
                }
                // if ($user["role"] == "USER") {
                //     $this->setUserSession($user);
                //     return redirect()->to('/user');
                // }
            }
        }

        echo view('pages/auth/login', $data);
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'login' => $user['login'],
            'firstname' => $user['first_name'],
            'lastname' => $user['last_name'],
            'role' => $user['role'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function getHash($password = null)
    {
        // example : http://budget-lld-app.com/getHash/123456
        // foreach ($data as $value) {
        //     $hash_data[] = password_hash($value, PASSWORD_DEFAULT);
        // }
        var_dump($password);
        var_dump(password_hash($password, PASSWORD_DEFAULT));
    }
}
