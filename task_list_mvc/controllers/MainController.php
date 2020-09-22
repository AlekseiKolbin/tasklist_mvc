<?
namespace controllers; 

use core\Controller;

class MainController extends Controller
{
	public function indexAction()
	{
		$err = $this->model->auth($_POST);
		$this->view->render('Вход/Регистрация', ['err' => $err]);
	}
}
?>