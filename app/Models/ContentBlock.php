<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ContentBlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'section',
        'key',
        'title_en',
        'title_ar',
        'subtitle_en',
        'subtitle_ar',
        'summary_en',
        'summary_ar',
        'body_en',
        'body_ar',
        'button_text_en',
        'button_text_ar',
        'button_url',
        'image_path',
        'metadata',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'metadata' => 'array',
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saved(function (): void {
            static::flushCache();
        });

        static::deleted(function (): void {
            static::flushCache();
        });
    }

    public static function cacheKey(): string
    {
        return 'content_blocks.active_grouped';
    }

    public static function flushCache(): void
    {
        Cache::forget(static::cacheKey());
    }

    public function translate(string $field, ?string $locale = null): ?string
    {
        $locale = $locale ?: app()->getLocale();
        $value = $this->getAttribute($field . '_' . $locale);

        if (! $value && $locale !== 'en') {
            $value = $this->getAttribute($field . '_en');
        }

        return $value;
    }

    public function metadataValue(string $key, $default = null)
    {
        return Arr::get($this->metadata ?? [], $key, $default);
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::get(function () {
            if (! $this->image_path) {
                return null;
            }

            if (Str::startsWith($this->image_path, ['http://', 'https://', '//'])) {
                return $this->image_path;
            }

            if (Str::startsWith($this->image_path, ['/storage', 'storage/'])) {
                return asset(ltrim($this->image_path, '/'));
            }

            if (Str::startsWith($this->image_path, ['/'])) {
                return asset(ltrim($this->image_path, '/'));
            }

            return asset($this->image_path);
        });
    }
}
