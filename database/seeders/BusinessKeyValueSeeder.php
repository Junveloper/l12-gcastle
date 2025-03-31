<?php

namespace Database\Seeders;

use App\Domains\BusinessKeyValue\Enums\BusinessKeyValueUsage;
use App\Domains\BusinessKeyValue\Models\BusinessKeyValue;
use Illuminate\Database\Seeder;

class BusinessKeyValueSeeder extends Seeder
{
    public function run()
    {
        BusinessKeyValue::factory()
            ->createMany([
                [
                    'key' => 'instagram_url',
                    'label' => 'Instagram',
                    'value' => 'https://www.instagram.com/gcastlebrisbane',
                    'usage' => BusinessKeyValueUsage::SocialMedia,
                ],
                [
                    'key' => 'facebook_url',
                    'label' => 'Facebook',
                    'value' => 'https://www.facebook.com/gcastlebrisbane',
                    'usage' => BusinessKeyValueUsage::SocialMedia,
                ],
                [
                    'key' => 'google_maps_url',
                    'label' => 'Google Maps',
                    'value' => 'https://maps.app.goo.gl/QEC7BHCSePM76egB6',
                    'usage' => BusinessKeyValueUsage::Map,
                ],
                [
                    'key' => 'email',
                    'label' => 'Email',
                    'value' => 'gcastlejun@gmail.com',
                    'usage' => BusinessKeyValueUsage::Contact,
                ],
                [
                    'key' => 'phone',
                    'label' => 'Phone',
                    'value' => '0426 381 695',
                    'usage' => BusinessKeyValueUsage::Contact,
                ],
                [
                    'key' => 'address',
                    'label' => 'Address',
                    'value' => 'Basement/81 Elizabeth St, Brisbane City QLD 4000',
                    'usage' => BusinessKeyValueUsage::Address,
                ],
            ]);
    }
}
