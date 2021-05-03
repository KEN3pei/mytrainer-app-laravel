<?php

namespace App\DataProvider\Eloquent;

use Illuminate\Database\Eloquent\Model;

class TrainingMenuList extends Model
{
    protected $primaryKey = 'list_id';

    protected $fillable = [
        'list_id',
        'list_name',
        'user_id',
        'created_at',
        'updated_at'
    ];

    public function trainingMenuItems()
    {
        return $this->belongsToMany(
            'App\DataProvider\Eloquent\TrainingMenuItem', 
            'item_belonging_lists',
            'list_id', 
            'item_id'
        );
    }
}