<?php

/**
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */

use Luchavez\SimpleCountriesCurrencies\Services\SimpleCountriesCurrencies;

if (! function_exists('simpleCountriesCurrencies')) {
    /**
     * @return SimpleCountriesCurrencies
     */
    function simpleCountriesCurrencies(): SimpleCountriesCurrencies
    {
        return resolve('simple-countries-currencies');
    }
}

if (! function_exists('simple_countries_currencies')) {
    /**
     * @return SimpleCountriesCurrencies
     */
    function simple_countries_currencies(): SimpleCountriesCurrencies
    {
        return simpleCountriesCurrencies();
    }
}
