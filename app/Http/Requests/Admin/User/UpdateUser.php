<?php namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.user.edit', $this->user);
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
            'email' => ['sometimes', 'email', Rule::unique('users', 'email')->ignore($this->user->getKey(), $this->user->getKeyName()), 'string'],
            'email_verified_at' => ['nullable', 'date'],
            'mobile' => ['sometimes', Rule::unique('users', 'mobile')->ignore($this->user->getKey(), $this->user->getKeyName()), 'string'],
            'description' => ['sometimes', 'string'],
            'service_type' => ['sometimes', 'integer'],
            'address' => ['nullable', 'string'],
            'rating' => ['nullable', 'integer'],
            
        ];
    }
}
