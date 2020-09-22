<?
namespace core;
use mysqli;

abstract class Model
{	
	public $db;
	
	public function __construct()
	{
		$this->db = new mysqli('localhost', 'root', '', 'tasklist');
		session_start();
	}
}

?>