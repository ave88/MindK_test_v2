<?php
namespace controllers;
/**
 * Контроллер для обработки данных о студентах
 */
class StudentController extends \framework\Controller {

	/**
	 * Вывод таблицы студентов
	 */
	public function action_get_table() 
	{
		$students = \models\Student::getRecords();
		$params = array('students' => $students);
		$this->render('table_view', $params);
	}

	/**
	 * Вывод таблицы студентов с изменёнными параметрами
	 */
	public function action_get_table_ajax() 
	{
		$students = \models\Student::getRecords();
		$params = array('students' => $students);
		$this->render('table_view', $params, true);
	}

	/**
	 * Удаление студента
	 */
	public function action_delete_student()
	{
		$id = $this->getParams['id'];
		$student = \models\Student::findById($id);
		$student->delete();
		$params = array ('student' => $student);
		$this->render('dell_view', $params, true);
	}

	/**
	 * Вывод окна подтверждения удаления студента
	 */
	public function action_delete_student_confirm() 
	{
		$id = $this->getParams['id'];
		$student = \models\Student::findById($id);
		$params = array ('student' => $student);
		$this->render('dell_confirm_view', $params, true);
	}

	/**
	 * Сохранение студента
	 */
	public function action_save_student() 
	{
		$id = $this->postParams['id'];
		$student = new \models\Student();
		$student->id = $id;
		$student->name = $this->postParams['name'];
		$student->surname = $this->postParams['surname'];
		$student->age = $this->postParams['age'];
		$student->sex = $this->postParams['sex'];
		$student->faculty = $this->postParams['faculty'];
		$student->class = $this->postParams['class'];
		$student->save();
		$params = array('student' => $student);
		$this->render('save_view', $params, true);
	}

	/**
	 * Вывод формы редактирования студента
	 */
	public function action_get_student ()
	{
		$id = $this->getParams['id'];
		if(!$id){
			$student = new \models\Student();
		}else{
			$student = \models\Student::findById($id);
		}
		$params = array('student' => $student);
		$this->render('student_view', $params, true);
	}

	/**
	 * Вывод таблицы студентов
	 */
	public function action_index() 
	{
		$this->action_get_table();
	}
}
?>