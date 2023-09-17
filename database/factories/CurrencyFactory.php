<?php

namespace Luchavez\SimpleCountriesCurrencies\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Luchavez\SimpleCountriesCurrencies\Models\Currency;

/**
 * Class Currency
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class CurrencyFactory extends Factory
{
    protected $model = Currency::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
}
