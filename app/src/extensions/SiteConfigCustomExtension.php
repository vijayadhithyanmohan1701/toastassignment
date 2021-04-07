<?php

use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class SiteConfigCustomExtension extends DataExtension{
    private static $db = [
        'Phone' => 'Varchar',
        'Copyrights' => 'HTMLText',
        'HeaderActionText' => 'Varchar',
        'HeaderActionURL' => 'Varchar',
        'SliderTitle' => 'Varchar',
        'SliderBoldCaption' => 'Varchar',
        'SliderCaptionHighlight' => 'Varchar',
        'SliderActionText' => 'Varchar',
        'SliderActionURL' => 'Varchar',
        'AdminEmail' => 'Varchar'
    ];

    private static $has_one = [
        'Logo' => Image::class,
        'SliderImageA' => Image::class,
        'SliderImageB' => Image::class
    ];

    private static $owns = [
        'Logo',
        'SliderImageA',
        'SliderImageB'
    ];

    private static $has_many = [
        'SocialLinks' => SocialLinksFooter::class
    ];

    private static $table_name = 'CustomGlobalSettings';

    public function updateCMSFields(FieldList $fields){
        
        $config = GridFieldConfig_RecordEditor::create();
        $config->addComponent(new GridFieldSortableRows('SortOrder'));

        $fields->addFieldsToTab('Root.Main', array(
            EmailField::create('AdminEmail', 'Admin Email')
        ));

        $fields->addFieldsToTab('Root.Header', array(
            UploadField::create('Logo','Logo'),
            TextField::create('HeaderActionText', 'Action Text'),
            TextField::create('HeaderActionURL', 'Action Link')
        ));

        $fields->addFieldsToTab('Root.Slider', array(
            TextField::create('SliderTitle', 'Slider Title'),
            TextField::create('SliderBoldCaption', 'Caption'),
            TextField::create('SliderCaptionHighlight', 'Caption Highlight'),
            UploadField::create('SliderImageA','Slider Image Big'),
            UploadField::create('SliderImageB','Slider Image Slider'),
            FieldGroup::create('Slider Button', array(
                    TextField::create('SliderActionText', 'Slider Action Text'),
                    TextField::create('SliderActionURL', 'Slider Action Link')
                )
            )
        ));

        $fields->addFieldsToTab('Root.Footer', array(
            TextField::create('Copyrights', 'Copyrights'),
            TextField::create('Phone', 'Phone'),
            GridField::create(
                'SocialLinks',
                'Social Links',
                $this->owner->SocialLinks(),
                $config
            )
        ));
    }
}

?>