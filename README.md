Bundle for use QuillJS WYSIWYG-editor in Symfony form
=====================================================

[QuillJS](https://quilljs.com) is a modern and powerful rich text editor. This bundle allows you to use this edistor in Symfony form textarea field.

## Installation

### Symfony flex

> coming soon

### Direct way

- install package `composer require creative/quilljs-bundle`
- add a bundle to you `config/bundles.php`:
    ```php
   return [
      // another bundles
      CreativeQuillJs\QuillJsBundle::class => ['all' => true],
   ];
   ```
- place a configuration file (see below) to you `config/packages`

## Configuration reference

```yaml
creative_quill_js:
  enabled: true
  theme: ~                # remove this string to use default 'snow' theme
  quill_js_source: ~      # remove this string to use js from CDN (https://cdn.quilljs.com/1.3.6/quill.js)
  quill_css_source: ~     # remove this string to use css from CDN (https://cdn.quilljs.com/1.3.6/quill.snow.css)
  upload_route: ~         # if you have override Quill to upload files (I mean, to not place images as base64 to text), set your route to upload files here. You can set the application route name or absolute url to this parameter (if you using CDN for images)
  upload_route_parameters:
    type: 'image'         # any parameters to upload route
  toolbar_options:        # QuillJS toolbar configuration (https://quilljs.com/docs/modules/toolbar/)
    - ['bold', 'italic', 'underline', 'strike']
    - ['blockquote', 'code-block']
    - [{'header': [2, 3, false]}]
    - [{'list': 'ordered'}, {'list': 'bullet'}]
    - [{'script': 'sub'}, {'script': 'super'}]
    - [{'indent': '-1'}, {'indent': '+1'}]
    - [{'direction': 'rtl'}]
    - [{'size': ['small', false, 'large', 'huge']}]
    - ['link', 'image', 'video']
    - ['clean']
    - [{'color': [], 'background': []}]
    - [{'font': []}]
    - [{'align': []}]
```

### Attention

If you want to use your own QuillJS instance (and source of it already loaded to page), set config parameters `quill_js_source` and `quill_css_source` to `null`. The template calls `const quill = new Quill` in JS block, and if `quill_js_source` and `quill_css_source` are nulls, it not tries to load assets with css/js.

## Contributing

Feel free to use this code, modify it, give it, sale it and do with it whatever you want.

## Testing

```shell script
composer install
vendor/bin/phpunit
```
