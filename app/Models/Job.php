<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['id_company', 'id_recruiter', 'title', 'city', 'state', 'description', 'salary', 'publish_date'];

    public function companies()
    {
        return $this->belongsTo(Company::class, 'id_company');
    }
}
