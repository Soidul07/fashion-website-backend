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

        // Handle 'social_links' JSON field and update image paths
        if($themeOptions->social_links) {
            $socialLinks = json_decode($themeOptions->social_links, true);
            foreach ($socialLinks as &$link) {
                if (!empty($link['social_icon'])) {
                    $link['social_icon'] = asset('admin_assets/uploads/' . $link['social_icon']);
                }
            }
            $themeOptions->social_links = json_encode($socialLinks);
        }

        // Handle 'above_footer_section' JSON field and update image paths
        if($themeOptions->above_footer_section) {
            $footerSections = json_decode($themeOptions->above_footer_section, true);
            foreach ($footerSections as &$section) {
                if (!empty($section['fs_image'])) {
                    $section['fs_image'] = asset('admin_assets/uploads/' . $section['fs_image']);
                }
            }
            $themeOptions->above_footer_section = json_encode($footerSections);
        }

        // Return the data as a JSON response
        return response()->json([
            'success' => true,
            'message' => 'Theme Options retrieved successfully.',
            'data' => $themeOptions
        ], 200);
    }
}
