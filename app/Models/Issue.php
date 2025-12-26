<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{

    //  // Định nghĩa các cột có thể điền (fillable)
    //  protected $fillable = ['title', 'student_id', 'program', 'supervisor', 'abstract', 'submission_date', 'defense_date'];
   protected $fillable = [
        'computer_id',
        'reported_by',
        'reported_date',
        'description',
        'urgency',
        'status'
    ];
    public function computer() {
    return $this->belongsTo(Computer::class, 'computer_id');

}

}
