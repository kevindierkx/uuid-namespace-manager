<?php namespace Uuid;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UuidNamespacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // The App\Traits\DateFormatTrait breaks when the created_at and
        // updated_at are 0000-00-00 00:00:00.
        $now = Carbon::now();

        DB::table('uuid_namespaces')->insert([
            'name' => 'DNS',
            'description' => 'Name string is a fully-qualified domain name',
            'uuid' => '6ba7b810-9dad-11d1-80b4-00c04fd430c8',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('uuid_namespaces')->insert([
            'name' => 'URL',
            'description' => 'Name string is a URL',
            'uuid' => '6ba7b811-9dad-11d1-80b4-00c04fd430c8',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('uuid_namespaces')->insert([
            'name' => 'ISO_OID',
            'description' => 'Name string is an ISO OID',
            'uuid' => '6ba7b812-9dad-11d1-80b4-00c04fd430c8',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('uuid_namespaces')->insert([
            'name' => 'X500',
            'description' => 'Name string is an X.500 DN (in DER or a text output format)',
            'uuid' => '6ba7b814-9dad-11d1-80b4-00c04fd430c8',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
