<?php

namespace Luchavez\SimpleCountriesCurrencies\Feature\Http\Controllers;

use Tests\TestCase;

/**
 * Class CountryControllerTest
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class CountryControllerTest extends TestCase
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
