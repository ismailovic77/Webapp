<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
  protected $table = 'patients';

  protected $primaryKey = 'id';

  protected $allowedFields = [
    'admin_id',
    'first_name',
    'last_name',
    'birth_date',
    'email',
    'phone',
    'last_menstrual_period',
    'gestational_age',
    'gravidity',
    'parity',
    'medical_history',
    'notes',
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
