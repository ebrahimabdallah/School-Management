<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateParentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
            $id = $this->route('id'); 

            return [
                'email' => 'required|email|unique:users,email,' . $id,
                'job'=>'max:100|min:8',
                'address'=>'string',
                'admission_number' => 'max:50',
                'religion' => 'max:50|string',
                'caste' => 'max:50',
                'mobile_number' => 'max:50|min:8',
                'roll_number' => 'max:10',
                'name' => 'required|string',
                'last_name' => 'required|string',
            ];
        }
}
