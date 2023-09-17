<?php

namespace Luchavez\SimpleCountriesCurrencies\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Luchavez\SimpleCountriesCurrencies\Models\CountryCurrency;

/**
 * Class CountryCurrency
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class CountryCurrencyFactory extends Factory
{
    protected $model = CountryCurrency::class;

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
