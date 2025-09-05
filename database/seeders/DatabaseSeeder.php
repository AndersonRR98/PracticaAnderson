<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\ChatSupport;
use App\Models\Coment;
use App\Models\Complaint;
use App\Models\Image;
use App\Models\Publication;
use App\Models\PublicationUser;
use App\Models\Role;
use App\Models\Seller;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory(5)->create();
        Category::factory(5)->create();
        User::factory(10)->create();
        Seller::factory(5)->create();
        Publication::factory(20)->create();
        Image::factory(10)->create();
        ChatSupport::factory(20)->create();
        PublicationUser::factory(20)->create();
        Coment::factory(20)->create();
        Complaint::factory(20)->create();


    

        
    }
}
