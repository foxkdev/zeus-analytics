<?php
namespace Zeus\Analytics\Facades;
use Illuminate\Support\Facades\Facade;
/**
 * @see \Yish\LaravelFacebookAdsSdk\LaravelFacebookAdsSdk
 */
class ZeusAnalytics extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Zeus\Analytics\ZeusAnalytics::class;
    }
}
