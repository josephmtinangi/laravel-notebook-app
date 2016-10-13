<?php

use Illuminate\Database\Seeder;

use App\User;

use App\Notebook;

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

        factory(App\User::class, 5)->create()->each(function($u) {
        	$u->notebooks()->save(factory(App\Notebook::class)->make());
        });
    }
}
