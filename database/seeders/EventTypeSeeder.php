<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EventType;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eventTypes = [
            ['name' => 'LDP', 'description' => 'Leadership Development Program (LDP)'],
            ['name' => 'FLC', 'description' => 'Fintech Leadership Conclave (FLC)'],
        ];

        foreach ($eventTypes as $type) {
            EventType::create($type);
        }
    }
}
