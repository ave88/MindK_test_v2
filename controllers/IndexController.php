<?php
namespace controllers ;
/**
 * Контроллер для обработки стартовой страницы
 */
class IndexController extends \framework\Controller {

	/**
	 * Вывод стартовой страницы
	 */
	public function action_index() 
	{
		$this->render('index_view', array());
	}
}
?>