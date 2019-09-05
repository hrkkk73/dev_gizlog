<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyReport extends Model
{
    use SoftDeletes;

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
