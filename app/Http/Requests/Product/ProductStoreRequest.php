<?php

namespace App\Http\Requests\Product;

use App\Models\Shop;
use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Shop $shop)
    {
        return [
            'shop_id' => ['required', 'integer'],
            'title' => ['required', 'string']
        ];
    }
}
