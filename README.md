# Add CSS classes to Silverstripe forms to play nicer with Twitter Bootstrap

An extension to add CSS classes to Silverstripe forms to "play nicer" with Twitter Bootstrap, mostly by adding the
`form-control` bootstrap CSS classes to form elements (input, dropdown, submit etc).

This is designed to be a plug-and-play extension, without requiring you to change your existing forms on your website.
This includes all forms such as login forms, password reset forms, as well as any other form you have created.

It extends `FormField` to try provide a transparent "manipulation" of the rendered form fields, adding some bootstrap CSS
to the rendered fields. It does not produce [bootstrap-specific html](http://getbootstrap.com/css/#forms) for your forms.

`FormField` unfortunately only has a `$this->extend('onBeforeRender', $this);` in `Field` that allows manupulation of the
field itself, and not the parent field_holder. This allows only a very limited amount of flexibility, and prevents an
extension from changing the field_holder.

Form submit buttons get a `btn btn-primary` class added, and any other buttons get a `btn btn-default` class added.

Forms will still need some additional CSS styling (to set spacing) as the form's field_holders cannot be modified to the
limitations mentioned above.


## Features

It adds the `form-control` CSS class to all front-end:
- TextField (and extended classes)
- TextAreaField
- DropdownField

It renders CheckboxSetField & OptionsetField with different field templates (see templates/Forms).

It does **not**:
- Modify field holders (`onBeforeRender()` does not allow that)
- Support FieldGroup (you'll need to use CSS to do that)
- Apply bootstrap-specific CSS classes to form messages


## Requirements

- SilverStripe ^4


## Installation

### Install via Composer

You can install it via composer with `composer require axllent/silverstripe-bootstrap-forms`

## Basic usage

Simply install (and flush), ass the checkbox CSS to your styles and you're good to go.
