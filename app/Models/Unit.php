<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Unit extends Model
{
    use LogsActivity;

    protected $fillable = [
        'fantasy_name',
        'corporate_name',
        'cnpj',
        'brand_id',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['fantasy_name', 'corporate_name', 'cnpj', 'brand_id'])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
}
