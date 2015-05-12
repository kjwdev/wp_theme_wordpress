<?php
class MenuPage
{
	private $pageTitle;
	private $menuTitle;
	private $capability;
	private $menuSlug;
	private $function;
	private $iconUrl;
	private $position;
	private $msg = array();

	public function __construct($params)
	{
		if(empty($params){

		}
		$this->pageTitle = $params
	}

	public function msg($params)
	{
		if($params['type']=='error'){
			if($params['slug']=='params-empty'){
				$html = '<kjw-msg></kjw-msg>'
			}
		}
	}
}