<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'updated_by' => auth()->user()->id,
        ]);
    }
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
            'updated_by' => 'nullable',           
        ];
    }
}
