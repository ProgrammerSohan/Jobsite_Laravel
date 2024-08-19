<?php

namespace App\Models\Job;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'job_title',
        'job_region',
        'company',
        'job_type',
        'vacancy',
        'experience',
        'salary',
        'gender',
        'application_deadline',
        'jobdescription',
        'responsibilities',
        'education_experience',
        'otherbenifits',
       // 'category',
        'category_id',
        'image',
       
       
    ];

    public function category()//category that owns the job.
    {
        return $this->belongsTo(Category::class,'category_id');
    }

}
