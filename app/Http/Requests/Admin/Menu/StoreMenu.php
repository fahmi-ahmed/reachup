<?php namespace App\Http\Requests\Admin\Menu;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMenu extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.menu.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'company_id' => ['required', 'integer'],
            'type' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'category' => ['nullable', 'integer'],
            
        ];
    }
}
