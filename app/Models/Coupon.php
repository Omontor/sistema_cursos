<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public const TYPE_SELECT = [
        '0' => 'Porcentaje',
        '1' => 'Fijo',
    ];

    public $table = 'coupons';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'amount',
        'description',
        'code',
        'type',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
