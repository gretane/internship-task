<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    //belongs through?
    public function studentProjects() {

        return $this->hasMany(Project::class);
    }

    public function studentGroups() {

        return $this->belongsToMany(Group::class);
    }


}
