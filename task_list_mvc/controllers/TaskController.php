<?
namespace controllers; 

use core\Controller;

class TaskController extends Controller
{
	public function tasklistAction()
	{
		$post = $_POST;
		if($this->model->checkAuth() == true)
		{
			if(isset($post["task_add"]) and !empty($post["task_name"]))
			{
				$this->model->taskAdd($post);
			}
			if (isset($post['task_all_clean'])) {
				$this->model->taskAllClean($post);
			}
			if(isset($post['task_clean']))
			{
				$this->model->taskClean($post);
			}
			if(isset($post['task_done']))
			{
				$this->model->taskDone($post);
			}
			if(isset($post['out'])) 
			{
				header('Location: /task_list_mvc');
				session_destroy();
			}
			$tasks = $this->model->taskGet();
			$this->view->render('Taskist', ['tasks' => $tasks]);
		}
		else
		{
			header('Location: /task_list_mvc');
		}
		
	}

}
?>