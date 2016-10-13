<?php

use Illuminate\Database\Seeder;

use App\User;

use App\Notebook;

use App\Note;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Notebook::truncate();
        Note::truncate();

        factory(App\User::class, 5)->create()->each(function($u) {
        	$u->notebooks()->save(factory(App\Notebook::class)->make());
        });

        $notebooks = Notebook::all();
        foreach ($notebooks as $notebook) {
            $notebook->notes()->save(factory(App\Note::class)->make());
        }
    }
}
