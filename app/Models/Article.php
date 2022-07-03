<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mostafaznv\LaraCache\CacheEntity;
use Mostafaznv\LaraCache\Traits\LaraCache;

class Article extends Model
{
    use HasFactory, LaraCache;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'published_at',
        'reviewed',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'reviewed' => 'bool',
    ];

    protected $dates = [
        'published_at',
    ];

    /**
     * Uppercase Title accessor.
     *
     * @param string $value
     *
     * @return string
     */
    public function getTitleAttribute(string $value): string
    {
        return strtoupper($value);
    }

    /**
     * Define Cache Entities Entities
     *
     * @return CacheEntity[]
     */
    public static function cacheEntities(): array
    {
        return [
            CacheEntity::make('list.forever')
                ->cache(function() {
                    return Article::query()->latest()->get();
                }),

            CacheEntity::make('latest')
                ->validForRestOfDay()
                ->cache(function() {
                    return Article::query()->latest()->first();
                })
        ];
    }
}
