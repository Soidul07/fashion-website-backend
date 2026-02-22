<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ThemeOption;

class ThemeOptionController extends Controller
{
    // Fetch and return all theme options
    public function getThemeOptions()
    {
        // Retrieve the first theme option record
        $themeOptions = ThemeOption::first();

        // Add image path for 'mega_menu_banner'
        if($themeOptions->mega_menu_banner) {
            $themeOptions->mega_menu_banner = asset('admin_assets/uploads/' . $themeOptions->mega_menu_banner);
        }

        // Add image path for 'header_logo'
        if($themeOptions->header_logo) {
            $themeOptions->header_logo = asset('admin_assets/uploads/' . $themeOptions->header_logo);
        }

        // Add image path for 'footer_payment_logo'
        if($themeOptions->footer_payment_logo) {
            $themeOptions->footer_payment_logo = asset('admin_assets/uploads/' . $themeOptions->footer_payment_logo);
        }

        // Add image path for 'footer_image1'
        if($themeOptions->footer_image1) {
            $themeOptions->footer_image1 = asset('admin_assets/uploads/' . $themeOptions->footer_image1);
        }

        // Add image path for 'footer_image2'
        if($themeOptions->footer_image2) {
            $themeOptions->footer_image2 = asset('admin_assets/uploads/' . $themeOptions->footer_image2);
        }

        // Handle 'social_links' JSON field and update image paths
        if($themeOptions->social_links) {
            $socialLinks = is_string($themeOptions->social_links) ? json_decode($themeOptions->social_links, true) : $themeOptions->social_links;
            if (is_array($socialLinks)) {
                foreach ($socialLinks as &$link) {
                    if (!empty($link['social_icon'])) {
                        $link['social_icon'] = asset('admin_assets/uploads/' . $link['social_icon']);
                    }
                }
                $themeOptions->social_links = json_encode($socialLinks);
            }
        }

        // Handle 'above_footer_section' JSON field and update image paths
        if($themeOptions->above_footer_section) {
            $footerSections = is_array($themeOptions->above_footer_section) ? $themeOptions->above_footer_section : json_decode($themeOptions->above_footer_section, true);
            foreach ($footerSections as &$section) {
                if (!empty($section['fs_image'])) {
                    $section['fs_image'] = asset('admin_assets/uploads/' . $section['fs_image']);
                }
            }
            $themeOptions->above_footer_section = json_encode($footerSections);
        }

        // Handle 'modal_features' JSON field and update image paths
        if($themeOptions->modal_features) {
            $modalFeatures = is_array($themeOptions->modal_features) ? $themeOptions->modal_features : json_decode($themeOptions->modal_features, true);
            foreach ($modalFeatures as &$feature) {
                if (!empty($feature['icon'])) {
                    $feature['icon'] = asset('admin_assets/uploads/' . $feature['icon']);
                }
            }
            $themeOptions->modal_features = json_encode($modalFeatures);
        }

        // Return the data as a JSON response
        return response()->json([
            'success' => true,
            'message' => 'Theme Options retrieved successfully.',
            'data' => $themeOptions
        ], 200);
    }
}
