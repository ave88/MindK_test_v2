<?php
namespace framework;

/**
 * Класс для маршрутизации 
 */
class Routing 
{
	/**
	 * имя контроллера по умолчанию
	 * @var string
	 */
	private $defaultController = 'Index';

	/**
	 * действие по умолчанию
	 * @var string
	 */
	private $defaultAction = 'index'; 

	/**
	 * префикс контроллера
	 * @var string
	 */
	private $controllerPrefix = 'Controller'; 

	/**
	 * префикс действия
	 * @var string
	 */
	private $actionPrefix = 'action_'; 

	/**
	 * обработка URI 
	 */
	function __construct () { 	
		$this->routes = explode('/', $_SERVER['REQUEST_URI']);	
		if (count($this->routes)>3) die('Непредусмотренный маршрут!'); 
		
		// получаем имя контроллера 
		if ( !empty($this->routes[1]) ) {	
			$this->controllerName = '\controllers\\'.ucfirst($this->routes[1]) . $this->controllerPrefix;
 		} else { 
 			$this->controllerName = '\controllers\\'. $this->defaultController . $this->controllerPrefix; 
 		} 

 		// получаем имя экшена 
		if ( !empty($this->routes[2]) ) { 
			$action = $this ->routes[2];
			$explode = explode('?', $action);
			$this ->routes[2] = $explode[0];
 			$this->actionName = $this->actionPrefix . $this->routes[2];
 		} else { 
 			$this->actionName = $this->actionPrefix . $this->defaultAction;
  		} 
	}
	
	/**
	 * Создает объект контроллера и выполняет действие
	 */
	function run() { 
		$controller = new $this->controllerName; 
		$action = $this->actionName; 
		$controller -> run($action);
	}
}
?>