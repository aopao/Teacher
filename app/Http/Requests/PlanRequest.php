<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
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
            'name'=>'required|min:1|max:100',
			'age'=>'required|numeric'
        ];
    }

    public function messages()
	{
		return [
			'name.required'=>'用户名必须填写',
			'name.min'=>'用户名最少一个字符',
			'age.required'=>'年龄必须填写',
			'age.numeric'=>'年龄必须是整数'
		];
	}
}
