<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateChannelRequest extends FormRequest
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
            'c_name' => 'required|string|min:1|max:100',
            'category' => 'required|string|min:2|max:100',
            'state' => 'required|string|min:2|max:100',
        ];
    }

    public function messages()
    {
        return [
            "c_name.required" => "頻道名稱 為必填",
            "c_name.min" => "頻道名稱 至少需1個字元",

            "category.required" => "類別 為必填",
            "category.min" => "類別 至少需2個字元",

            "state.required" => "地區 為必填",
            "state.min" => "地區 至少需2個字元",

        ];
    }
}
