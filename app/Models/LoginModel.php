<?php namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'admins';

    protected $primaryKey = 'id';

    protected $allowedFields = ['login', 'password', 'role', 'total_logins'];

    protected $skipValidation = ["update"];

    protected $validationRules = [
        'login' => 'required|is_unique[admins.login]',
    ];

    protected $validationMessages = [
        'login' => [
            'is_unique' => 'Sorry. That login has already been taken. Please choose another.',
        ]
    ];

    

    // protected $beforeInsert = ['beforeInsert'];
    // protected $beforeUpdate = ['beforeUpdate'];

    // protected function beforeInsert(array $data){
    //   $data = $this->passwordHash($data);
    //   $data['data']['created_at'] = date('Y-m-d H:i:s');
    //   return $data;
    // }

    // protected function beforeUpdate(array $data){
    //   $data = $this->passwordHash($data);
    //   $data['data']['updated_at'] = date('Y-m-d H:i:s');
    //   return $data;
    // }

    // protected function passwordHash(array $data){
    //   if(isset($data['data']['password']))
    //     $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
    //   return $data;
    // }

}
