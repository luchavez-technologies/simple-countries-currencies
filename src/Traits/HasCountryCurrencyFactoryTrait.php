<?php

namespace Luchavez\SimpleCountriesCurrencies\Traits;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Luchavez\SimpleCountriesCurrencies\Database\Factories\CountryCurrencyFactory;

/**
 * Trait HasCountryCurrencyFactoryTrait
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
trait HasCountryCurrencyFactoryTrait
{
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return CountryCurrencyFactory::new();
    }
}
