<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use App\ModelPasien;
use App\ModelKonsultasi;
use Tests\TestCase;

class KonsultasiPasienTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testStore()
    {
        $konsul = new ModelKonsultasi();
        $konsul->id_pasien = 1;
        $konsul->pertanyaan = "Apakah obat XYZ ini palsu, karena tergolong sangat murah ?";
        $konsul->save();

        $this->assertDatabaseHas('konsultasi', [
            'id_pasien' => 1,
            'pertanyaan' => "Apakah obat XYZ ini palsu, karena tergolong sangat murah ?",
        ]);
    }
}
