<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class channel extends Model
{
    use HasFactory;
    protected  $fillable=[
            'c_name',
            'category',
            'fans',
            'views',
            'state'
        ];
    public function scopeState($query, $state)
    {
        $query->where('state', '=', $state);
    }

    public function youtubers()
    {
        return $this->hasMany('App\Models\youtuber', 'c_id');
    }

    public function delete()
    {
        $this->youtubers()->delete();
        return parent::delete();
    }
}
