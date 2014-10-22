# Kuorinka

Theme check: accessibility-ready, right to left support, translation-ready, [Schema.org](http://schema.org) microdata, all the WordPress' built-in theme features and some more. Check.

## About Kuorinka

It's a small lake and village in eastern part of Finland where I crew up. It's beautiful. 

## Copyright and License

The following resources are not included with the theme but are external resources linked to within the theme.

* [Source Sans Pro](https://www.google.com/fonts/specimen/Source+Sans+Pro) by Paul D. Hunt - Licensed under the [SIL Open Font License, version 1.1](http://scripts.sil.org/OFL).
* [Roboto Condensed](http://www.google.com/fonts/specimen/Roboto+Condensed) by Christian Robertson - Licensed under the [Apache License, version 2.0](http://www.apache.org/licenses/LICENSE-2.0.html).

The following resources are included within the theme package.

* [Genericons](http://genericons.com/) by Joen Asmussen - Licensed under the [GPL, version 2 or later](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html).
* [Responsive Nav](http://responsive-nav.com/) by Viljami Salminen - Licensed under the [MIT License](http://opensource.org/licenses/MIT).
* [FluidVids](https://github.com/toddmotto/fluidvids) by Todd Motto - Licensed under the [MIT license](http://opensource.org/licenses/MIT).

All other resources and theme elements are licensed under the [GNU GPL](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html), version 2 or later.

2014 &copy; [Sami Keijonen](https://foxland.fi).

## Changelog

### Version 1.0.8

* Remove tx.exe file.

### Version 1.0.7

* Update Genericons to version 3.2.
* Style support for HTML5 forms.
* Add alt text to header image.
* Add Dutch translation.
* Add schema.org markup in front page template.

### Version 1.0.6

* Replace Fitvids with Fluidvids.
* Add placeholder text color for better accessibility.
* Add role and aria-label in breadcrumb for better accessibility.
* Show portfolio menu only if Custom Content Portfolio Plugin is active.


### Version 1.0.5

* Add fr_FR and ro_RO translation files.
* Better handling for box-sizing. See update from [Paul Irish](http://www.paulirish.com/2012/box-sizing-border-box-ftw/). 

### Version 1.0.4

* Add pt_BR translation files. Credit [Thiago Senna](http://thremes.com.br/portfolio/temas/).
* Add Genericons in editor styles.

### Version 1.0.3

* Rewrite header styles in front end that actually works.
* Add `custom-background` body class if background is not set so that default background works.
* Move admin header styles to `css/admin-custom-header.css file`.

### Version 1.0.2

* Add front page content.
* Add checks and hooks in front page template.
* Move Schema.org related stuff mostly in the same file (inc/schema.org).

### Version 1.0.1

* Fix wrong textdomain.
* Add hybrid_attachment_is_video() and hybrid_attachment_is_audio() functions for schema.org check.
* Use admin_print_styles-appearance_page_custom-header hook to add theme fonts in admin header page.
* Don't import theme fonts in editor-style.css but add theme in array of add_editor_style() function.

### Version 1.0.0

* Everything's new!