<?php

namespace Wuwx\LaravelAdminAuditing;

use Encore\Admin\Extension;

class Auditing extends Extension
{
    public $name = 'auditing';

    //public $views = __DIR__.'/../resources/views';

    public $migrations = __DIR__ . '/../database/migrations';

    //public $assets = __DIR__.'/../resources/assets';

    public $menu = [
        'title' => 'Auditing',
        'path'  => 'auditing',
        'icon'  => 'fa-gears',
    ];

}
