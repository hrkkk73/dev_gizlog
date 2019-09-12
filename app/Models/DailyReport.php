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

    protected $dates = [
        'reporting_time',
    ];

    public function scopeGetByUserId($query, $id)
    {
        return $query->where('user_id', $id);
    }

    public function scopeGetBySearchMonth($query, $searchMonth)
    {
        return $query->where('reporting_time', 'LIKE', "$searchMonth%");
    }

    public function getDailyReportList($id, $searchMonth)
    {
        return $this->getByUserId($id)
                    ->getBySearchMonth($searchMonth)
                    ->get();
    }



}
