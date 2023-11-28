<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BudgetRequest extends FormRequest
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
        return [
            'edit_budget_type' => 'required|min:1',
            'edit_category' => 'required|in:Education,Entertainment,Food,Health,Miscellaneous,Shopping,Transportation,Utilities',
            'edit_amount' => 'min:1|required|numeric|between:0,999999.999999',
            'edit_date' => 'required|date',
        ];
    }
}
