<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Room;
use App\Models\User;
use App\Models\Screening;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $movie = Movie::factory()->create();
        Movie::factory(5)->create();
        $room = Room::factory()->create();

        Screening::factory(2)->create([
            "movie_id" => $movie->id,
            "room_id" => $room->id
        ]);

        // Movie::create([
        //     [
        //         "id" => 1,
        //         "title" => "Tennet",
        //         "description" => "Tennet is confusing but good and time wimey stuff happens so yeah",
        //         "image" => "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fd2iltjk184xms5.cloudfront.net%2Fuploads%2Fphoto%2Ffile%2F376340%2F341a2b07b7f71e5a3a89c728f3ac0a0b-artwork-tenet_5f3fee0a5c142.jpg&f=1&nofb=1&ipt=cf215719a38a59802f3cf492783da482865a4a973f20e71d5434cd45f2d9e2cc&ipo=images"
        //     ],
        //     [
        //         "id" => 2,
        //         "title" => "The Wolf of Wallstreet",
        //         "description" => "Drugs and sex and money and stuff",
        //         "image" => "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmoviepronews.com%2Fwp-content%2Fuploads%2F2013%2F12%2FTHE-WOLF-OF-WALL-STREET-Poster-620x918.jpg&f=1&nofb=1&ipt=b3521b01b03a9c29db394d51d0842d4d8b7d7625d1c4b4a350703273cdea9229&ipo=images"
        //     ]
        // ]);
    }
}
