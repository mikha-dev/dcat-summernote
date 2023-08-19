<?php

namespace Dcat\Admin;

use Dcat\Admin\Form\Field;
use Dcat\Admin\Support\JavaScript;

class Summernote extends Field
{
    protected $view = 'mikha-dev.dcat-summernote::summernote';

    protected $options  = [
        'height' => 400
    ];    

    protected function formatOptions()
    {
        return $this->options;
    }

    public function height(int $height)
    {
        return $this->mergeOptions(['height' => $height]);
    }

    public function render()
    {
        $this->addVariables([
            'options' => JavaScript::format($this->formatOptions())
        ]);  
        return parent::render();
    }
}
