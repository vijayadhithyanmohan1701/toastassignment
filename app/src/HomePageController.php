<?php

use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Control\Email\Email;
use SilverStripe\Control\Session;
use SilverStripe\View\ArrayData;
use SilverStripe\Core\Config\Config;
use Silverstripe\SiteConfig\SiteConfig;

class HomePageController extends PageController{

    private static $allowed_actions = [
        'ContactForm',
        'doSubmitForm',
        'SessionSuccess'
    ];

    public function ContactForm()
    {
        $fields = FieldList::create(
            TextField::create('Name', '')->addExtraClass('formfield-50')->setAttribute('placeholder', 'Name'),
            EmailField::create('Email', '')->addExtraClass('formfield-50')->setAttribute('placeholder', 'Email'),
            TextField::create('Company', '')->addExtraClass('formfield-100')->setAttribute('placeholder', 'Company')
        );

        $actions = FieldList::create(
            FormAction::create('doSubmitForm', 'Submit')
        );
        $form = Form::create($this, 'ContactForm', $fields, $actions);
        return $form;
    }

    public function doSubmitForm($data, $form, $request)
    {
        $email = new Email();

        $config = SiteConfig::current_site_config();
        $admin_email = $config->AdminEmail;

        /************SET EMAIL IN mysite.yml**************/
        //$admin_email = Config::inst()->get('CustomConfig', 'custom_admin_email')[0];
        

        $email->setTo($admin_email); 
        $email->setFrom($data['Email']);//Might not work on local server 
                                        //as sending authority needs to be set for the corresponding email.
                                        //Setup my personal email as SMTP for testing
        $email->setSubject("Contact Message from {$data["Name"]}"); 
        $subject = 'Contact form submission';
        $messageBody = "
            <p>A new contact submission has been made. The details are as follows.</p>
            <table>
                <tr>
                    <td><strong>Name:</strong></td>  
                    <td>{$data['Name']}</td>              
                </tr>
                <tr>
                    <td><strong>Name:</strong></td>  
                    <td>{$data['Email']}</td>              
                </tr>
                <tr>
                    <td><strong>Company:</strong></td>  
                    <td>{$data['Company']}</td>              
                </tr>
            </table>
        "; 
        $email->setBody($messageBody); 
        $email->send();

        $submission = ContactFormSubmission::create();
        $form->saveInto($submission);
        $submission->write();
        $session = $this->getRequest()->getSession();
        $session->set('ContactSaved', 'Success');
        return $this->redirect('/toast/#contact');
    }
    public function SessionSuccess(){
        $session = $this->getRequest()->getSession();
        if($session->get('ContactSaved') == 'Success'){
            $session->clear('ContactSaved');

            return new ArrayData(array(
                'Message' => 'Your Contact information have been saved successfully. We will get in touch shortly.',
                'Status' => 'Success'
            ));
        }
    }


}