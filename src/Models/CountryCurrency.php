<?php

namespace Luchavez\SimpleCountriesCurrencies\Models;

use Luchavez\SimpleCountriesCurrencies\Traits\HasCountryCurrencyFactoryTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CountryCurrency
 *
 * Note:
 * By default, models and factories inside a package need to explicitly connect with each other.
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class CountryCurrency extends Pivot
{
    use SoftDeletes;
    use HasCountryCurrencyFactoryTrait;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    /******** RELATIONSHIPS ********/

    /**
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    /***** ACCESSORS & MUTATORS *****/

    //

    /******** OTHER METHODS ********/

    //
}
