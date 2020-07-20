<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    const PUBLISHED = 1;
    const DRAFT = 2;

    public static function statusText(int $status)
    {
        if($status === self::PUBLISHED) {
            return 'published';
        }

        if($status === self::DRAFT) {
            return 'drafted';
        }
    }

    protected $guarded = ['id'];

    public function scopePublished($query)
    {
        return $query->where('status',self::PUBLISHED);
    }

    public function scopeDrafts($query)
    {
        return $query->where('status',self::DRAFT);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'article_categories');
    }
}
