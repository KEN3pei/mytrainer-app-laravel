<?php

namespace App\DataProvider\Eloquent;

use Illuminate\Database\Eloquent\Model;

class ItemBelongingList extends Model
{
    protected $primaryKey = 'id';
    // ユーザからの変更は受け付けない
    protected $fillable = [
        'id',
        'list_id',
        'item_id',
        'created_at',
        'updated_at'
    ];
}
