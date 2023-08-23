<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table = 'packetlos';
    protected $primaryKey = 'site_id';
    // protected $useTimestamps = true;
    // protected $dateFormat    = 'datetime';


    // public function getKomik($slug = false)
    // {
    //     if ($slug == false) {
    //         return $this->findAll();
    //     }
    //     return $this->where(['slug' => $slug])->first();
    // }
}
