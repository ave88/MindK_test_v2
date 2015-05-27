<?php
namespace models ;
/**
 * Модель студента
 */
class Student extends \framework\ActiveRecord {

	/**
	 * Имя таблицы БД
	 * @var string
	 */
	public static $tableName='students';

	/**
	 * массив колонок таблицы
	 * @var array
	 */
	public static $tableColumns = array(
		'id', 'name', 'surname', 'age', 'sex', 'faculty', 'class'
	);

	/**
	 * ID студента
	 * @var integer
	 */
	public $id;

	/**
	 * Имя студента
	 * @var string
	 */
	public $name;

	/**
	 * Фамилия студента
	 * @var string
	 */
	public $surname;

	/**
	 * Возраст студента
	 * @var integer
	 */
	public $age;

	/**
	 * Пол студента (1=мужской, 0=женский)
	 * @var integer
	 */
	public $sex;

	/**
	 * Факультет студента
	 * @var string
	 */
	public $faculty;

	/**
	 * Группа студента
	 * @var string
	 */
	public $class;		
}
?>