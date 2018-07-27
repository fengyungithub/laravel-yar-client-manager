<?php
namespace Thiagof\LaravelRPC;

use Illuminate\Support\Facades\Facade;

class YarClientFacade extends Facade {

    protected static function getFacadeAccessor() { return 'YarClient'; }

}
