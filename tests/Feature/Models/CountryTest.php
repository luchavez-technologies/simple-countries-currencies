<?php

namespace Luchavez\SimpleCountriesCurrencies\Feature\Models;

use Tests\TestCase;

/**
 * Class CountryTest
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class CountryTest extends TestCase
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
