<?
	$host = 'localhost';
	$db_name = 'tasklist';
	$db_user = 'root';
	$db_password = '';
	$charset = 'utf8';
	$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

class model
{
	protected $db;

	public function __construct()
	{
		$this->db = new PDO("mysql:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_password, $options);
	}

	// public function add_user($login, $password)
	// {
	// 	$add = $db->query('INSERT INTO users SET login = :login, password = :password');
	// 	$values = $db->prepare($add);
	// 	$values->bindParam(":login", $login);
	// 	$values->bindParam(":password", $passwords);
	// 	$values->execute();
	// }

	public function checkUser()
	{
		$login = $_POST['login'];
		$password = $POST['password'];
		$sql = "SELECT * FROM users WHERE login = :login AND pasword = :password";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":login", $login, PDO::PARAM_STR);
		$stmt->bindValue(":password", $password, PDO::PARAM_STR);
		$stmt->execute();

		$res = $stmt->fetch(PDO::FETCH_ASSOC);

		if (!empty($res))
		{
			echo "ok";
		}
		else
		{
			return false;
		}
	}
} 


?>