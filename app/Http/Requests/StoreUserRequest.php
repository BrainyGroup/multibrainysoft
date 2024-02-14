<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'title' => ['string', 'max:255'],
            'national_id' => 'nullable|string','max:255' , Rule::unique(User::class)->ignore($this->user()->id),
            'first_name' => 'nullable|string', 'max:255',
            'middle_name' => 'nullable|string', 'max:255',
            'organization_id' => 'nullable|numeric',
            'last_name' => 'nullable|string', 'max:255',
            'initials' => 'nullable|string', 'max:255',
            'designation' =>'nullable|string', 'max:255',
            'marital_status' => 'nullable|string',
            'pa_email' => 'nullable|email',
            'profile_photo_path' => 'nullable|string', 'max:255',
            'dod' => 'nullable|date',
            'mobile' => 'nullable|digits_between:9,12',
            'storage_limit' => 'nullable|string', 'max:255',   
        ];
    }
}
