<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run()
    {
        Contact::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'subject' => 'Product Inquiry',
            'message' => 'Hello, I would like to know more about your products. Can you send me the catalog?',
            'status' => 'read',
        ]);

        Contact::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'subject' => 'Order Issue',
            'message' => 'My order #12345 has not arrived yet. Can you check the status?',
            'status' => 'replied',
        ]);

        Contact::create([
            'name' => 'Robert Johnson',
            'email' => 'robert@example.com',
            'subject' => 'Website Feedback',
            'message' => 'Great website! I love the user interface and the product selection.',
            'status' => 'unread',
        ]);

        Contact::create([
            'name' => 'Sarah Williams',
            'email' => 'sarah@example.com',
            'subject' => 'Return Request',
            'message' => 'I would like to return a product. What is the return policy?',
            'status' => 'read',
        ]);

        Contact::create([
            'name' => 'Michael Brown',
            'email' => 'michael@example.com',
            'subject' => 'Partnership Inquiry',
            'message' => 'I am interested in partnering with your company. Please contact me.',
            'status' => 'unread',
        ]);
    }
}