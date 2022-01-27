<?php

namespace Database\Seeders;

use App\Models\Ganga;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class GangaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i= 1;$i<61; $i++){
            Ganga::factory()->times(1)->create();
            File::copy(public_path('images/lll.jpg'),public_path('images/'.$i.'Ganga-ganga-severa.jpg'));
        }

    }
}
