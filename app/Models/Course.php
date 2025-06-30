<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'subtitle',
        'description',
        'objectives',
        'requirements',
        'target_audience',
        'level',
        'cover_image',
        'promo_video',
        'is_free',
        'price',
        'status',
    ];

    /**
     * Get the user that owns the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function contents()
    {
        return $this->hasMany(CourseContent::class);
    }

    public function favoredByUsers()
    {
        return $this->belongsToMany(User::class);
    }
}
