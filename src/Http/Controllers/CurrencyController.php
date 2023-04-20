<?php

namespace Luchavez\SimpleCountriesCurrencies\Http\Controllers;

use App\Http\Controllers\Controller;
use Luchavez\SimpleCountriesCurrencies\Events\Currency\CurrencyArchivedEvent;
use Luchavez\SimpleCountriesCurrencies\Events\Currency\CurrencyCollectedEvent;
use Luchavez\SimpleCountriesCurrencies\Events\Currency\CurrencyCreatedEvent;
// Model
use Luchavez\SimpleCountriesCurrencies\Events\Currency\CurrencyRestoredEvent;
// Requests
use Luchavez\SimpleCountriesCurrencies\Events\Currency\CurrencyShownEvent;
use Luchavez\SimpleCountriesCurrencies\Events\Currency\CurrencyUpdatedEvent;
use Luchavez\SimpleCountriesCurrencies\Http\Requests\Currency\DeleteCurrencyRequest;
use Luchavez\SimpleCountriesCurrencies\Http\Requests\Currency\IndexCurrencyRequest;
use Luchavez\SimpleCountriesCurrencies\Http\Requests\Currency\RestoreCurrencyRequest;
use Luchavez\SimpleCountriesCurrencies\Http\Requests\Currency\ShowCurrencyRequest;
// Events
use Luchavez\SimpleCountriesCurrencies\Http\Requests\Currency\StoreCurrencyRequest;
use Luchavez\SimpleCountriesCurrencies\Http\Requests\Currency\UpdateCurrencyRequest;
use Luchavez\SimpleCountriesCurrencies\Models\Currency;
use Luchavez\StarterKit\Traits\HasTaggableCacheTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class CurrencyController
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class CurrencyController extends Controller
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
     * Currency List
     *
     * @group Currency Management
     *
     * @param  IndexCurrencyRequest  $request
     * @return JsonResponse
     */
    public function index(IndexCurrencyRequest $request): JsonResponse
    {
        $key = 'currencies';

        $data = $this->getCache([], $key, function () {
            return Currency::all();
        });

        event(new CurrencyCollectedEvent($data));

        return simpleResponse()
            ->data($data)
            ->message('Successfully collected record.')
            ->success()
            ->generate();
    }

    /**
     * Create Currency
     *
     * @group Currency Management
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $data = $request->all();

        $model = Currency::create($data)->fresh();

        event(new CurrencyCreatedEvent($model));

        return simpleResponse()
            ->data($model)
            ->message('Successfully created record.')
            ->success()
            ->generate();
    }

    /**
     * Store Currency
     *
     * @group Currency Management
     *
     * @param  StoreCurrencyRequest  $request
     * @return JsonResponse
     */
    public function store(StoreCurrencyRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = Currency::create($data)->fresh();

        event(new CurrencyCreatedEvent($model));

        return simpleResponse()
            ->data($model)
            ->message('Successfully created record.')
            ->success()
            ->generate();
    }

    /**
     * Show Currency
     *
     * @group Currency Management
     *
     * @param  ShowCurrencyRequest  $request
     * @param  Currency  $currency
     * @return JsonResponse
     */
    public function show(ShowCurrencyRequest $request, Currency $currency): JsonResponse
    {
        event(new CurrencyShownEvent($currency));

        return simpleResponse()
            ->data($currency)
            ->message('Successfully collected record.')
            ->success()
            ->generate();
    }

    /**
     * Edit Currency
     *
     * @group Currency Management
     *
     * @param  Request  $request
     * @param  Currency  $currency
     * @return JsonResponse
     */
    public function edit(Request $request, Currency $currency): JsonResponse
    {
        // Logic here...

        event(new CurrencyUpdatedEvent($currency));

        return simpleResponse()
            ->data($currency)
            ->message('Successfully updated record.')
            ->success()
            ->generate();
    }

    /**
     * Update Currency
     *
     * @group Currency Management
     *
     * @param  UpdateCurrencyRequest  $request
     * @param  Currency  $currency
     * @return JsonResponse
     */
    public function update(UpdateCurrencyRequest $request, Currency $currency): JsonResponse
    {
        // Logic here...

        event(new CurrencyUpdatedEvent($currency));

        return simpleResponse()
            ->data($currency)
            ->message('Successfully updated record.')
            ->success()
            ->generate();
    }

    /**
     * Archive Currency
     *
     * @group Currency Management
     *
     * @param  DeleteCurrencyRequest  $request
     * @param  Currency  $currency
     * @return JsonResponse
     */
    public function destroy(DeleteCurrencyRequest $request, Currency $currency): JsonResponse
    {
        $currency->delete();

        event(new CurrencyArchivedEvent($currency));

        return simpleResponse()
            ->data($currency)
            ->message('Successfully archived record.')
            ->success()
            ->generate();
    }

    /**
     * Restore Currency
     *
     * @group Currency Management
     *
     * @param  RestoreCurrencyRequest  $request
     * @param $currency
     * @return JsonResponse
     */
    public function restore(RestoreCurrencyRequest $request, $currency): JsonResponse
    {
        $data = Currency::withTrashed()->find($currency)->restore();

        event(new CurrencyRestoredEvent($data));

        return simpleResponse()
            ->data($data)
            ->message('Successfully restored record.')
            ->success()
            ->generate();
    }
}
