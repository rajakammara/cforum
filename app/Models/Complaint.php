<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['complaint_id'];
    protected $fillable = ['mandal_id','village_id'];
    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function department()
    {
        return $this->hasOne(Department::class, "id", "dept_id");
    }

    public function issue()
    {
        return $this->hasOne(Issue::class, "id", "issue_id");
    }

    public function getComplaintIdAttribute()
    {
        $time = strtotime($this->created_at);
        $month = date("m", $time);
        $year = date("y", $time);
        $day = date("d", $time);
        $custom_field = $year . $month . $day;
        return sprintf('#%s%s%02d%02d%05d', "CR", $custom_field, $this->dept_id, $this->issue_id, $this->id);
    }
}
