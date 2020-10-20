<?php 

namespace App\Models;
use CodeIgniter\Model;

class DashboardModel extends Model {

    protected $table = 'chamados';
    
    public function getChartTickets(string $monthYear = null): array {

        $filter = "DATE_FORMAT(chamado.inicio, '%m%Y') = DATE_FORMAT(CURDATE(), '%m%Y')";

        if ($monthYear) 
            $filter = "DATE_FORMAT(chamado.inicio, '%m%Y') = ?";

        $sql = "SELECT COUNT(DISTINCT(chamado.cod)) AS total, DATE_FORMAT(chamado.inicio, '%d') as day, DATE_FORMAT(chamado.inicio, '%d/%m/%Y') AS daymonthyear
        FROM chamado
        LEFT JOIN evento ON chamado.cod = evento.chamado_cod
        LEFT JOIN AREA ON evento.area_cod = area.cod
        LEFT JOIN tipo ON chamado.tipo_cod = tipo.cod
        LEFT JOIN cliente ON chamado.cliente_cod = cliente.cod
        LEFT JOIN modulo ON chamado.modulo_cod = modulo.cod
        LEFT JOIN atendente ON evento.atendente_cod = atendente.cod
        LEFT JOIN grupo ON cliente.grupo_cod = grupo.cod
        LEFT JOIN orcamento ON chamado.orcamento_cod = orcamento.cod
        WHERE $filter
        GROUP BY DAY(chamado.inicio)
        ORDER BY chamado.inicio ASC";

        $result = $this->db->query($sql, [$monthYear]);

        return $result->getResult();
    }

    public function getCardsTickets(string $monthYear = null): array {

        $filter = "DATE_FORMAT(chamado.inicio, '%m%Y') = DATE_FORMAT(CURDATE(), '%m%Y')";

        if ($monthYear) 
            $filter = "DATE_FORMAT(chamado.inicio, '%m%Y') = ?";

        $sql1 = "SELECT COUNT(1) AS total FROM chamado";
        
        $sql2 = "SELECT DISTINCT(COUNT(evento.chamado_cod)) AS total
                FROM
                    (SELECT DISTINCT 
                        chamado_cod,
                        atendente_cod 
                    FROM
                        evento 
                    GROUP BY chamado_cod) AS evento 
                    INNER JOIN chamado 
                        ON chamado.cod = evento.chamado_cod 
                    INNER JOIN atendente 
                        ON atendente.cod = evento.atendente_cod 
                WHERE evento.atendente_cod = ? AND $filter";

        $sql3 = "SELECT DISTINCT(COUNT(chamado.cod)) AS total 
                    FROM chamado 
                    INNER JOIN evento ON chamado.cod = evento.chamado_cod 
                    WHERE evento.atendente_cod = ? AND chamado.situacao = 0 AND evento.concluido = 0";

        $sql4 = "SELECT DISTINCT(COUNT(chamado.cod)) AS total 
                        FROM chamado 
                        WHERE $filter";

        $sql5 = "SELECT ROUND(COUNT(chamado.cod) / MONTH(CURDATE()), 2) AS avgMonth 
                    FROM chamado 
                    WHERE YEAR(chamado.inicio) = ?";

        $sql6 = "SELECT cliente.nome as client, chamado.descricao as description, chamado.cod as id, DATE_FORMAT(chamado.inicio, '%d/%m/%Y %H:%i:%s') as created_date FROM 
                chamado 
        INNER JOIN cliente ON chamado.cliente_cod = cliente.cod
        ORDER BY chamado.cod DESC LIMIT 1";

        $lastMonth = " CURDATE() ";

        if ($monthYear) 
            $lastMonth = "'20".substr($monthYear, 2, 2) . "-" . substr($monthYear, 0, 2) . "-01'";

        $sql7 = "SELECT DISTINCT(COUNT(chamado.cod)) AS total 
        FROM chamado 
        WHERE DATE_FORMAT(chamado.inicio, '%m%Y') = DATE_FORMAT(DATE_SUB($lastMonth, INTERVAL 1 MONTH), '%m%Y')";

        $sql8 = "SELECT DISTINCT(COUNT(evento.chamado_cod)) AS total
        FROM
            (SELECT DISTINCT 
                chamado_cod,
                atendente_cod 
            FROM
                evento 
            GROUP BY chamado_cod) AS evento 
            INNER JOIN chamado 
                ON chamado.cod = evento.chamado_cod 
            INNER JOIN atendente 
                ON atendente.cod = evento.atendente_cod 
        WHERE evento.atendente_cod = ? AND DATE_FORMAT(chamado.inicio, '%m%Y') = DATE_FORMAT(DATE_SUB($lastMonth, INTERVAL 1 MONTH), '%m%Y')";

        $sql9 = "SELECT 
                COUNT(1) AS total 
            FROM
                chamado 
                INNER JOIN evento 
                ON evento.chamado_cod = chamado.cod 
            WHERE chamado.andamento < 4 
                AND chamado.situacao = 0 
                AND evento.concluido = 0 
                AND DATEDIFF(CURDATE(), chamado.inicio) > 30 LIMIT 1";

        return array(
            "totalTickets"      => $this->db->query($sql1)->getRow()->total,
            "myTickets"         => $this->db->query($sql2, [session()->get('id'), $monthYear])->getRow()->total,
            "myOpenTickets"     => $this->db->query($sql3, [session()->get('id')])->getRow()->total,
            "totalTicketsMonth" => $this->db->query($sql4, [$monthYear])->getRow()->total,
            "avgMonth"          => $this->db->query($sql5, [date('Y')])->getRow()->avgMonth,
            "ticketsMore30Days" => $this->db->query($sql9, [date('Y')])->getRow()->total,
            "lastTicket"        => $this->db->query($sql6)->getRow(),
            "ticketsLastMonth"  => array(
                "lastMonth" => $this->db->query($sql7)->getRow()->total,
                "myTickets" => $this->db->query($sql8, [session()->get('id')])->getRow()->total,
            )
        );
    }

    public function getCards2Tickets(): array {

        $sqlArea = "SELECT 
                COUNT(DISTINCT (evento.chamado_cod)) AS total,
                area.nome AS label
            FROM
                (SELECT DISTINCT 
                    chamado_cod,
                    area_cod 
                FROM
                    evento 
                GROUP BY chamado_cod) AS evento 
                INNER JOIN chamado 
                    ON evento.chamado_cod = chamado.cod 
                INNER JOIN AREA
                    ON evento.area_cod = area.cod 
            GROUP BY evento.area_cod 
            ORDER BY total DESC;";
        
        $sqlClient = "SELECT COUNT(chamado.cod) AS total, cliente.nome AS label FROM 
            chamado 
            INNER JOIN cliente ON chamado.cliente_cod = cliente.cod
            GROUP BY chamado.cliente_cod
            ORDER BY total DESC;";

        $sqlModule = "SELECT COUNT(chamado.cod) AS total, modulo.nome AS label FROM 
        chamado 
        INNER JOIN modulo ON chamado.modulo_cod = modulo.cod
        GROUP BY chamado.modulo_cod
        ORDER BY total DESC";

        $sqlType = "SELECT COUNT(chamado.cod) AS total, tipo.nome AS label FROM 
        chamado 
        INNER JOIN tipo ON chamado.tipo_cod = tipo.cod
        GROUP BY chamado.tipo_cod
        ORDER BY total DESC";

        return array(
            'cardArea'   => $this->db->query($sqlArea)->getResult(),
            'cardClient' => $this->db->query($sqlClient)->getResult(),
            'cardModule' => $this->db->query($sqlModule)->getResult(),
            'cardType'   => $this->db->query($sqlType)->getResult()
        );
    }
}