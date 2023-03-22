<?php

namespace Luchavez\SimpleCountriesCurrencies\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class SimpleCountriesCurrencies
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 *
 * @see \Luchavez\SimpleCountriesCurrencies\Services\SimpleCountriesCurrencies
 */
class SimpleCountriesCurrencies extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'simple-countries-currencies';
    }
}
