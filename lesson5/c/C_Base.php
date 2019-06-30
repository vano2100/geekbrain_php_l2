<?php
//
// Базовый контроллер сайта.
//
abstract class C_Base extends C_Controller
{
	protected $title;		// заголовок страницы
	protected $content;		// содержание страницы


	
	
	protected function before()
	{
		$this->title = 'Название сайта';
		$this->content = '';
		if (isset($_SESSION['history'])){
			if (count($_SESSION['history']) > 5){
				array_shift($_SESSION['history']);
			}
			$_SESSION['history'][] .= $_SERVER['QUERY_STRING'];
		} else {
			$_SESSION['history'] = [];
			$_SESSION['history'][] .= $_SERVER['QUERY_STRING'];
		}

	}
	
	//
	// Генерация базового шаблонаы
	//	
	public function render()
	{
		$vars = array('title' => $this->title, 'content' => $this->content);	
		$page = $this->Template('v/v_main.php', $vars);				
		echo $page;
	}	
}
