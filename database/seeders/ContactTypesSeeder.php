<?php

namespace Database\Seeders;

use App\Enums\ContactTypeEnum;
use App\Models\ContactType;
use Illuminate\Database\Seeder;

class ContactTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactType::create([
            'typecode' => ContactTypeEnum::EMAIL,
            'description' => 'Email',
            'order' => 1
        ]);
        ContactType::create([
            'typecode' => ContactTypeEnum::ADDRESS,
            'description' => 'Indirizzo',
            'order' => 2
        ]);
        ContactType::create([
            'typecode' => ContactTypeEnum::PHONE,
            'description' => 'Telefono',
            'order' => 3
        ]);
        ContactType::create([
            'typecode' => ContactTypeEnum::MOBILE,
            'description' => 'Cellulare',
            'order' => 4
        ]);
        ContactType::create([
            'typecode' => ContactTypeEnum::WHATSAPP,
            'description' => 'Whatsapp',
            'order' => 5
        ]);
    }
}
