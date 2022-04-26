<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    public function hasGroups() {
        return $this->hasMany(Group::class);
    }

    public function hasStudents() {
        return $this->hasManyThrough(Student::class, Group::class);
    }
}
