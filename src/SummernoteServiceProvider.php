<?php

namespace Dcat\Admin;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Admin;
use Dcat\Admin\Form as BaseForm;

class SummernoteServiceProvider extends ServiceProvider
{
	protected $js = [
	    'dist/summernote.min.css'
    ];
	protected $css = [
		'dist/summernote.min.js',
	];

	public function register()
	{
		//
	}

	public function init()
	{
		parent::init();

        Admin::requireAssets('@mikha-dev.dcat-summernote');
		if ($lang = config('admin.locale')) {
			Admin::js("vendor/mikha-dev/summernote/dist/lang/summernote-{$lang}.js");
		}
        $this->loadViewsFrom(__DIR__.'/../resources/views', '@mikha-dev.dcat-summnernote');
        BaseForm::extend('summernote', Summernote::class);

	}

//	public function settingForm()
//	{
//		return new Setting($this);
//	}
}
