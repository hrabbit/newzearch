<?php

class Controller_Base extends Controller_Template 
{
	public $template = 'base/template';

	public function before()
	{
		parent::before();

		$assets['js']['top'] = array(
				'//code.jquery.com/jquery.js',
			);
		$assets['js']['bottom'] = array(
				'bootstrap.min.js',
			);
		$assets['css']['top'] = array(
				'bootstrap.min.css',
				'bootstrap-responsive.min.css',
			);
		
		\Asset::js($assets['js']['top'], array(), 'js_top');
		\Asset::js($assets['js']['bottom'], array(), 'js_bottom');
		\Asset::css($assets['css']['top'], array(), 'css_top');

		$this->template->set_global('newzearch', \Model_SystemSetting::getAll());
		// Set a global variable so views can use it
		$this->template->set_global('session', \Session::get());
	}

}