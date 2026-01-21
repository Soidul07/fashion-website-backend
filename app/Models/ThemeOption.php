<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'top_header1_text',
        'top_header2_text',
        'top_header2_text_price',
        'mega_menu_banner',
        'header_logo', 
        'footer_description', 
        'social_links',
        'admin_email',
        'admin_phone',
        'footer_payment_logo',
        'above_footer_section',
    ];
}
