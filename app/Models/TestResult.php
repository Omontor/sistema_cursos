<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestResult extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const SHOW_SELECT = [
        '0' => 'No',
        '1' => 'Si',
    ];

    public $table = 'test_results';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'test_id',
        'student_id',
        'score',
        'show',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function test()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
