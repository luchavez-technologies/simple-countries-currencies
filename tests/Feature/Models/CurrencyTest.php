<?php

namespace Luchavez\SimpleCountriesCurrencies\Feature\Models;

use Tests\TestCase;

/**
 * Class CurrencyTest
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class CurrencyTest extends TestCase
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
