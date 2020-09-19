<?
namespace controllers; 
use core\Controller;

class TaskController extends Controller
{
	public function tasklistAction()
	{
		$this->view->render('TaskList');
	}
}
?>