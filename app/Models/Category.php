<?php

namespace App\Models;

use App\Models\Job\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
      
       'name'

    ];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'category_id');//every category has many jobs
    }
}
