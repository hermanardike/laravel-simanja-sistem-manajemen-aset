<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kodecctv;
use App\Models\Rack;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(10)->create();
//
//         \App\Models\User::factory()->create([
//             'name' => 'Admin',
//             'email' => 'admin@gmail.com',
//             'password' =>Hash::make('password'),
//         ]);

        $this->call([
           UserSeeder::class,
        ]);

        $this->call([
            PengadaanSeeder::class,
        ]);

        $this->call([
            RackSeeder::class,
        ]);

        $this->call([
            ServerSeeder::class,
        ]);

        $this->call([
           HostSeeder::class,
        ]);

        $this->call([
            OsSeeder::class,
        ]);

        $this->call([
            InstanceSeeder::class,
        ]);

        $this->call([
            SwSeeder::class,
        ]);

        $this->call([
            LokasiSeeder::class,
        ]);

        $this->call([
            VendorSeeder::class,
        ]);

        $this->call([
            AccespointSeeder::class,
        ]);

        $this->call([
            RouterSeeder::class,
        ]);


        $this->call([
            CctvSeeder::class,
        ]);

        $this->call([
           KodecctvSeeder::class,
        ]);

        $this->call([
            DomainSeeder::class,
        ]);
        $this->call([
            SubdomainSeeder::class,
        ]);

        $this->call([
            IpaddressSedeer::class,
        ]);

        $this->call([
            IpnetworkSeeder::class,
        ]);
    }
}
