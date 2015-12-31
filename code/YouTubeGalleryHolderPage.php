<?php

/**
 *@author nicolaas[at]sunnysideup.co.nz
 *@description: holds YouTubeGallery Pages
 *
 */
class YouTubeGalleryHolderPage extends Page
{

    public static $icon = "youtubegallery/images/treeicons/YouTubeGalleryHolderPage";

    public static $default_child = 'YouTubeGalleryPage';

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }
}

class YouTubeGalleryHolderPage_Controller extends Page_Controller
{

    public function init()
    {
        parent::init();
        Requirements::themedCSS("YouTubeGalleryHolderPage");
        Requirements::javascript(THIRDPARTY_DIR."/jquery/jquery.js");
        Requirements::javascript("youtubegallery/javascript/YouTubeGalleryHolderPage.js");
    }

    public function YouTubeGalleryPageChildren()
    {
        return DataObject::get("YouTubeGalleryPage", "ParentID = ".$this->ID);
    }
}
