<?


namespace controllers; 

use core\Controller;

class MainController extends Controller
{
	public function indexAction()
	{
		$this->view->render('Вход/Авторизация');
	}
}
?>