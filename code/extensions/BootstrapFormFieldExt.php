<?php

class BootstrapFormFieldExt extends Extension
{
    public function onBeforeRender()
    {
        if ($css = $this->detectStyle()) {
            $this->owner->addExtraClass($css);
        }
    }

    public function detectStyle()
    {
        $type = $this->owner->getAttribute('type');
        $class = $this->owner->getAttribute('class');

        if ($class == '' || $type == 'checkbox') {
            return false; // possibly a header
        } elseif ($type == 'submit') {
            return 'btn btn-primary';
        }

        return 'form-control';
    }
}
