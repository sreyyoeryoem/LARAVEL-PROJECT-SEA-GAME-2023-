<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreEvenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['success' => false, 'message' => $validator->errors()], 412));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        
        return [
            "name"=>[
                "required",
            ],
            "match_date"=>[
                "required",
            ],
            "start_time"=>[
                "required",
            ],
            "end_time"=>[
                "required",
            ],
            "description"=>[
                "required",
            ],
            
            "sport_id"=>[
                "required",
            ],
            "venue_id"=>[
                "required",
            ]
            
            ];
    }
}
