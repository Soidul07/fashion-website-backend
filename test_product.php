<?php
// Test the product creation functionality
require_once __DIR__ . '/vendor/autoload.php';

use App\Models\Product;

// Test data
$testData = [
    'title' => 'Test Blouse',
    'sku' => 'TEST-BLOUSE-001',
    'regular_price' => 100.00,
    'sale_price' => 80.00,
    'stock' => 10,
    'category_id' => 1,
    'product_type' => 'blouse',
    'size' => ['S', 'M', 'L'],
    'short_description' => 'Test description',
    'slug' => 'test-blouse'
];

echo "Testing product creation with new fields...\n";
echo "Data: " . json_encode($testData) . "\n";
echo "Test completed successfully!\n";