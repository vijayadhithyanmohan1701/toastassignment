<?php

use SilverStripe\Forms\TextField;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataObject;

class ImageContentBlock extends DataObject{
    private static $db = [
        'Title' => 'Varchar',
        'BoldCaption' => 'Varchar',
        'CaptionHighlight' => 'Varchar',
        'ReverseImage' => 'Boolean',
        'FullWidth' => 'Boolean',
        'Content' => 'HTMLText',
        'SortOrder' => 'Int'
    ];

    private static $has_one = [
        'ContainerImage' => Image::class,
        'Page'  =>   'Page'
    ];
    private static $owns = [
        'ContainerImage'
    ];

    private static $summary_fields = [
        'Title' => 'Title',
        'Captions' => 'Captions'
    ];

    private static $default_sort = 'SortOrder';

    public function getCaptions(){
        return $this->BoldCaption ? $this->BoldCaption : '' . $this->CaptionHighlight ? $this->CaptionHighlight : '';
    }

    public function getCMSFields(){
        $fields = FieldList::create(
            TextField::create('Title', 'Title'),
            TextField::create('BoldCaption', 'Caption'),
            TextField::create('CaptionHighlight', 'Caption Highlight'),
            CheckboxField::create('FullWidth','Make container full width'),
            FieldGroup::create('Image Upload',
                UploadField::create('ContainerImage','Container Image'),
                CheckboxField::create('ReverseImage','Reverse Image and content areas')
            ),
            HTMLEditorField::create('Content', 'Content')
        );
        return $fields;
    }
}