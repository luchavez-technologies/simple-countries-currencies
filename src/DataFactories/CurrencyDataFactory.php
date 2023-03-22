<?php

namespace Luchavez\SimpleCountriesCurrencies\DataFactories;

use Luchavez\SimpleCountriesCurrencies\Models\Currency;
use Luchavez\StarterKit\Abstracts\BaseDataFactory;
// Model
use Illuminate\Database\Eloquent\Builder;

/**
 * Class CurrencyDataFactory
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class CurrencyDataFactory extends BaseDataFactory
{
    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $code;

    /**
     * @var string
     */
    public string $symbol;

    /**
     * @return array
     */
    public function getUniqueKeys(): array
    {
        return [
            'code',
        ];
    }

    /**
     * @return Builder
     *
     * @example User::query()
     */
    public function getBuilder(): Builder
    {
        return Currency::query();
    }
}
