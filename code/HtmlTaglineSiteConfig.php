<?php

class HtmlTaglineSiteConfig extends DataExtension {


	static $db = array(
		'HTMLTagLine' => 'HTMLText'
	);


	function updateCMSFields(FieldList $fields){
		$fields->removeByName('Tagline');
		$fields->addFieldToTab("Root.Main", $h1=new HTMLEditorField('HTMLTagLine', _t('SiteConfig.SITETAGLINE', "Site Tagline/Slogan")),'Theme');	
		$h1->setRows(4);
	}

	public function populateDefaults()
	{
		$this->HTMLTagLine = _t('SiteConfig.TAGLINEDEFAULT', "<p>your tagline here</p>");
		
		// Allow these defaults to be overridden
		parent::populateDefaults();
	}
}