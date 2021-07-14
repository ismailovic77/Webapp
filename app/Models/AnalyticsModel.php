<?php namespace App\Models;

use CodeIgniter\Model;

class AnalyticsModel extends Model
{
    protected $table = 'analytics';

    protected $primaryKey = 'id';

    protected $allowedFields = ['tt_user_logs', 'tt_img_processed'];

    protected $skipValidation = ["update"];

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
