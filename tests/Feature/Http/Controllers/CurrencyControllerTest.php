<?php

namespace Luchavez\SimpleCountriesCurrencies\Feature\Http\Controllers;

use Tests\TestCase;

/**
 * Class CurrencyControllerTest
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class CurrencyControllerTest extends TestCase
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
