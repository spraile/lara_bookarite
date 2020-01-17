<?php

use Illuminate\Database\Seeder;

class TicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_statuses')->insert ([
            'name' => 'Pending'
        ]);    
        DB::table('ticket_statuses')->insert ([
            'name' => 'Accepted'
        ]);
        DB::table('ticket_statuses')->insert ([
            'name' => 'Rejected'
        ]);
        DB::table('ticket_statuses')->insert ([
            'name' => 'Completed'
        ]);
        DB::table('ticket_statuses')->insert ([
            'name' => 'Cancelled'
        ]);
    }
}
