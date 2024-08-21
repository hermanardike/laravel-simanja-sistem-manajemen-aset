<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subdomain;

class SubdomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subdomain::create([
            'subdomain_name' => 'unila.ac.id',
        ]);

        Subdomain::create([
            'subdomain_name' => 'eng.unila.ac.id',
        ]);

        Subdomain::create([
            'subdomain_name' => 'fmipa.unila.ac.id',
        ]);

        Subdomain::create([
            'subdomain_name' => 'fk.unila.ac.id',
        ]);

        Subdomain::create([
            'subdomain_name' => 'fp.unila.ac.id',
        ]);

        Subdomain::create([
            'subdomain_name' => 'pasca.unila.ac.id',
        ]);

        Subdomain::create([
            'subdomain_name' => 'fmipa.unila.ac.id',
        ]);

        Subdomain::create([
            'subdomain_name' => 'feb.unila.ac.id',
        ]);

        Subdomain::create([
            'subdomain_name' => 'fkip.unila.ac.id',
        ]);
    }
}
