<?php

namespace App\DataProvider\Eloquent;

use Illuminate\Database\Eloquent\Model;

class TrainingMenuList extends Model
{
    protected $primaryKey = 'list_id';
    // ユーザからの変更は受け付けない
    protected $fillable = [
        'list_name',
    ];
}