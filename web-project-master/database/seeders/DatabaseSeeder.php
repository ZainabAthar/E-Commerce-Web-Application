<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a user
        User::factory()->create([
            'name' => 'ahmarkamran',
            'email' => 'ahmarkamran008@gmail.com',
            'password' => hash::make('ahmar'),
            'is_admin' => true
        ]);

        // Create categories
        $shoes = Category::create([
            'name' => 'Shoes',
            'slug' => 'shoes',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $bags = Category::create([
            'name' => 'Bags',
            'slug' => 'bags',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create products with category_id and relate them to categories
        $product1 = Product::create([
            'name' => 'Floral Shoes',
            'brief_description' => 'Shoes made with great care.',
            'description' => 'Shoes made with great care. 7 days return policy. You will love the quality',
            'price' => '12',
            'old_price' => '24',
            'SKU' => 'SKU-1234',
            'stock_status' => 'instock',
            'quantity' => '34',
            'image' => 'images\products\main_image\product-7-1.jpg',
            'images' => 'images\products\main_image\product-7-1.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // Attach category to the product (Floral Shoes)
        $product1->categories()->attach($shoes->id); // Attach 'Shoes' category to the product

            // Create products with category_id and relate them to categories
            $product2 = Product::create([
                'name' => 'Sports Shoes',
                'brief_description' => 'Shoes made with great care.',
                'description' => 'Shoes made with great care. 7 days return policy. You will love the quality',
                'price' => '120',
                'old_price' => '400',
                'SKU' => 'SKU-2345',
                'stock_status' => 'instock',
                'quantity' => '34',
                'image' => 'images\products\main_image\category-thumb-5.jpg',
                'images' => 'images\products\main_image\category-thumb-5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            // Attach category to the product (Floral Shoes)
            $product2->categories()->attach($shoes->id); // Attach 'Shoes' category to the product

        $product2 = Product::create([
            'name' => 'Leather Bag',
            'brief_description' => 'Stylish leather bag.',
            'description' => 'Premium quality leather bag with multiple compartments.',
            'price' => '50',
            'old_price' => '70',
            'SKU' => 'SKU-5678',
            'stock_status' => 'instock',
            'quantity' => '20',
            'image' => 'images\products\main_image\product-14-2.jpg',
            'images' => 'images\products\main_image\product-14-2.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Attach category to the product (Leather Bag)

        $product2->categories()->attach($bags->id); // Attach 'Bags' category to the product

        $product2 = Product::create([
            'name' => ' Bag',
            'brief_description' => 'Stylish leather bag.',
            'description' => 'Premium quality leather bag with multiple compartments.',
            'price' => '80',
            'old_price' => '120',
            'SKU' => 'SKU-5678',
            'stock_status' => 'instock',
            'quantity' => '34',
            'image' => 'images\products\main_image\thumbnail-3.jpg',
            'images' => 'images\products\main_image\thumbnail-3.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Attach category to the product (Leather Bag)
        $product2->categories()->attach($bags->id); // Attach 'Bags' category to the product
    }
}