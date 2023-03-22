<?php

namespace Luchavez\SimpleCountriesCurrencies\DataFactories;

use Luchavez\SimpleCountriesCurrencies\Models\Country;
use Luchavez\SimpleCountriesCurrencies\Models\Currency;
use Luchavez\StarterKit\Abstracts\BaseDataFactory;
// Model
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CountryDataFactory
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class CountryDataFactory extends BaseDataFactory
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
     * @var string|null
     */
    public ?string $flag;

    /**
     * @var array
     */
    public array $calling_codes = [];

    /**
     * @var array
     */
    public array $languages = [];

    /**
     * @var array
     */
    public array $tld = [];

    /**
     * @var Currency[]
     */
    public array $currencies = [];

    /**
     * @return array
     */
    public function getUniqueKeys(): array
    {
        return [
            'code',
        ];
    }

    public function getExceptKeys(): array
    {
        return [
            'currencies',
        ];
    }

    /**
     * @param  array|CurrencyDataFactory[]  $currencies
     * @return void
     */
    public function setCurrencies(array $currencies): void
    {
        $currencies = collect($currencies);

        if ($currencies->first() instanceof CurrencyDataFactory) {
            $this->currencies = $currencies->toArray();
        } else {
            $this->currencies = $currencies->map(fn ($currency) => CurrencyDataFactory::from($currency))->toArray();
        }
    }

    /**
     * @param  CurrencyDataFactory|array  $currency
     * @return void
     */
    public function addCurrency(CurrencyDataFactory|array $currency): void
    {
        $this->currencies[] = $currency instanceof CurrencyDataFactory ? $currency : CurrencyDataFactory::from($currency);
    }

    /**
     * @return Builder
     *
     * @example User::query()
     */
    public function getBuilder(): Builder
    {
        return Country::query();
    }

    /**
     * @param  mixed  $data
     * @param  string|null  $key
     * @return Model|Builder|null
     */
    public function firstOrCreate(mixed $data = [], ?string $key = null): Model|Builder|null
    {
        $country = parent::firstOrCreate($data, $key);

        $currencies = collect($this->currencies)->map(fn (CurrencyDataFactory $factory) => $factory->firstOrCreate())->pluck('id');
        $country->currencies()->sync($currencies);

        return $country;
    }
}
