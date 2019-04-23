<?php namespace App\Http\Requests\Admin\Menu;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateMenu extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.menu.edit', $this->menu);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'company_id' => ['sometimes', 'integer'],
            'type' => ['sometimes', 'integer'],
            'name' => ['sometimes', 'string'],
            'price' => ['sometimes', 'integer'],
            'category' => ['nullable', 'integer'],
            
        ];
    }
}
