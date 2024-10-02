<?php

namespace Database\Seeders;



use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'Venue',
            'sub_categories' => [
                ['name' => 'Reception Venue', 'designation' => 'General'],
                ['name' => 'Ceremony Venue', 'designation' => 'General'],
                ['name' => 'Outdoor Venue', 'designation' => 'General'],
                ['name' => 'Indoor Venue', 'designation' => 'General'],
            ],
        ]);

        Category::create([
            'name' => 'Catering',
            'sub_categories' => [
                ['name' => 'Full-Service Catering', 'designation' => 'General'],
                ['name' => 'Buffet Catering', 'designation' => 'General'],
                ['name' => 'Food Trucks', 'designation' => 'General'],
                ['name' => 'Cake Baker', 'designation' => 'General'],
            ],
        ]);

        Category::create([
            'name' => 'Photography',
            'sub_categories' => [
                ['name' => 'Wedding Photographer', 'designation' => 'General'],
                ['name' => 'Engagement Photographer', 'designation' => 'General'],
                ['name' => 'Photo Booth Services', 'designation' => 'General'],
                ['name' => 'Videographer', 'designation' => 'General'],
            ],
        ]);

        Category::create([
            'name' => 'Floristry',
            'sub_categories' => [
                ['name' => 'Bridal Bouquets', 'designation' => 'General'],
                ['name' => 'Bridesmaids\' Bouquets', 'designation' => 'General'],
                ['name' => 'Boutonnieres', 'designation' => 'General'],
                ['name' => 'Ceremony Decorations', 'designation' => 'General'],
                ['name' => 'Reception Decorations', 'designation' => 'General'],
            ],
        ]);

        Category::create([
            'name' => 'Music & Entertainment',
            'sub_categories' => [
                ['name' => 'DJ Services', 'designation' => 'General'],
                ['name' => 'Live Band', 'designation' => 'General'],
                ['name' => 'Solo Musician', 'designation' => 'General'],
                ['name' => 'Ceremony Musician', 'designation' => 'General'],
                ['name' => 'Dance Instructor', 'designation' => 'General'],
            ],
        ]);

        Category::create([
            'name' => 'Attire',
            'sub_categories' => [
                ['name' => 'Bridal Gown', 'designation' => 'General'],
                ['name' => 'Bridesmaids\' Dresses', 'designation' => 'General'],
                ['name' => 'Groom\'s Suit/Tuxedo', 'designation' => 'General'],
                ['name' => 'Groomsmen\'s Attire', 'designation' => 'General'],
                ['name' => 'Accessories', 'designation' => 'General'],
            ],
        ]);

        Category::create([
            'name' => 'Hair & Makeup',
            'sub_categories' => [
                ['name' => 'Bridal Hair Stylist', 'designation' => 'General'],
                ['name' => 'Bridal Makeup Artist', 'designation' => 'General'],
                ['name' => 'Bridesmaids\' Hair & Makeup', 'designation' => 'General'],
                ['name' => 'Groom\'s Hair and Styling', 'designation' => 'General'],
            ],
        ]);

        Category::create([
            'name' => 'Wedding Planning',
            'sub_categories' => [
                ['name' => 'Full-Service Planner', 'designation' => 'General'],
                ['name' => 'Day-of Coordinator', 'designation' => 'General'],
                ['name' => 'Destination Wedding Planner', 'designation' => 'General'],
            ],
        ]);

        Category::create([
            'name' => 'Stationery',
            'sub_categories' => [
                ['name' => 'Invitations', 'designation' => 'General'],
                ['name' => 'Save-the-Dates', 'designation' => 'General'],
                ['name' => 'Programs', 'designation' => 'General'],
                ['name' => 'Place Cards', 'designation' => 'General'],
            ],
        ]);

        Category::create([
            'name' => 'Transportation',
            'sub_categories' => [
                ['name' => 'Limousine Services', 'designation' => 'General'],
                ['name' => 'Shuttle Services', 'designation' => 'General'],
                ['name' => 'Classic Car Rentals', 'designation' => 'General'],
                ['name' => 'Transport for Guests', 'designation' => 'General'],
            ],
        ]);

        Category::create([
            'name' => 'Officiant',
            'sub_categories' => [
                ['name' => 'Religious Officiant', 'designation' => 'General'],
                ['name' => 'Civil Officiant', 'designation' => 'General'],
                ['name' => 'Destination Wedding Officiant', 'designation' => 'General'],
            ],
        ]);

        Category::create([
            'name' => 'Decor',
            'sub_categories' => [
                ['name' => 'Rental Company', 'designation' => 'General'],
                ['name' => 'Lighting Services', 'designation' => 'General'],
                ['name' => 'Furniture Rentals', 'designation' => 'General'],
                ['name' => 'Themed Decor', 'designation' => 'General'],
            ],
        ]);

        Category::create([
            'name' => 'Favors & Gifts',
            'sub_categories' => [
                ['name' => 'Wedding Favors', 'designation' => 'General'],
                ['name' => 'Gift Registries', 'designation' => 'General'],
                ['name' => 'Bridal Party Gifts', 'designation' => 'General'],
            ],
        ]);

        Category::create([
            'name' => 'Jewelry',
            'sub_categories' => [
                ['name' => 'Wedding Bands', 'designation' => 'General'],
                ['name' => 'Engagement Rings', 'designation' => 'General'],
                ['name' => 'Bridal Jewelry', 'designation' => 'General'],
                ['name' => 'Groom\'s Accessories', 'designation' => 'General'],
            ],
        ]);

        Category::create([
            'name' => 'Additional Services',
            'sub_categories' => [
                ['name' => 'Day-of Coordination', 'designation' => 'General'],
                ['name' => 'Event Insurance', 'designation' => 'General'],
                ['name' => 'Wedding Websites', 'designation' => 'General'],
            ],
        ]);

        Category::create([
            'name' => 'Rentals',
            'sub_categories' => [
                ['name' => 'Tableware', 'designation' => 'General'],
                ['name' => 'Linens', 'designation' => 'General'],
                ['name' => 'Tents', 'designation' => 'General'],
                ['name' => 'Chairs', 'designation' => 'General'],
            ],
        ]);

        Category::create([
            'name' => 'Miscellaneous',
            'sub_categories' => [
                ['name' => 'Photo/Video Editing Services', 'designation' => 'General'],
                ['name' => 'Social Media Coordinator', 'designation' => 'General'],
                ['name' => 'Custom Signage', 'designation' => 'General'],
                ['name' => 'Pet Services', 'designation' => 'General'],
                ['name' => 'Other Miscellaneous', 'designation' => 'General'],
            ],
        ]);
    }
}
