<?php 

namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model
{
	protected $table = 'atendente';

	/**
	 * Undocumented function
	 *
	 * @return array
	 */
	public function getAllUsers(): array {
		$sql = "SELECT * FROM atendente";
		$query = $this->db->query($sql);

		return $query->getResult();
    }
	
	/**
	 * getUser
	 *
	 * @param string $login
	 * @param string $pass
	 * @return null|object
	 */
    public function getUser(string $login, string $pass):? object {
        $sql   = "SELECT * FROM atendente WHERE (cod = ? OR nome = ?) AND senha = ? LIMIT 1";
        $query = $this->db->query($sql, [$login, $login, $pass]);

		return $query->getRow();
	}
	
	public function getNextBirthday() {
		$sql   = "SELECT 
					nome as name,
					CONCAT(
						YEAR(CURDATE()),
						'-',
						DATE_FORMAT(
							atendente.data_nascimento,
							'%m-%d'
						)
					) AS date_birthday 
				FROM
					atendente 
				WHERE (
						CONCAT(
							YEAR(CURDATE()),
							'-',
							DATE_FORMAT(
								atendente.data_nascimento,
								'%m-%d'
							)
						)
					) BETWEEN NOW() 
					AND DATE_ADD(NOW(), INTERVAL 45 DAY) 
					AND (
						YEAR(CURDATE()) - YEAR(atendente.data_nascimento)
					) > 0 ORDER BY date_birthday ASC";
        $query = $this->db->query($sql);
		return $query->getResult();
	}
}