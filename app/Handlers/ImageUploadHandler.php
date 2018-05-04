<?php

namespace App\Handlers;

use Image;


class ImageUploadHandler
{
    // 存储路径
    protected $upload_path = 'uploads/images/';

    // 只允许以下后缀名的图片文件上传
    protected $allowed_ext = ["png", "jpg", "gif", 'jpeg'];

    public function save($file, $folder, $file_prefix, $max_width = false)
    {
        // 构建存储的文件夹规则
        $folder_name = $this->upload_path . $folder . '/' . date("Ym/d", time());

        // 文件具体存储的物理路径
        $save_path = public_path() . '/' . $folder_name;

        // 获取文件的后缀名，因图片从剪贴板里黏贴时后缀名为空，所以此处确保后缀一直存在
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';

        // 拼接文件名，加前缀是为了增加辨析度，前缀可以是相关数据模型的 ID
        $filename = $file_prefix . '_' . time() . '_' . str_random(10) . '.' . $extension;

        // 如果上传的不是图片将终止操作
        if ( ! in_array($extension, $this->allowed_ext)) {
            return false;
        }

        // 将图片移动到我们的目标存储路径中
        $file->move($save_path, $filename);

        if ( $max_width && $extension != 'gif' ) {
            $this->reduceSize($save_path . '/' . $filename, $max_width);
        }

        return [
            'path' => "/$folder_name/$filename"
        ];
    }

    public function reduceSize($file_path, $max_width)
    {
        $image = Image::make($file_path);

        $image->resize($max_width, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $image->save();
    }

}
