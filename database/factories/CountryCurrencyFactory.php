<?php

namespace Luchavez\SimpleCountriesCurrencies\Database\Factories;

// Model
use Luchavez\SimpleCountriesCurrencies\Models\CountryCurrency;
use Illuminate\Database\Eloquent\Factories\Factory;

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
