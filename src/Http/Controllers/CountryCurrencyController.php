<?php

namespace Luchavez\SimpleCountriesCurrencies\Http\Controllers;

use App\Http\Controllers\Controller;
use Luchavez\SimpleCountriesCurrencies\Events\CountryCurrency\CountryCurrencyArchivedEvent;
use Luchavez\SimpleCountriesCurrencies\Events\CountryCurrency\CountryCurrencyCollectedEvent;
use Luchavez\SimpleCountriesCurrencies\Events\CountryCurrency\CountryCurrencyCreatedEvent;
// Model
use Luchavez\SimpleCountriesCurrencies\Events\CountryCurrency\CountryCurrencyRestoredEvent;
// Requests
use Luchavez\SimpleCountriesCurrencies\Events\CountryCurrency\CountryCurrencyShownEvent;
use Luchavez\SimpleCountriesCurrencies\Events\CountryCurrency\CountryCurrencyUpdatedEvent;
use Luchavez\SimpleCountriesCurrencies\Http\Requests\CountryCurrency\DeleteCountryCurrencyRequest;
use Luchavez\SimpleCountriesCurrencies\Http\Requests\CountryCurrency\IndexCountryCurrencyRequest;
use Luchavez\SimpleCountriesCurrencies\Http\Requests\CountryCurrency\RestoreCountryCurrencyRequest;
use Luchavez\SimpleCountriesCurrencies\Http\Requests\CountryCurrency\ShowCountryCurrencyRequest;
// Events
use Luchavez\SimpleCountriesCurrencies\Http\Requests\CountryCurrency\StoreCountryCurrencyRequest;
use Luchavez\SimpleCountriesCurrencies\Http\Requests\CountryCurrency\UpdateCountryCurrencyRequest;
use Luchavez\SimpleCountriesCurrencies\Models\CountryCurrency;
use Luchavez\StarterKit\Traits\HasTaggableCacheTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class CountryCurrencyController
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class CountryCurrencyController extends Controller
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
     * CountryCurrency List
     *
     * @group CountryCurrency Management
     *
     * @param  IndexCountryCurrencyRequest  $request
     * @return JsonResponse
     */
    public function index(IndexCountryCurrencyRequest $request): JsonResponse
    {
        $key = 'country_currency';

        $data = $this->getCache([], $key, function () {
            return CountryCurrency::with('country', 'currency')->get();
        });

        event(new CountryCurrencyCollectedEvent($data));

        return simpleResponse()
            ->data($data)
            ->message('Successfully collected record.')
            ->success()
            ->generate();
    }

    /**
     * Create CountryCurrency
     *
     * @group CountryCurrency Management
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $data = $request->all();

        $model = CountryCurrency::create($data)->fresh();

        event(new CountryCurrencyCreatedEvent($model));

        return simpleResponse()
            ->data($model)
            ->message('Successfully created record.')
            ->success()
            ->generate();
    }

    /**
     * Store CountryCurrency
     *
     * @group CountryCurrency Management
     *
     * @param  StoreCountryCurrencyRequest  $request
     * @return JsonResponse
     */
    public function store(StoreCountryCurrencyRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = CountryCurrency::create($data)->fresh();

        event(new CountryCurrencyCreatedEvent($model));

        return simpleResponse()
            ->data($model)
            ->message('Successfully created record.')
            ->success()
            ->generate();
    }

    /**
     * Show CountryCurrency
     *
     * @group CountryCurrency Management
     *
     * @param  ShowCountryCurrencyRequest  $request
     * @param  CountryCurrency  $countryCurrency
     * @return JsonResponse
     */
    public function show(ShowCountryCurrencyRequest $request, CountryCurrency $countryCurrency): JsonResponse
    {
        event(new CountryCurrencyShownEvent($countryCurrency));

        return simpleResponse()
            ->data($countryCurrency)
            ->message('Successfully collected record.')
            ->success()
            ->generate();
    }

    /**
     * Edit CountryCurrency
     *
     * @group CountryCurrency Management
     *
     * @param  Request  $request
     * @param  CountryCurrency  $countryCurrency
     * @return JsonResponse
     */
    public function edit(Request $request, CountryCurrency $countryCurrency): JsonResponse
    {
        // Logic here...

        event(new CountryCurrencyUpdatedEvent($countryCurrency));

        return simpleResponse()
            ->data($countryCurrency)
            ->message('Successfully updated record.')
            ->success()
            ->generate();
    }

    /**
     * Update CountryCurrency
     *
     * @group CountryCurrency Management
     *
     * @param  UpdateCountryCurrencyRequest  $request
     * @param  CountryCurrency  $countryCurrency
     * @return JsonResponse
     */
    public function update(UpdateCountryCurrencyRequest $request, CountryCurrency $countryCurrency): JsonResponse
    {
        // Logic here...

        event(new CountryCurrencyUpdatedEvent($countryCurrency));

        return simpleResponse()
            ->data($countryCurrency)
            ->message('Successfully updated record.')
            ->success()
            ->generate();
    }

    /**
     * Archive CountryCurrency
     *
     * @group CountryCurrency Management
     *
     * @param  DeleteCountryCurrencyRequest  $request
     * @param  CountryCurrency  $countryCurrency
     * @return JsonResponse
     */
    public function destroy(DeleteCountryCurrencyRequest $request, CountryCurrency $countryCurrency): JsonResponse
    {
        $countryCurrency->delete();

        event(new CountryCurrencyArchivedEvent($countryCurrency));

        return simpleResponse()
            ->data($countryCurrency)
            ->message('Successfully archived record.')
            ->success()
            ->generate();
    }

    /**
     * Restore CountryCurrency
     *
     * @group CountryCurrency Management
     *
     * @param  RestoreCountryCurrencyRequest  $request
     * @param $countryCurrency
     * @return JsonResponse
     */
    public function restore(RestoreCountryCurrencyRequest $request, $countryCurrency): JsonResponse
    {
        $data = CountryCurrency::withTrashed()->find($countryCurrency)->restore();

        event(new CountryCurrencyRestoredEvent($data));

        return simpleResponse()
            ->data($data)
            ->message('Successfully restored record.')
            ->success()
            ->generate();
    }
}
