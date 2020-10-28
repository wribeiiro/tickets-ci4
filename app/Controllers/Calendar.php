<?php 

namespace App\Controllers;
use App\Models\DashboardModel;

class Calendar extends BaseController {
    
    public function __construct() { 
        $this->data['title']  = 'Tickets - Calendar';
    }

	public function index() {
		echo view('includes/header', $this->data);
        echo view('includes/menu', $this->data);
        echo view('calendar/index', $this->data);
        echo view('includes/footer', $this->data);
    }
}