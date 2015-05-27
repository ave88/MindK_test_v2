<?php
namespace framework;
/**
 * Базовый класс для контроллеров
 */
class Controller {
	/**
	 * Параметры получаемые методом GET
	 * @var array
	 */
	public $getParams;

	/**
	 * Параметры получаемые методом POST
	 * @var array
	 */
	public $postParams;

	/**
	 * Запуск обработчика запроса
	 * @param  string $action название действия
	 */
	public function run ($action) 
	{
		$this->getParams = $_GET;
		$this->postParams = $_POST;
		if(method_exists($this, $action)) 
		{
			$this -> $action(); 
		}else {
			die('Такого экшена не существует!'); 
		}		
	}

	/**
	 * Выводит вид
	 * @param  string  $view    Название файла вида
	 * @param  array  $params  Массив параметров для вида
	 * @param  boolean $is_ajax Является ли запрос ajax, если да то не отображаем элементы header и footer
	 */
	protected function render($view, $params, $is_ajax = false)
	{
		extract($params);
		if ($is_ajax == false) {
			require 'template/header.php';
		}
		require 'views/'.$view.'.php';
		if ($is_ajax == false) {
			require 'template/footer.php';
		}
	}
}
?>