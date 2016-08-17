# Add bootstrap classes to all form fields

An extension to add CSS classes to Silverstripe forms to play nicer with Twitter Bootstrap.

This is designed to be a plug-and-play extension, without requiring you to change your existing forms on your website.
This includes all forms such as login forms, password reset forms, as well as any other form you have created.

It extends `FormField` to try provide a transparent "manipulation" of the rendered form fields, adding some bootstrap CSS
to the rendered fields. It does not produce [bootstrap-specific html](http://getbootstrap.com/css/#forms) for your forms.

`FormField` unfortunately only has a `$this->extend('onBeforeRender', $this);` in `Field` that allows manupulation of the
field itself, and not the containing field_holder. This allows only a very limited amount of flexibility, and prevents an
extension from changing the field_holder. Due to this, the extension has to override one global field_holder template
(`CheckboxField_holder.ss`) which does mean it changes the code in the CMS for `CheckboxField` fields.

Both `CheckboxSetField` & `OptionsetField` fields get a custom template set to make them more bootstrap-friendly, other fields
simply get css classes applied.

Form submit buttons get a `btn btn-primary` class added, and any other buttons get a `btn btn-default` class added.

Forms will still need some additional CSS styling (to set spacing) as the form's field_holders cannot be modified to the
limitations mentioned above.

## Requirements

- SilverStripe 3+

## Installation

### Install via Composer

You can install it via composer with `composer require axllent/silverstripe-bootstrap-forms`

### Manually install

Download the latest release from [GitHub](https://github.com/axllent/silverstripe-bootstrap-forms/releases/latest) and extract
into your web root.

## Basic usage

Simply install (and flush) and you're good to go.
