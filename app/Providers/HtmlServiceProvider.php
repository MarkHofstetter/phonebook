<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
#'Form' => Collective\Html\FormFacade::class,
# use Illuminate\Html\FormFacade;


class HtmlServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
       \Form::component('bsText', 'components.form.text',   ['name', 'label' => null, 'value' => null, 'attributes' => []]);
       \Form::component('bsPassword', 'components.form.password', ['name', 'label' => null, 'attributes' => []]);
       \Form::component('bsTextarea', 'components.form.textarea',   ['name', 'label' => null, 'value' => null, 'attributes' => []]);
       \Form::component('bsSubmit', 'components.form.submit', ['label' => null, ]);
       \Form::component('bsSelect', 'components.form.select', ['name', 'default', 'label' => null, 'data' => []]);
       \Form::component('bsRadio', 'components.form.radio', ['name', 'default', 'label' => null, 'values' => []]);
       \Form::component('bsFile',   'components.form.file',   ['name', 'label' => null, 'filename' => null, 'attributes' => []]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
