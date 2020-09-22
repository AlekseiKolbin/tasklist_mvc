<?

namespace models;
use core\Model;

class Main extends Model
{	
	public $err;

	public function getUsers($login)
	{
		$user = $this->db->query("SELECT * FROM users WHERE login = '$login'");
		if(empty($user))
		{
			return false;
		}
		else
		{
			$res_user = $user->fetch_assoc();
			return $res_user;
		}
	}

	public function auth($post)
	{
		$select_user = $this->getUsers($post['login']);
		$password = $post['password'];
		if(!empty($select_user))
		{
			if(password_verify($password, $select_user['password']))
			{
				$this->session($select_user['id'], $select_user['login']);
			}
			else
			{
				$err = "Неправильный пароль";
				return $err;
			}
		}
		else
		{
			$this->reg($post);
		}
		
	}

	public function reg($post)
	{
		if(preg_match("/^[a-zA-Z0-9]+$/",$post['login']))
		{
			if(strlen($post['login']) > 3 or strlen($post['login']) < 30)
			{				
				$login =  htmlspecialchars($post['login']);
				$password = password_hash($post['password'], PASSWORD_BCRYPT);
				$this->db->query("INSERT INTO users SET login='$login', password='$password'");
				$select_user = $this->getUsers($login);
				$this->session($select_user['id'], $select_user['login']);
			}
			else
			{
				$err = "Логин должен быть не меньше 3-х символов и не больше 30";
				return $err;
			}
		}
		else
		{
			$err = "Логин может состоять только из букв английского алфавита и цифр";
			return $err;
		}
	}

	public function session($id, $login)
	{
		$_SESSION['id'] = $id;
		$_SESSION['login'] = $login;
		header('location: tasklist');
	}
}
?>