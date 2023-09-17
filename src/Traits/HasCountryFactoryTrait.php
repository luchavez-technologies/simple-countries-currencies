<?php

namespace Luchavez\SimpleCountriesCurrencies\Traits;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Luchavez\SimpleCountriesCurrencies\Database\Factories\CountryFactory;

/**
 * Trait HasCountryFactoryTrait
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
trait HasCountryFactoryTrait
{
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return CountryFactory::new();
    }
}
