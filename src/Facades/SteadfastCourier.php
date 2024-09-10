<?php

namespace Sujan7a\SteadfastCourier\Facades;

use Illuminate\Support\Facades\Facade;

class SteadfastCourier extends Facade
{
  protected static function getFacadeAccessor()
  {
    return 'steadfast-courier';
  }
}