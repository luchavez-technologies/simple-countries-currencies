<?php

use Illuminate\Support\Facades\Route;
use Luchavez\SimpleCountriesCurrencies\Http\Controllers\CountryController;
use Luchavez\SimpleCountriesCurrencies\Http\Controllers\CountryCurrencyController;
use Luchavez\SimpleCountriesCurrencies\Http\Controllers\CurrencyController;

Route::apiResource('currencies', CurrencyController::class)->only('index', 'show');
Route::apiResource('countries', CountryController::class)->only('index', 'show');
Route::apiResource('country_currency', CountryCurrencyController::class)->only('index');
