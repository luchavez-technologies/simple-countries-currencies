<?php

namespace Luchavez\SimpleCountriesCurrencies\Http\Requests\Country;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreCountryRequest
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class StoreCountryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            //
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            //
        ]);
    }
}
