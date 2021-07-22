<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TRANSACTION_TYPE_SELECT = [
        '0' => 'Propia',
        '1' => 'Regalo',
    ];

    public $table = 'transactions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'value',
        'user_id',
        'coupon_use',
        'payment_type_id',
        'transaction_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function course_purchaseds()
    {
        return $this->belongsToMany(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payment_type()
    {
        return $this->belongsTo(Payment::class, 'payment_type_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
