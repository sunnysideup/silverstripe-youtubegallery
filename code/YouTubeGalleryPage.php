<?php
/**
 *@author nicolaas [at] sunnysideup.co.nz
 *@description: This page holds one youtube video
 *@Link: http://code.google.com/apis/youtube/player_parameters.html
 *
 */
class YouTubeGalleryPage extends Page
{
    public static $icon = "youtubegallery/images/treeicons/YouTubeGalleryPage";

    public static $default_parent = 'YouTubeGalleryHolder';

    public static $allowed_children = "none";

    public static $db = array(
        "YouTubeVideoCode" => "Varchar(255)"
    );

    protected static $youtube_video_url = 'http://www.youtube.com/watch?v=';
    public function set_youtube_video_url($v)
    {
        self::$youtube_video_url = $v;
    }
    public function get_youtube_video_url()
    {
        return self::$youtube_video_url;
    }

    protected static $youtube_embed_url = 'http://www.youtube.com/v/';
    public function set_youtube_embed_url($v)
    {
        self::$youtube_embed_url  = $v;
    }
    public function get_youtube_embed_url()
    {
        return self::$youtube_embed_url ;
    }

    protected static $player_options = array();
    public function set_player_options($v)
    {
        self::$player_options = $v;
    }
    public function get_player_options()
    {
        return self::$player_options;
    }

    protected static $player_width = 425;
    public function set_player_width($v)
    {
        self::$player_width = $v;
    }
    public function get_player_width()
    {
        return self::$player_width;
    }

    protected static $player_height = 344;
    public function set_player_height($v)
    {
        self::$player_height = $v;
    }
    public function get_player_height()
    {
        return self::$player_height;
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab("Root.Content.VideoInfo", new TextField("YouTubeVideoCode", "You Tube Video Code or URL ( e.g. 5v5ViXUeofA or http://www.youtube.com/watch?v=5v5ViXUeofA )"));
        return $fields;
    }

    public function onBeforeWrite()
    {
        parent::onBeforeWrite();
        $this->YouTubeVideoCode = str_replace(self::get_youtube_video_url(), "", $this->YouTubeVideoCode);
    }

    public function FlashObjectData()
    {
        if (!class_exists("FlashObject")) {
            USER_ERROR("You have not installed the flash module, please see README for more information", E_USER_WARNING);
        }
        $file = self::get_youtube_embed_url().$this->YouTubeVideoCode."?";
        $array = self::get_player_options();
        foreach ($array as $key => $value) {
            $file .= "&amp;".urlencode($key)."=".urlencode($value);
        }
        FlashObject::set_use_dynamic_insert(false);
        $obj = new FlashObject();
        return $obj->CreateFlashObject(
            $Title = $this->Title,
            $FlashFileDivID = "YouTubeVideo".$this->URLSegment,
            $FlashFilename = $file,
            $AlternativeContent = '',
            $Width = self::get_player_width(), //425
            $Height = self::get_player_height(), //344,
            $FlashVersion = '9.0.0',
            $ParamArray = self::get_player_options()
        );
    }

    public function HasFlashModule()
    {
        return class_exists("FlashObject");
    }

    public function IFrameObjectData()
    {
        return new ArrayData(array(
            "Title" => $this->Title,
            "Width" => self::get_player_width(), //425
            "Height" => self::get_player_height(), //344,
            "Code" => $this->YouTubeVideoCode //344,
        ));
    }
}

class YouTubeGalleryPage_Controller extends Page_Controller
{
    public function init()
    {
        parent::init();
    }
}
