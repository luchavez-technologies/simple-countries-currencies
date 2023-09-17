<?php

namespace Luchavez\SimpleCountriesCurrencies\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Luchavez\SimpleCountriesCurrencies\Traits\HasCurrencyFactoryTrait;
use Luchavez\StarterKit\Traits\UsesUUIDTrait;

/**
 * Class Currency
 *
 * Note:
 * By default, models and factories inside a package need to explicitly connect with each other.
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class Currency extends Model
{
    use UsesUUIDTrait;
    use SoftDeletes;
    use HasCurrencyFactoryTrait;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'code';
    }

    /******** RELATIONSHIPS ********/

    /**
     * @return BelongsToMany
     */
    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(Country::class)->withTimestamps()->using(CountryCurrency::class);
    }

    /***** ACCESSORS & MUTATORS *****/

    //

    /******** OTHER METHODS ********/

    //
}
