<?php

namespace Luchavez\SimpleCountriesCurrencies\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Luchavez\SimpleCountriesCurrencies\Traits\HasCountryFactoryTrait;
use Luchavez\StarterKit\Traits\UsesUUIDTrait;

/**
 * Class Country
 *
 * Note:
 * By default, models and factories inside a package need to explicitly connect with each other.
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class Country extends Model
{
    use UsesUUIDTrait;
    use SoftDeletes;
    use HasCountryFactoryTrait;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'code';
    }

    /**
     * @var array
     */
    protected $casts = [
        'calling_codes' => 'array',
        'languages' => 'array',
        'tld' => 'array',
    ];

    /******** RELATIONSHIPS ********/

    /**
     * @return BelongsToMany
     */
    public function currencies(): BelongsToMany
    {
        return $this->belongsToMany(Currency::class)->withTimestamps()->using(CountryCurrency::class);
    }

    /***** ACCESSORS & MUTATORS *****/

    //

    /******** OTHER METHODS ********/

    //
}
