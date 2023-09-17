<?php

namespace Luchavez\SimpleCountriesCurrencies\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Luchavez\SimpleCountriesCurrencies\Models\Country;

/**
 * Class Country
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class CountryFactory extends Factory
{
    protected $model = Country::class;

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
