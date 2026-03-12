<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mostafaznv\LaraCache\CacheEntity;
use Mostafaznv\LaraCache\Traits\LaraCache;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory, LaraCache;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'content',
        'published_at',
        'reviewed',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'published_at' => 'date',
            'reviewed' => 'bool',
        ];
    }

    /**
     * Uppercase Title accessor.
     */
    public function getTitleAttribute(string $value): string
    {
        return strtoupper($value);
    }

    /**
     * Define Cache Entities Entities
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
