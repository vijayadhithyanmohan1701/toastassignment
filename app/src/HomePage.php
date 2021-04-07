<?php

use SilverStripe\Forms\TextField;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class HomePage extends Page{

    private static $db = [
        'Title' => 'Varchar',
        'BoldCaption' => 'Varchar',
        'CaptionHighlight' => 'Varchar',
        'ReverseImage' => 'Boolean'
    ];

    private static $has_one = [
        'ContainerImage' => Image::class
    ];

    private static $owns = [
        'ContainerImage'
    ];

    private static $has_many = [
        'ImageContentBlocks' => 'ImageContentBlock'
    ];

    public function getCMSFields(){
        $fields = parent::getCMSFields();
        
        $config = GridFieldConfig_RecordEditor::create();
        $config->addComponent(new GridFieldSortableRows('SortOrder'));

        $fields->addFieldsToTab('Root.ContentBlocks', GridField::create(
            'ImageContentBlocks',
            'Content Blocks',
            $this->ImageContentBlocks(),
            $config
        ));
        return $fields;
    }
}