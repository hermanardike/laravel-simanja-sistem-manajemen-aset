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
            'rack_number' => 'RACK A1',
        ]);
        Rack::create([
            'rack_number' => 'RACK A2',
        ]);
        Rack::create([
            'rack_number' => 'RACK A3',
        ]);
        Rack::create([
            'rack_number' => 'RACK A4',
        ]);
        Rack::create([
            'rack_number' => 'RACK A5',
        ]);
        Rack::create([
            'rack_number' => 'RACK A6',
        ]);

        Rack::create([
        'rack_number' => 'RACK A7',
           ]);

        Rack::create([
            'rack_number' => 'RACK A8',
        ]);
        Rack::create([
            'rack_number' => 'RACK A9',
        ]);Rack::create([
        'rack_number' => 'RACK A10',
        ]);
        Rack::create([
            'rack_number' => 'RACK A11',
        ]);
        Rack::create([
            'rack_number' => 'RACK A12',
        ]);
        Rack::create([
            'rack_number' => 'RACK A13',
        ]);

        // RACK B

        Rack::create([
            'rack_number' => 'RACK B1',
        ]);
        Rack::create([
            'rack_number' => 'RACK B2',
        ]);
        Rack::create([
            'rack_number' => 'RACK B3',
        ]);
        Rack::create([
            'rack_number' => 'RACK B4',
        ]);
        Rack::create([
            'rack_number' => 'RACK B5',
        ]);
        Rack::create([
            'rack_number' => 'RACK B6',
        ]);

        Rack::create([
            'rack_number' => 'RACK B7',
        ]);

        Rack::create([
            'rack_number' => 'RACK B8',
        ]);
        Rack::create([
            'rack_number' => 'RACK B9',
        ]);Rack::create([
        'rack_number' => 'RACK B10',
    ]);
        Rack::create([
            'rack_number' => 'RACK B11',
        ]);
        Rack::create([
            'rack_number' => 'RACK B12',
        ]);
        Rack::create([
            'rack_number' => 'RACK B13',
        ]);

    }
}
