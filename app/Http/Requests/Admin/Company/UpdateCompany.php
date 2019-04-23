<?php namespace App\Http\Requests\Admin\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateCompany extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.company.edit', $this->company);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'name' => ['sometimes', Rule::unique('companies', 'name')->ignore($this->company->getKey(), $this->company->getKeyName()), 'string'],
            'mobile' => ['sometimes', Rule::unique('companies', 'mobile')->ignore($this->company->getKey(), $this->company->getKeyName()), 'string'],
            'address' => ['nullable', 'string'],
            'type' => ['sometimes', 'integer'],
            'rating' => ['nullable', 'integer'],
            
        ];
    }
}
