<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShilajitManufacturingHero extends Model
{
    protected $fillable = [
        'title',
        'highlighted_text',
        'banner_desktop',
        'banner_mobile',
        'banner_tablet',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the active hero record.
     */
    public static function getActive(): ?self
    {
        return static::where('is_active', true)->latest()->first();
    }

    /**
     * Return the URL for desktop banner.
     */
    public function getDesktopBannerUrlAttribute(): string
    {
        return $this->banner_desktop
            ? asset('storage/' . $this->banner_desktop)
            : asset('images/prbanner1.png');
    }

    /**
     * Return the URL for mobile banner (falls back to desktop).
     */
    public function getMobileBannerUrlAttribute(): string
    {
        return $this->banner_mobile
            ? asset('storage/' . $this->banner_mobile)
            : $this->desktop_banner_url;
    }

    /**
     * Return the URL for tablet banner (falls back to desktop).
     */
    public function getTabletBannerUrlAttribute(): string
    {
        return $this->banner_tablet
            ? asset('storage/' . $this->banner_tablet)
            : $this->desktop_banner_url;
    }
}