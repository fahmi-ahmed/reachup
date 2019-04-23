<?php namespace App\Http\Requests\Admin\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateCustomer extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.customer.edit', $this->customer);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'name' => ['sometimes', 'string'],
            'mobile' => ['sometimes', Rule::unique('customers', 'mobile')->ignore($this->customer->getKey(), $this->customer->getKeyName()), 'string'],
            'email' => ['nullable', 'email', 'string'],
            
        ];
    }
}
