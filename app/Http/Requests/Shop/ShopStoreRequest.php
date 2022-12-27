<?php

namespace App\Http\Requests\Shop;

use App\Models\Catalog;
use Illuminate\Foundation\Http\FormRequest;

class ShopStoreRequest extends FormRequest
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
    public function rules(Catalog $catalog)
    {
        return [
            'catalog_id' => ['required', 'integer'],
            'shop_name' => ['required', 'string']
        ];
    }
}
