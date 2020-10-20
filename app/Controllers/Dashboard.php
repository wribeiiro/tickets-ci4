<?php 

namespace App\Controllers;
use App\Models\DashboardModel;

class Dashboard extends BaseController {
    
    private $dashboard_model;

    public function __construct() { 
        $this->dashboard_model = new DashboardModel();

        $this->data['title']  = 'Tickets - Dashboard';
    }

	public function index() {
		echo view('includes/header', $this->data);
        echo view('includes/menu', $this->data);
        echo view('dashboard/index', $this->data);
        echo view('includes/footer', $this->data);
    }

	public function getChartTickets() { 

        $monthYear  = $this->request->getGet('monthYear', FILTER_SANITIZE_STRING);
        $result     = $this->dashboard_model->getChartTickets($monthYear);
        $categories = []; 

        foreach (returnDaysOfMonth() as $day) 
            $categories[$day] = array('day' => $day, 'data' => 0);
 
        foreach ($result as $row)
            $categories[$row->day] = array('day' => $row->day, 'data' => $row->total);

        foreach ($categories as $cat) {
			$categoriesFinal[] = $cat['day'];
			$dataFinal[]       = floatval($cat['data']);   
        }

        $this->response
            ->setStatusCode(200)
            ->setJSON(array('categories' => $categoriesFinal, 'data' => $dataFinal))
            ->send();
    }

    public function getCardTicket() { 

        $monthYear = $this->request->getGet('monthYear', FILTER_SANITIZE_STRING);

        $this->response
            ->setStatusCode(200)
            ->setJSON($this->dashboard_model->getCardsTickets($monthYear))
            ->send();
    }

    public function getCard2Ticket() {
        $this->response
            ->setStatusCode(200)
            ->setJSON($this->dashboard_model->getCards2Tickets())
            ->send();
    }
}