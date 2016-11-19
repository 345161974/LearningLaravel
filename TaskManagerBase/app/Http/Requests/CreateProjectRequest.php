<?php

namespace App\Http\Requests;

class CreateProjectRequest extends Request
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
            'name' => 'required | unique:projects,name',
            'thumbnail' => 'image | dimensions:min_width=261,min_height=98'
        ];
    }

    public function messages()
    {
        return [
           'name.required' => '项目名称是必填的!',
            'name.unique' => '很抱歉,项目名称被占用',
            'thumbnail.image' => '上传图片格式的文件',
            'thumbnail.dimensions' => '图片至少是261*98的尺寸'
        ];
    }
}
