<?php
defined('BASEPATH') or exit('No direct script access allowed');

// namespace App\Models;
// use CodeIgniter\Model;

class ServiceModel extends CI_Model
{
    protected $table      = 'services';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'service_id', 'name', 'category', 'rate', 'min', 'max', 'type', 'desc'
    ];
}
