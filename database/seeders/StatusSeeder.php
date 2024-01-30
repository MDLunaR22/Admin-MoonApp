<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Status;

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Status::factory(10)->create();

        // $status = new Status();
        // $status->name = 'Entregando...';
        // $status->description = 'El pedido se encuentra en camino';
        // $status->order = 1;

        // $status->save();

        // $status1 = new Status();
        // $status1->name = 'Entregado';
        // $status1->description = 'El pedido se ha entregad';
        // $status1->order = 1;

        // $status1->save();

        // $status2 = new Status();
        // $status2->name = 'En bodega';
        // $status2->description = 'Esta en bodega central esperando ser enviado a domicilio';
        // $status2->order = 1;

        // $status2->save();
    }
}
