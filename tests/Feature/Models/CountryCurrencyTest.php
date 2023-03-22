<?php

namespace Luchavez\SimpleCountriesCurrencies\Feature\Models;

use Tests\TestCase;

/**
 * Class CountryCurrencyTest
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class CountryCurrencyTest extends TestCase
{
    /**
     * Example Test
     *
     * @test
     */
    public function example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
