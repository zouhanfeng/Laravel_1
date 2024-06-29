<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class youtuber extends Model
{
    use HasFactory;
    protected $fillable=[
        'yt_name',
        'c_id',
        'year',
        'education',
        'country'
    ];
    public function channel()
    {
        return $this->belongsTo('App\Models\channel', 'c_id', 'id');
    }

    /*public function scopeSenior($query)
    {
        $query->where('year', '>', 10)
            ->orderBy('year');
    }*/

    public function scopeAllCountries($query)
    {
        $query->select('country')->groupBy('country');
    }

    public function scopeCountry($query, $cou)
    {
        $query->where('country', '=', $cou)
            ->orderBy('year');
    }
}
