<?php

namespace Luchavez\SimpleCountriesCurrencies\Services;

use Illuminate\Support\Collection;
use Luchavez\SimpleCountriesCurrencies\Abstracts\BaseCountriesCurrenciesProvider;
use Luchavez\SimpleCountriesCurrencies\CountriesCurrenciesProvider\PragmaRXCountriesCurrenciesProvider;
use Luchavez\SimpleCountriesCurrencies\DataFactories\CountryDataFactory;
use Luchavez\StarterKit\Traits\HasTaggableCacheTrait;

/**
 * Class SimpleCountriesCurrencies
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class SimpleCountriesCurrencies
{
    use HasTaggableCacheTrait;

    /**
     * @var BaseCountriesCurrenciesProvider
     */
    protected BaseCountriesCurrenciesProvider $countriesCurrenciesProvider;

    public function __construct()
    {
        $this->countriesCurrenciesProvider = new PragmaRXCountriesCurrenciesProvider();
    }

    /**
     * @return string
     */
    public function getMainTag(): string
    {
        return 'countries_currencies';
    }

    /**
     * @param  BaseCountriesCurrenciesProvider  $countriesCurrenciesProvider
     */
    public function setCountriesCurrenciesProvider(BaseCountriesCurrenciesProvider $countriesCurrenciesProvider): void
    {
        $this->countriesCurrenciesProvider = $countriesCurrenciesProvider;
    }

    /**
     * @param  bool  $rehydrate
     * @return Collection
     */
    public function getCountriesCurrencies(bool $rehydrate = false): Collection
    {
        $key = 'countries_currencies';

        return $this->getCache([], $key, fn () => collect($this->countriesCurrenciesProvider->getCountriesCurrencies()), $rehydrate);
    }

    /**
     * @param  bool  $rehydrate
     * @return void
     */
    public function syncCountriesCurrencies(bool $rehydrate = false): void
    {
        $this->getCountriesCurrencies($rehydrate)->each(fn (CountryDataFactory $factory) => $factory->firstOrCreate());
    }
}
