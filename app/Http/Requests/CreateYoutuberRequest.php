<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateYoutuberRequest extends FormRequest
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
            'yt_name' => 'required|string|min:2|max:191',
            'c_id' => 'required',
            'onboarddate' => 'nullable',
            'year' => 'nullable|dateearlier:onboarddate',
            'country' => 'required|string|min:2|max:191',
            'education' => 'required|string|min:2|max:191'
        ];
    }

    public function messages()
    {
        return [
            "yt_name.required" => "Youtuber名稱 為必填",
            "yt_name.min" => "Youtuber名稱 至少需1個字元",

            "c_id.required" => "球隊編號 為必填",

            "country.required" => "國籍 為必填",

            "year.required" => "Youtuber年齡 為必填",


            "education.required" => "學歷 為必填",

            "year.dateearlier" => "年資 必須大於 年齡",
        ];
    }
}
