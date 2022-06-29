<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Channel;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::insert([

            [
                'id'              =>  1,
                'name'            => 'History',
            ],    
            [
                'id'              =>  2,
                'name'            => 'MTV',
            ],    
            [
                'id'              =>  3,
                'name'            => 'SBT',
            ]          
        ]);
    }
}