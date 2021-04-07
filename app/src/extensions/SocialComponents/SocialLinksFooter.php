<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\FieldList;
use SilverStripe\SiteConfig\SiteConfig;

class SocialLinksFooter extends DataObject{
    private static $db = [
        'SocialLink' => 'Varchar',
        'SortOrder' => 'Int'
    ];

    private static $has_one = [
        'SocialLogo' => Image::class,
        'SiteConfigCustom' => SiteConfig::class
    ];

    
    private static $owns = [
        'SocialLogo'
    ];

    private static $default_sort = 'SortOrder';

    public function getCMSFields(){
        $fields = FieldList::create(
            FieldGroup::create(
                UploadField::create('SocialLogo','Logo'),
                TextField::create('SocialLink','Social Link')
            )
        );
        return $fields;
    }
}

?>