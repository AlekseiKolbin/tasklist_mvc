<?

class Controller
{
	protected $model;

	public function __construct()
	{
		$this->model = new model();
	}

	public function login()
	{
		if (!$this->model->checkUser()) {
			return false;
		}
	}
}
?>