<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageModel extends Model
{
  protected $table = 'images';

  protected $primaryKey = 'id';

  protected $allowedFields = ['path', 'patient_id'];
}
