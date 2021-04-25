<?php

namespace App\DataProvider\Eloquent;

use Illuminate\Database\Eloquent\Model;

class TrainingMenuItem extends Model
{
    protected $primaryKey = 'item_id';
    // ユーザからの変更は受け付けない
    protected $guarded = [
        'item_id',
        'item_name',
        's3_img_url',
        'created_at',
        'updated_at'
    ];
}
