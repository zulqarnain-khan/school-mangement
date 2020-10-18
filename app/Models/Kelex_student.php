<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelex_student extends Model
{
    use HasFactory;
    protected $primaryKey = 'STUDENT_ID';
    protected $softDelete = true;
    protected $fillable = ['NAME','FATHER_NAME','FATHER_CONTACT','SECONDARY_CONTACT','GENDER','DOB','CNIC','RELIGION','FATHER_CNIC',
    'SHIFT', 'PRESENT_ADDRESS','PERMANENT_ADDRESS','GUARDIAN','GUARDIAN_CNIC', 'IMAGE','PREV_CLASS','SLC_NO','PREV_CLASS_MARKS',
    'PREV_BOARD_UNI','PASSING_YEAR','REG_NO', 'CAMPUS_ID','USER_ID'];
}
