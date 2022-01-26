<?php

namespace App\Http\Requests;

use App\Rules\PocketLimit;
use App\Rules\YearlyLimit;
use Illuminate\Foundation\Http\FormRequest;

class PocketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            '*.common.id' => ['required', 'integer'],
            '*.common.name' => ['nullable', 'string'],
            '*.months.january' => ['nullable', 'integer'],
            '*.months.february' => ['nullable', 'integer'],
            '*.months.march' => ['nullable', 'integer'],
            '*.months.april' => ['nullable', 'integer'],
            '*.months.may' => ['nullable', 'integer'],
            '*.months.june' => ['nullable', 'integer'],
            '*.months.july' => ['nullable', 'integer'],
            '*.months.august' => ['nullable', 'integer'],
            '*.months.september' => ['nullable', 'integer'],
            '*.months.october' => ['nullable', 'integer'],
            '*.months.november' => ['nullable', 'integer'],
            '*.months.december' => ['nullable', 'integer'],
            '*.months' => [ new PocketLimit ],
            '0' => [ new YearlyLimit($this->request) ]
        ];
    }
}
