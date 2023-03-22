<?php

use Luchavez\SimpleCountriesCurrencies\Http\Controllers\CountryController;
use Luchavez\SimpleCountriesCurrencies\Http\Controllers\CountryCurrencyController;
use Luchavez\SimpleCountriesCurrencies\Http\Controllers\CurrencyController;
use Illuminate\Support\Facades\Route;

Route::apiResource('currencies', CurrencyController::class)->only('index', 'show');
Route::apiResource('countries', CountryController::class)->only('index', 'show');
Route::apiResource('country_currency', CountryCurrencyController::class)->only('index');
