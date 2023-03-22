<?php

namespace Luchavez\SimpleCountriesCurrencies\Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Class CountryCurrencySeeder
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class CountryCurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        simpleCountriesCurrencies()->syncCountriesCurrencies(true);
    }
}
