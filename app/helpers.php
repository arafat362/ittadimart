<?php

use Illuminate\Support\Facades\Cache;
use App\Models\Setting;

if(!function_exists('getSetting')){
    function getSetting($key, $default = null)
    {
        return Cache::rememberForever('setting:' . $key, function () use ($key, $default) {
            $setting = Setting::where('key', $key)->first();
    
            if ($setting) {
                return $setting->value;
            }
    
            return $default;
        });
    }
}

if (!function_exists('generateCategoryOptions')) {
    function generateCategoryOptions($categories, $parent_id = null, $level = 0, $selected = null) {
        $options = '';

        foreach ($categories as $category) {
            if ($category->parent_id == $parent_id) {
                $indentation = str_repeat('— ', $level);
                $isSelected = $selected != null && $selected == $category->id ? 'selected' : '';
                $options .= "<option value='{$category->id}' {$isSelected}>{$indentation}{$category->name}</option>";
                $options .= generateCategoryOptions($categories, $category->id, $level + 1, $selected);
            }
        }

        return $options;
    }
}



if(!function_exists('calculateDiscountPercentage')){
    function calculateDiscountPercentage($regularPrice, $salePrice)
    {
        if ($regularPrice > 0 && $salePrice > 0 && $regularPrice > $salePrice) {
            $discountPercentage = (($regularPrice - $salePrice) / $regularPrice) * 100;
            return round($discountPercentage);
        } else {
            return 0;
        }
    }
}