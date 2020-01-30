<?php

use Illuminate\Database\Seeder;
use App\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Payment::create([
            'block_id'          =>  1,
            'from'              =>  '0xBB9bc244D798123fDe783fCc1C72d3Bb8C189413',
            'to'                =>  '0xeafa188ac12e331b52e585ea6298f8138e23c0e6',
            'amount'            =>  500.00,
        ]);
    }
}
