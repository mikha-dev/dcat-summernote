<?php

namespace Dcat\Admin;

use Dcat\Admin\Form\Field;
use Dcat\Admin\Support\Helper;
use Dcat\Admin\Support\JavaScript;

class Summernote extends Field
{
    protected $view = 'mikha-dev.dcat-summernote::summernote';

    public function render()
    {
        $name = $this->formatName($this->column);

        $config = (array) Summernote::config('config');

        $config = json_encode(array_merge([
            'height' => 300,
        ], $config));

        $this->script = <<<EOT
        (function(){
            var configs = $config;

            if(configs['imageUploadServer']){
                configs.callbacks = configs.callbacks || {};
                configs.callbacks.onImageUpload = function(images){
                    window.laravelAdminSummernoteImageUploader($('#{$this->id}'),images[0],configs.imageUploadServer,configs.imageUploadName);
                };

            }

            $('#{$this->id}').summernote(configs);

            $('#{$this->id}').on("summernote.change", function (e) {
                var html = $('#{$this->id}').summernote('code');
                $('input[name="{$name}"]').val(html);
            });
        })();
EOT;
    
        return parent::render();
    }





}
