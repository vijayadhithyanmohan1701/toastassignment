<?php
use SilverStripe\Admin\ModelAdmin;

class ContactsModelAdmin extends ModelAdmin {
    private static $managed_models = [
        ContactFormSubmission::class
    ];

    private static $url_segment = 'contacts';

    private static $menu_title = 'Contact Submissions';
}