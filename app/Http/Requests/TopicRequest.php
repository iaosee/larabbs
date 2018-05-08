<?php

namespace App\Http\Requests;

class TopicRequest extends Request
{
    public function rules()
    {
        switch($this->method())
        {
            // CREATE
            case 'POST':
            // UPDATE
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title' => 'required|min:4',
                    'body' => 'required|min:12',
                    'category_id' => 'required|numeric',
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            };
        }
    }

    public function messages()
    {
        return [
            'title.min' => '标题必须至少4个字符',
            'body.required' => '文章内容不能为空',
            'body.min' => '文章内容至少12个字符',
            'category_id.required' => '请选择分类',
            'category_id.numeric' => '别乱搞',
        ];
    }
}
