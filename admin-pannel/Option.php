<?php

class Option
{
	private $ressource = array();
	
	public function hooks()
	{
		add_action('admin_menu', array(&$this, 'createMennu' ));
	}

	public function createMenu()
	{
		add_menu_page('Kjw thème', 'Kjw thème', 'activate_plugins', 'my-pannel', 'render_pannel', null, 81);
		add_submenu_page('my-pannel','Réseaux sociaux', 'Réseaux Sociaux', 'activate_plugins', 'my-sub-pannel-01', 'render_pannel');
	}
}