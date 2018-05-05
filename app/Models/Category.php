<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/*
 php artisan make:scaffold Topic --schema="
 title:string:index,
 body:text,
 user_id:integer:unsigned:index,
 category_id:integer:unsigned:index,
 reply_count:integer:unsigned:default(0),
 view_count:integer:unsigned:default(0),
 last_reply_user_id:integer:unsigned:default(0),
 order:integer:unsigned:default(0),
 excerpt:text,
 slug:string:nullable"
*/
class Category extends Model
{
    protected $fillable  = [
        'name', 'description',
    ];
}
