<?php

namespace Database\Seeders;

use App\Models\Rack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rack::create([
            'rack_number' => 'RACK 1',
        ]);
        Rack::create([
            'rack_number' => 'RACK 2',
        ]);
        Rack::create([
            'rack_number' => 'RACK 3',
        ]);
        Rack::create([
            'rack_number' => 'RACK 4',
        ]);
        Rack::create([
            'rack_number' => 'RACK 5',
        ]);
        Rack::create([
            'rack_number' => 'RACK 6',
        ]);

        Rack::create([
        'rack_number' => 'RACK 7',
           ]);

        Rack::create([
            'rack_number' => 'RACK 8',
        ]);
        Rack::create([
            'rack_number' => 'RACK 9',
        ]);Rack::create([
        'rack_number' => 'RACK 10',
    ]);
        Rack::create([
            'rack_number' => 'RACK 11',
        ]);
        Rack::create([
            'rack_number' => 'RACK 12',
        ]);
        Rack::create([
            'rack_number' => 'RACK 13',
        ]);
    }
}
