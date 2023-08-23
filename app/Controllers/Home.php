<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class Home extends BaseController
{
    protected $dashboardModel;
    public function __construct()
    {
        $this->dashboardModel = new DashboardModel();
    }
    public function index(): string
    {
        $dashboard = $this->dashboardModel->findAll();
        $data = [
            'dashboard' => $dashboard
        ];
        // dd($dashboard);
        return view('index', $data);
    }
}
