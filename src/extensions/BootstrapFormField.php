<?php
/**
 * Extention of FormField
 */
namespace Axllent\BootstrapForms;

use SilverStripe\Control\Controller;
use SilverStripe\Core\Extension;

class BootstrapFormField extends Extension
{

    private static $is_admin_url = null;

    public function onBeforeRender($form_field)
    {
        /* We don't want this in the CMS */
        if ($this->isAdminURL()) {
            return;
        }

        $checkboxsetfield   = 'SilverStripe\\Forms\\CheckboxSetField';
        $optionsetfield     = 'SilverStripe\\Forms\\OptionsetField';
        $checkboxfield      = 'SilverStripe\\Forms\\CheckboxField';
        $textfield          = 'SilverStripe\\Forms\\TextField';
        $dropdownfield      = 'SilverStripe\\Forms\\DropdownField';
        $textareafield      = 'SilverStripe\\Forms\\TextareaField';
        $formaction         = 'SilverStripe\\Forms\\FormAction';

        if (!$form_field->getTemplate()) {
            if ($form_field instanceof $checkboxsetfield) {
                $form_field->setTemplate('Forms/BootstrapCheckboxSetField');
            } elseif ($form_field instanceof $optionsetfield) {
                $form_field->setTemplate('Forms/BootstrapOptionsetField');
            }
        }

        if ($form_field instanceof $checkboxfield) {
            // We overwrite default CheckboxField_holder.ss
        } elseif ($form_field instanceof $textfield ||
            $form_field instanceof $dropdownfield ||
            $form_field instanceof $textareafield
        ) {
            $form_field->addExtraClass('form-control');
        } elseif ($form_field instanceof $formaction) {
            if ($form_field->getAttribute('type') == 'submit') {
                $form_field->addExtraClass('btn btn-primary');
            } else {
                $form_field->addExtraClass('btn btn-default btn-secondary');
            }
        }
    }

    public function isAdminURL()
    {
        if (is_null(self::$is_admin_url)) {
            $req = Controller::curr()->getRequest()->getURL();
            self::$is_admin_url = preg_match('/^admin\//i', $req) ? true : false;
        }
        return self::$is_admin_url;
    }
}
