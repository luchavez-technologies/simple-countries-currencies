<?php

namespace Luchavez\SimpleCountriesCurrencies\Abstracts;

use Luchavez\SimpleCountriesCurrencies\DataFactories\CountryDataFactory;

/**
 * Class BaseCountriesCurrencies
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
abstract class BaseCountriesCurrenciesProvider
{
    /**
     * @return CountryDataFactory[]
     */
    abstract public function getCountriesCurrencies(): array;
}
