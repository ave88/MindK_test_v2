<?php
namespace framework;
/**
 * Класс работы с базой
 */
class DB {

	/**
	 * Подключение к базе
	 */
	public static function connect()
	{		 
		/* Соединяемся с базой данных */
		$hostname = "localhost"; // название/путь сервера, с MySQL
		$username = "root"; // имя пользователя (в Denwer`е по умолчанию "root")
		$password = ""; // пароль пользователя (в Denwer`е по умолчанию пароль отсутствует, этот параметр можно оставить пустым)
		$dbName = "mindk_test"; // название базы данных
		 
		/* Таблица MySQL, в которой будут храниться данные */
		$table = "students";
		 
		/* Создаем соединение */
		mysql_connect($hostname, $username, $password) or die ("Не могу создать соединение");
		 
		/* Выбираем базу данных. Если произойдет ошибка - вывести ее */
		mysql_select_db($dbName) or die (mysql_error());
		mysql_query('SET NAMES utf8');
	}

	/**
	 * Выполнение запроса к базе
	 * @param  string $query Строка запроса к базе данных
	 * @return integer|object Ресурс результата запроса к базе данных
	 */
	public static function query($query) 
	{
		//echo $query;
		$res = mysql_query($query) or die(mysql_error());
		return $res;
	}

	/**
	 * Получения результата запроса
	 * @param  integer|object $res Ресурс результата запроса к базе данных
	 * @return array Массив данных запроса
	 */
	public static function fetch($res) 
	{
		return mysql_fetch_array($res);
	}

	/**
	 * Выполнение запроса к базе данных и получение строки результата запроса
	 * @param  string $query Строка запроса к базе данных
	 * @return array Массив данных запроса
	 */
	public static function getRow($query) 
	{
		$res = mysql_query($query) or die(mysql_error());
		return mysql_fetch_array($res);
	}

	/**
	 * Экранирование строк
	 * @param  string $str Экранируемая строка
	 * @return string Заэкранированная строка
	 */
	public static function escape($str) 
	{
		return mysql_real_escape_string( $str );
	}
}
?>