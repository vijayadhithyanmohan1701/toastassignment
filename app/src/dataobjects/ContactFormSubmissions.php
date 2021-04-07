<?php
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;

class ContactFormSubmission extends DataObject {
    private static $db = [
        'Name'              => 'Varchar(255)',
        'Email'             => 'Varchar(255)',
        'Company'             => 'Varchar(255)'
    ];
    private static $summary_fields = [
        'Name',
        'Company',
        'Email'
    ];

    private static $searchable_fields = [
        'Name',
        'Email'
     ];

    public function canView($member = null) {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canEdit($member = null) {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canDelete($member = null) {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canCreate($member = null, $context = []) {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }
}