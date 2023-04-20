<?php

namespace Luchavez\SimpleCountriesCurrencies\Http\Controllers;

use App\Http\Controllers\Controller;
use Luchavez\SimpleCountriesCurrencies\Events\Country\CountryArchivedEvent;
use Luchavez\SimpleCountriesCurrencies\Events\Country\CountryCollectedEvent;
use Luchavez\SimpleCountriesCurrencies\Events\Country\CountryCreatedEvent;
// Model
use Luchavez\SimpleCountriesCurrencies\Events\Country\CountryRestoredEvent;
// Requests
use Luchavez\SimpleCountriesCurrencies\Events\Country\CountryShownEvent;
use Luchavez\SimpleCountriesCurrencies\Events\Country\CountryUpdatedEvent;
use Luchavez\SimpleCountriesCurrencies\Http\Requests\Country\DeleteCountryRequest;
use Luchavez\SimpleCountriesCurrencies\Http\Requests\Country\IndexCountryRequest;
use Luchavez\SimpleCountriesCurrencies\Http\Requests\Country\RestoreCountryRequest;
use Luchavez\SimpleCountriesCurrencies\Http\Requests\Country\ShowCountryRequest;
// Events
use Luchavez\SimpleCountriesCurrencies\Http\Requests\Country\StoreCountryRequest;
use Luchavez\SimpleCountriesCurrencies\Http\Requests\Country\UpdateCountryRequest;
use Luchavez\SimpleCountriesCurrencies\Models\Country;
use Luchavez\StarterKit\Traits\HasTaggableCacheTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class CountryController
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class CountryController extends Controller
{
    use HasTaggableCacheTrait;

    /**
     * @return string
     */
    public function getMainTag(): string
    {
        return 'countries_currencies';
    }

    /**
     * Country List
     *
     * @group Country Management
     *
     * @param  IndexCountryRequest  $request
     * @return JsonResponse
     */
    public function index(IndexCountryRequest $request): JsonResponse
    {
        $key = 'countries';

        $data = $this->getCache([], $key, function () {
            return Country::all();
        });

        event(new CountryCollectedEvent($data));

        return simpleResponse()
            ->data($data)
            ->message('Successfully collected record.')
            ->success()
            ->generate();
    }

    /**
     * Create Country
     *
     * @group Country Management
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $data = $request->all();

        $model = Country::create($data)->fresh();

        event(new CountryCreatedEvent($model));

        return simpleResponse()
            ->data($model)
            ->message('Successfully created record.')
            ->success()
            ->generate();
    }

    /**
     * Store Country
     *
     * @group Country Management
     *
     * @param  StoreCountryRequest  $request
     * @return JsonResponse
     */
    public function store(StoreCountryRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = Country::create($data)->fresh();

        event(new CountryCreatedEvent($model));

        return simpleResponse()
            ->data($model)
            ->message('Successfully created record.')
            ->success()
            ->generate();
    }

    /**
     * Show Country
     *
     * @group Country Management
     *
     * @param  ShowCountryRequest  $request
     * @param  Country  $country
     * @return JsonResponse
     */
    public function show(ShowCountryRequest $request, Country $country): JsonResponse
    {
        event(new CountryShownEvent($country));

        return simpleResponse()
            ->data($country)
            ->message('Successfully collected record.')
            ->success()
            ->generate();
    }

    /**
     * Edit Country
     *
     * @group Country Management
     *
     * @param  Request  $request
     * @param  Country  $country
     * @return JsonResponse
     */
    public function edit(Request $request, Country $country): JsonResponse
    {
        // Logic here...

        event(new CountryUpdatedEvent($country));

        return simpleResponse()
            ->data($country)
            ->message('Successfully updated record.')
            ->success()
            ->generate();
    }

    /**
     * Update Country
     *
     * @group Country Management
     *
     * @param  UpdateCountryRequest  $request
     * @param  Country  $country
     * @return JsonResponse
     */
    public function update(UpdateCountryRequest $request, Country $country): JsonResponse
    {
        // Logic here...

        event(new CountryUpdatedEvent($country));

        return simpleResponse()
            ->data($country)
            ->message('Successfully updated record.')
            ->success()
            ->generate();
    }

    /**
     * Archive Country
     *
     * @group Country Management
     *
     * @param  DeleteCountryRequest  $request
     * @param  Country  $country
     * @return JsonResponse
     */
    public function destroy(DeleteCountryRequest $request, Country $country): JsonResponse
    {
        $country->delete();

        event(new CountryArchivedEvent($country));

        return simpleResponse()
            ->data($country)
            ->message('Successfully archived record.')
            ->success()
            ->generate();
    }

    /**
     * Restore Country
     *
     * @group Country Management
     *
     * @param  RestoreCountryRequest  $request
     * @param $country
     * @return JsonResponse
     */
    public function restore(RestoreCountryRequest $request, $country): JsonResponse
    {
        $data = Country::withTrashed()->find($country)->restore();

        event(new CountryRestoredEvent($data));

        return simpleResponse()
            ->data($data)
            ->message('Successfully restored record.')
            ->success()
            ->generate();
    }
}
