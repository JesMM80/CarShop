<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $carId = $this->route('car') ? $this->route('car')->id : null;
        return [
            'model' => [
                'required',
                'min:2',
                Rule::unique('cars', 'model')->ignore($carId),
            ],
            'brand' => 'required|min:2',
            'engine' => 'required|min:2',
            'hp' => 'required|min:2|integer',
            'consum' => 'required|numeric',
            'year' => 'required|min:2|integer',
            'top_speed' => 'required|min:2|integer',
            'acceleration' => 'required|numeric',
            'price' => 'required|min:2|numeric',
            'imgCar' => 'image|max:1024|nullable',
        ];
    }
}
