<?php
/**
 * Шаблон комментариев (comments.php)
 * Выводит список комментариев и форму добавления
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
<div id="comments">
	<div class="comments-title">
       <span class="ctitle">Отзывы о казино</span>
    </div>

	<?php if (have_comments()) : // если комменты есть ?>
	<ul class="comment-list">
		<?php
			$args = array( // аргументы для списка комментариев, некоторые опции выставляются в админке, остальное в классе clean_comments_constructor
				'walker' => new clean_comments_constructor, // класс, который собирает все структуру комментов, нах-ся в function.php
			);
			wp_list_comments($args); // выводим комменты
		?>
	</ul>
	<?php endif; // // если комменты есть - конец ?>
	<?php if (comments_open()) { // если комментирование включено для данного поста
		/* ФОРМА КОММЕНТИРОВАНИЯ */
		$fields =  array( // разметка текстовых полей формы
			'author' => '<div class="row"><div class="col-md-6"><input id="author" name="author" type="text" value="'.esc_attr($commenter['comment_author']).'"  placeholder="Ваше имя" required></div>', // поле Имя
			'email' => '<div class="col-md-6"><input id="email" name="email" type="text" value="'.esc_attr($commenter['comment_author_email']).'" placeholder="Ваш Email" required></div></div>', // поле email
			);
		$args = array( // опции формы комментирования
			'fields' => apply_filters('comment_form_default_fields', $fields), // заменяем стандартные поля на поля из массива выше ($fields)
			'comment_field' => '<textarea id="comment" name="comment" placeholder="Введите текст комментария"></textarea>', // разметка поля для комментирования
			'must_log_in' => '<p class="must-log-in">Вы должны быть зарегистрированы! '.wp_login_url(apply_filters('the_permalink',get_permalink())).'</p>', // текст "Вы должны быть зарегистрированы!"
			'logged_in_as' => '', // разметка "Вы вошли как"
			'comment_notes_before' => '', // Текст до формы
			'comment_notes_after' => '<span class="moder">Коментарий проходит модерацию, поэтому не переживайте что коментарий появился не сразу</span>', // текст после формы
			'id_form' => 'commentform', // атрибут id формы
			'id_submit' => 'submit', // атрибут id кнопки отправить
			'title_reply' => false, // заголовок формы
			'title_reply_to' => 'Ответить %s', // "Ответить" текст
			'cancel_reply_link' => 'Отменить ответ', // "Отменить ответ" текст
			'label_submit' => 'Отправить' // Текст на кнопке отправить
		);
		/* Следующий кусок кода будет менять разметку формы, которую мы не можем изменить стандартным функционалом wp */
		/* Например, это может понадобиться, если надо сделать форму на бутстрапе */
		ob_start(); // включаем буферизацию вывода
	    comment_form($args); // показываем нашу форму
	    $what_changes = array( // массив с заменой эдементов, ключ - то, что меняем. значение - то, на что меняем
	    		'<small>' => '', // удалим <small> тэг
	    		'</small>' => '', // удалим <small> тэг
	    		'<h3 id="reply-title" class="comment-reply-title">' => '<span id="reply-title">', // заменим h3 на span
	    		'</h3>' => '</span>', // заменим h3 на span
	    		'<input name="submit" type="submit" id="submit" value="'.$args['label_submit'].'" />' => '<button type="submit">'.$args['label_submit'].'</button>' // заменим submit input на button
	    	);
	    $new_form = str_replace(array_keys($what_changes), array_values($what_changes), ob_get_contents()); // меняем элементы в форме
	    ob_end_clean(); // очищаем буферизацию
	    echo $new_form; // выводим новую форму
	} ?>
	
</div>