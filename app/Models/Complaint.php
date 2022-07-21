<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function username()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function departmentname()
    {
        return $this->hasOne(Department::class, "id", "dept_id");
    }

    public function issuename()
    {
        return $this->hasOne(Issue::class, "id", "issue_id");
    }
}
