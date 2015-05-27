$(document).ready( function(){
	/**
	 * Навешивание событий для редактирования студента
	 */
	var setEditEvents = function () {

		/**
		 * При нажатии на кнопку редактировать в таблице студентов открывается окно редактирования
		 */
		$(document).on('click', '.edit-button', function () {
			$.get('/student/get_student', {
				id : $(this).closest('tr').find('.user-id').html()
				},
				function (result) {
					$('.edit-modal').modal('show');
					$('.save-form').show();
  					$('.edit-modal .modal-body').html(result);
				}
			);
			return false;
		});

		/**
		 * При нажатии на кнопку сохранить в окне редактирования, сохраняются данные об студенте
		 */
		$('.save-form').on('click', function () {
			var form = $('.edit-modal form');
			$.post('/student/save_student', {
					id : form.find('.id').val(),
					name : form.find('.name').val(),
					surname : form.find('.surname').val(),
					age : form.find('.age').val(),
					sex : form.find('.sex:checked').val(),
					faculty : form.find('.faculty').val(),
					class : form.find('.class').val()
				},
				function (result){
					$('.edit-modal .modal-body').html(result);
					$('.save-form').hide();
					replaceTable();
				}
			);
		});		
	};

	/**
	 * Навешивание событий на удаление студента
	 */
	var setDelEvents = function () {

		/**
		 * При нажатии на кнопку подтверждения удаления , студент удаляется из базы
		 */
		$('.dell-form').on('click', function () {
			var form = $('.dell-modal form');
			$.get('/student/delete_student', {
					id : form.find('.id').val(),
				},
				function (result){
					$('.dell-modal').modal('show');
					$('.dell-modal .modal-body').html(result);
					$('.dell-form').hide();
					replaceTable();
				}
			);
		});

		/**
		 * При нажатии на кнопку удалить в таблице студентов открывается окно подтверждения удаления
		 */
		$(document).on('click', '.dell-button', function () {
			$.get('/student/delete_student_confirm', {
				id : $(this).closest('tr').find('.user-id').html()
				},
				function (result) {
					$('.dell-modal').modal('show');
					$('.dell-modal .modal-body').html(result);
					$('.dell-form').show();
				}
			);
			return false;
		});
	};

	/**
	 * Навешивание событий на добавление студента
	 */
	var setAddEvent = function () {

		/**
		 * При нажатии на кнопку сохранить,сохраняются новые данные о студенте
		 */
		$('.save-add-form').on('click', function () {
			var form = $('.add-modal form');
			$.post('/student/save_student', {
					name : form.find('.name').val(),
					surname : form.find('.surname').val(),
					age : form.find('.age').val(),
					sex : form.find('.sex:checked').val(),
					faculty : form.find('.faculty').val(),
					class : form.find('.class').val()
				},
				function (result){
					$('.add-modal .modal-body').html(result);
					$('.save-add-form').hide();
					replaceTable();
				}
			);
		});

		/**
		 * При нажатии на меню в nav-bar (Добавить студента) открывается окно добавления нового студента
		 */
		$(document).on('click', '.add_std', function () {
			$.get('/student/get_student',
				function (result) {
					$('.add-modal').modal('show');
					$('.save-add-form').show();
  					$('.add-modal .modal-body').html(result);
				}
			);
			return false;
		});
	};
	var replaceTable = function () {
		$.get ('/student/get_table_ajax', {}, function (result) {
			$('.table').replaceWith(result);
		});
	};
	setEditEvents();
	setDelEvents();
	setAddEvent();					
});