<?php

namespace Luchavez\SimpleCountriesCurrencies\Database\Factories;

// Model
use Luchavez\SimpleCountriesCurrencies\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

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
