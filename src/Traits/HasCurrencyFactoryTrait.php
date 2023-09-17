<?php

namespace Luchavez\SimpleCountriesCurrencies\Traits;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Luchavez\SimpleCountriesCurrencies\Database\Factories\CurrencyFactory;

/**
 * Trait HasCurrencyFactoryTrait
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
trait HasCurrencyFactoryTrait
{
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return CurrencyFactory::new();
    }
}
