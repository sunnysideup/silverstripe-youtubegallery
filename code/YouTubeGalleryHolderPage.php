<?php

/**
 *@author nicolaas[at]sunnysideup.co.nz
 *@description: holds YouTubeGallery Pages
 *
 */
class YouTubeGalleryHolderPage extends Page {

	static $icon = "youtubegallery/images/treeicons/YouTubeGalleryHolderPage";

	static $default_child = 'YouTubeGalleryPage';

	function getCMSFields() {
		$fields = parent::getCMSFields();
		return $fields;
	}

}

class YouTubeGalleryHolderPage_Controller extends Page_Controller {

	function init() {
		parent::init();
		Requirements::themedCSS("YouTubeGalleryHolderPage");
		Requirements::javascript(THIRDPARTY_DIR."/jquery/jquery.js");
		Requirements::javascript("youtubegallery/javascript/YouTubeGalleryHolderPage.js");
	}

	function YouTubeGalleryPageChildren() {
		return DataObject::get("YouTubeGalleryPage", "ParentID = ".$this->ID);
	}


}

