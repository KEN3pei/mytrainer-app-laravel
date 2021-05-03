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

    public function trainingMenuLists()
    {
        return $this->belongsToMany('App\DataProvider\Eloquent\TrainingMenuList', 'item_belonging_lists');
    }
}
