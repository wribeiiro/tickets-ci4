<?php 

namespace App\Models;
use CodeIgniter\Model;

class TicketsModel extends Model {

    protected $table = 'chamados';
    
    /**
     * Undocumented function
     *
     * @return array
     */
    public function getMyTickets(): array {
        $sql = "SELECT DISTINCT chamado.*, 
        chamado.cod as id, 
        chamado.descricao as description, 
        DATE_FORMAT(chamado.inicio, '%d/%m/%Y') as created_date,
        tipo.nome AS type_name,
        cliente.nome AS client_name,
        modulo.nome AS module_name,
        atendente.nome AS caller_name,
        chamado.andamento AS status,
        chamado.prioridade AS priority
        FROM chamado
        LEFT JOIN evento ON chamado.cod = evento.chamado_cod
        LEFT JOIN AREA ON evento.area_cod = area.cod
        LEFT JOIN tipo ON chamado.tipo_cod = tipo.cod
        LEFT JOIN cliente ON chamado.cliente_cod = cliente.cod
        LEFT JOIN modulo ON chamado.modulo_cod = modulo.cod
        LEFT JOIN atendente ON evento.atendente_cod = atendente.cod
        LEFT JOIN grupo ON cliente.grupo_cod = grupo.cod
        LEFT JOIN orcamento ON chamado.orcamento_cod = orcamento.cod
        WHERE evento.atendente_cod = ? AND chamado.situacao = ? AND evento.concluido = ?
        ORDER BY chamado.inicio DESC";

        $result = $this->db->query($sql, [session()->get('id'), 0, 0]);

        return $result->getResult();
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public function getTickets(): array {
        $sql = "SELECT DISTINCT chamado.*, 
        chamado.cod as id, 
        chamado.descricao as description, 
        DATE_FORMAT(chamado.inicio, '%d/%m/%Y') as created_date,
        tipo.nome AS type_name,
        cliente.nome AS client_name,
        modulo.nome AS module_name,
        atendente.nome AS caller_name,
        chamado.andamento AS status,
        chamado.prioridade AS priority
        FROM chamado
        LEFT JOIN evento ON chamado.cod = evento.chamado_cod
        LEFT JOIN AREA ON evento.area_cod = area.cod
        LEFT JOIN tipo ON chamado.tipo_cod = tipo.cod
        LEFT JOIN cliente ON chamado.cliente_cod = cliente.cod
        LEFT JOIN modulo ON chamado.modulo_cod = modulo.cod
        LEFT JOIN atendente ON atendente.cod = (SELECT evento.atendente_cod FROM evento WHERE evento.chamado_cod = chamado.cod ORDER BY evento.chamado_cod DESC LIMIT 1)
        LEFT JOIN grupo ON cliente.grupo_cod = grupo.cod
        LEFT JOIN orcamento ON chamado.orcamento_cod = orcamento.cod
        ORDER BY chamado.inicio DESC";

        $result = $this->db->query($sql);

        return $result->getResult();
    }
}