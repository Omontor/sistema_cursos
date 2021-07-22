<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Course extends Model implements HasMedia
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'courses';

    public static $searchable = [
        'title',
    ];

    protected $appends = [
        'thumbnail',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'teacher_id',
        'title',
        'description',
        'price',
        'is_published',
        'created_at',
        'video',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function courseReviews()
    {
        return $this->hasMany(Review::class, 'course_id', 'id');
    }

    public function courseWishlists()
    {
        return $this->hasMany(Wishlist::class, 'course_id', 'id');
    }

    public function courseCertificates()
    {
        return $this->hasMany(Certificate::class, 'course_id', 'id');
    }

    public function courseOnlineClasses()
    {
        return $this->hasMany(OnlineClass::class, 'course_id', 'id');
    }

    public function courseReservations()
    {
        return $this->hasMany(Reservation::class, 'course_id', 'id');
    }

    public function courseEnrollments()
    {
        return $this->hasMany(Enrollment::class, 'course_id', 'id');
    }

    public function coursePurchasedTransactions()
    {
        return $this->belongsToMany(Transaction::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function getThumbnailAttribute()
    {
        $files = $this->getMedia('thumbnail');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    public function requirements()
    {
        return $this->belongsToMany(Requirment::class);
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
