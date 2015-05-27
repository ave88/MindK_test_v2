<?php
namespace framework;

/**
 * Базовый класс для представления таблицы в виде модели
 */
abstract class ActiveRecord {

	/**
	 * имя таблицы БД
	 * @var string
	 */
	public static $tableName;

	/**
	 * массив колонок в таблице БД
	 * @var array
	 */
	public static $tableColumns;

	/**
	 * ID записи в таблице (обязательная колонка бля таблицы)
	 * @var integer
	 */
	public $id;

	/**
	 * Получить модель записи по ID
	 * @param  integer $id ID записи
	 * @return record Модель записи
	 */
	public static function findById ($id) 
	{
		$id = (int)$id;
		$row = DB::getRow("SELECT * FROM ". static::$tableName ." WHERE id = {$id}");
		$record = new static();
		foreach (static::$tableColumns as $columnName) {
			$record->$columnName = $row [$columnName];
		}				
		return $record;
	}

	/**
	 * Получить модели всех записей
	 * @param  string|null $where условие фильтрации записей 
	 * @param  string|null $order условие сортировки записей
	 * @return result[] Массив моделей всех записей
	 */
	public static function getRecords ($where=null,$order=null) 
	{
		$query = "SELECT * FROM ". static::$tableName;
		if (!is_null($where)) {
			$query .= " WHERE $where";
		}
		if (!is_null($order)) {
			$query .= " ORDER by $order";
		}
		$res=DB::query($query);
		$result = array();
		while ($row=DB::fetch($res)) {
			$record = new static();
			foreach (static::$tableColumns as $columnName) {
				$record->$columnName = $row [$columnName];
			}				
			$result[] = $record;
		}
		return $result;
	}

	/**
	 * Сохранить модель записи в базу(если запись существует то будет обновлена,в противном случае будет создана)
	 */
	public function save () 
	{
		if(!$this->id) {
			$query = "INSERT INTO " . static::$tableName ." SET ";
			foreach (static::$tableColumns as $key => $columnName ) {
				if ($key>0) {
					$query .= ', ';
				}
				$query .= $columnName .' = "'. $this->$columnName .'"';
			}				
			DB::query($query);
			$this->id = mysql_insert_id();
		}else{
			$query = "UPDATE " . static::$tableName . " SET ";
			foreach (static::$tableColumns as $key => $columnName) {
				if ($key>0) {
					$query .= ', ';
				}
				$query .= $columnName .' = "'. $this->$columnName .'"';
			}
			$query .= "WHERE id = {$this->id}";
			DB::query($query);
		}
	}

	/**
	 * Удалить модель из базы
	 */
	public function delete () 
	{
		DB::query("DELETE  FROM " . static::$tableName  . " WHERE id = {$this->id}");
	}

}

?>