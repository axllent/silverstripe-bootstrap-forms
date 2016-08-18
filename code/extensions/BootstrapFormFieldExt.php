<?php
/**
 * Extention of FormField
 */

class BootstrapFormFieldExt extends Extension
{

    private static $is_admin_url = null;

    public function onBeforeRender($form_field)
    {
        /* We don't want this in the CMS */
        if ($this->isAdminURL()) {
            return;
        }

        /* Work out which template is set to be used */
        $form_template = $this->detectTemplate($form_field->getTemplates());

        if (in_array($form_template, array('TextField', 'DropdownField', 'TextareaField'))) {
            $form_field->addExtraClass('form-control');
        } elseif ($form_field == 'CheckboxSetField') {
            $form_field->setTemplate('BootstrapCheckboxSetField');
        } elseif ($form_field == 'OptionsetField') {
            $form_field->setTemplate('BootstrapOptionsetField');
        } elseif ($form_field == 'CheckboxField') {
            /* hardcoded layout in CheckboxField_holder.ss */
        } elseif ($form_field == 'FormAction') {
            if ($form_field->getAttribute('type') == 'submit') {
                $form_field->addExtraClass('btn btn-primary');
            } else {
                $form_field->addExtraClass('btn btn-default');
            }
        }
    }

    public function detectTemplate($templates)
    {
        $manifest = SS_TemplateLoader::instance()->getManifest();
        if (Config::inst()->get('SSViewer', 'theme_enabled')) {
            $theme = Config::inst()->get('SSViewer', 'theme');
        } else {
            $theme = null;
        }
        foreach ((array) $templates as $template) {
            if ($manifest->getCandidateTemplate($template, $theme)) {
                return $template;
            }
        }
        return false;
    }

    public function isAdminURL()
    {
        if (is_null(self::$is_admin_url)) {
            $req = Controller::curr()->getRequest()->getURL();
            self::$is_admin_url = preg_match('/^admin/i', $req) ? true : false;
        }
        return self::$is_admin_url;
    }
}
