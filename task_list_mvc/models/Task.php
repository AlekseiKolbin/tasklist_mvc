<?

namespace models;
use core\Model;

class Task extends Model
{
	public function checkAuth()
	{
		if (!isset($_SESSION['id']))
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function taskGet()
	{
		$tasks = $this->db->query("SELECT * FROM tasks WHERE user_id ='".$_SESSION["id"]."'");
		return $tasks;
	}

	public function taskAllClean($post)
	{
		$task_all_clean = $this->db->query("DELETE FROM tasks WHERE user_id ='".$_SESSION["id"]."'");
	}

	public function taskClean($post)
	{
		if($post['checked'] != 0)
		{
			$taskClean = $this->db->query("DELETE FROM tasks WHERE id IN ( " . implode( ', ', $post['checked'] ) . " )");
		}
	}

	public function taskAdd($post)
	{
		$this->db->query("INSERT INTO tasks SET user_id ='".$_SESSION["id"]."', description='".htmlspecialchars($post['task_name'])."'");
	}

	public function taskDone($post)
	{
		if($post['checked'] != 0)
		{
			$taskDone = $this->db->query("UPDATE tasks SET status = '1' WHERE id IN ( " . implode( ', ', $post['checked'] ) . " )");
		}
	}
}