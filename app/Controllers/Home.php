<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class Home extends BaseController
{
  
    public function index(): string
    {
        $model = new DashboardModel();

        $data['uniqueRegencies'] = $model->getUniqueRegencies();
        $data['regencyCounts'] = $model->getRegency();

        // dd($data['regencyCounts']);
        return view('index', $data);
    }
}
