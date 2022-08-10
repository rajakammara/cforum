<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function departmentname()
    {
        return $this->hasOne(Department::class, "id", "dept_id");
    }
}
