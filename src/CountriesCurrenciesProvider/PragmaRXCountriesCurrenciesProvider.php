<?php

namespace Luchavez\SimpleCountriesCurrencies\CountriesCurrenciesProvider;

use Luchavez\SimpleCountriesCurrencies\Abstracts\BaseCountriesCurrenciesProvider;
use Luchavez\SimpleCountriesCurrencies\DataFactories\CountryDataFactory;
use Luchavez\SimpleCountriesCurrencies\DataFactories\CurrencyDataFactory;
use PragmaRX\Countries\Package\Countries;
use PragmaRX\Countries\Package\Services\Config;
use PragmaRX\Countries\Package\Support\Collection;

/**
 * Class PragmaRXCountriesCurrencies
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class PragmaRXCountriesCurrenciesProvider extends BaseCountriesCurrenciesProvider
{
    /**
     * @return CountryDataFactory[]
     */
    public function getCountriesCurrencies(): array
    {
        $countryFactories = [];

        $countries = new Countries(new Config([
            'hydrate' => [
                'elements' => [
                    'currencies' => true,
                    'flag' => false,
                    'borders' => false,
                    'cities' => false,
                    'geometry' => false,
                    'states' => false,
                    'taxes' => false,
                    'topology' => false,
                ],
            ],
        ]));

        $countries->all()->each(function (Collection $country, $key) use (&$countryFactories) {
            $countryFactory = new CountryDataFactory();
            $countryFactory->code = $key;
            $countryFactory->name = $country->get('name.common');
            $countryFactory->flag = $country->get('flag.emoji');
            $countryFactory->calling_codes = $country->get('calling_codes')?->toArray() ?? [];
            $countryFactory->languages = $country->get('languages')?->toArray() ?? [];
            $countryFactory->tld = $country->get('tld')?->toArray() ?? [];

            if ($country->has('currencies') && ($currencies = $country->get('currencies')) && $currencies->count()) {
                $currencies->all()->each(function (Collection $currency, $key) use ($countryFactory) {
                    if ($currency->count()) {
                        $currencyFactory = new CurrencyDataFactory();
                        $currencyFactory->code = $key;
                        $currencyFactory->name = $currency->get('name');
                        $currencyFactory->symbol = $currency->get('units.major.symbol');
                        $countryFactory->addCurrency($currencyFactory);
                    }
                });
            }

            $countryFactories[] = $countryFactory;
        });

        return $countryFactories;
    }
}
