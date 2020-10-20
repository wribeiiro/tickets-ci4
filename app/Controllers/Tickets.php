<?php 

namespace App\Controllers;
use App\Models\TicketsModel;

class Tickets extends BaseController {
    
    private $ticket_model;

    public function __construct() { 
        $this->ticket_model = new TicketsModel();
        $this->data['title'] = 'Tickets - Dashboard';
    }

    public function index() {
		echo view('includes/header', $this->data);
        echo view('includes/menu', $this->data);
        echo view('tickets/index', $this->data);
        echo view('includes/footer', $this->data);
    }

    public function getTickets() {
        $this->response
            ->setStatusCode(200)
            ->setJSON($this->ticket_model->getTickets())
            ->send();
    }

    public function getMyTickets() {
        $this->response
            ->setStatusCode(200)
            ->setJSON($this->ticket_model->getMyTickets())
            ->send();
    }
}