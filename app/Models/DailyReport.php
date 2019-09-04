<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    protected $fillable = [
        'user_id',
        'reporting_time',
        'title',
        'content'
    ];

    public function getByUserId($id)
    {
        return $this->where('user_id', $id)->get();
    }
}
