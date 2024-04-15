<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    // Các trường trong bảng 'applications'
    protected $fillable = [
        'job_id',
        'cv_id',
        // ...
    ];

    // Quan hệ n-1 với Job
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    // Quan hệ n-1 với CV
    public function cv()
    {
        return $this->belongsTo(CV::class);
    }

    // ...
}