<?php namespace App\Http\Requests\Admin\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreCompany extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.company.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('companies', 'name'), 'string'],
            'mobile' => ['required', Rule::unique('companies', 'mobile'), 'string'],
            'address' => ['nullable', 'string'],
            'type' => ['required', 'integer'],
            'rating' => ['nullable', 'integer'],
            
        ];
    }
}
