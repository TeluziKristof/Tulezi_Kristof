<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\TestCase;

class HirdetesControllerTest extends TestCase
{

    public function testHirdetesKartyakWorking() {
        $response = $this->get('/hirdetesek/kartyak');
        $response->assertStatus(200);
    }

    public function testHirdetesKartyaWorking() {

        $validIds = [1, 2, 5, 10];

        foreach($validIds as $id) {
            $response = $this->get('/hirdetesek/kartyak/' .$id);
            $response->assertStatus(200);
        }

    }

    public function testHirdetesKartyaWorkingWithWrongIds() {

        $invalidIds = [50, 100];

        foreach($invalidIds as $id) {
            $response = $this->get('/hirdetesek/kartyak/' .$id);
            $response->assertStatus(404);
        }

    }


    public function testHirdetesReszletekWorking() {

        $validIds = [1, 2, 5, 10];

        foreach($validIds as $id) {
            $response = $this->get('/hirdetesek/reszletek/' .$id);
            $response->assertStatus(200);
        }

    }

    public function testHirdetesReszletekWorkingWithWrongIds() {

        $invalidIds = [50, 100];

        foreach($invalidIds as $id) {
            $response = $this->get('/hirdetesek/reszletek/' .$id);
            $response->assertStatus(404);
        }

    }

    public function testHirdetesTablakWorking() {
        $response = $this->get('/hirdetesek/tabla');
        $response->assertStatus(200);
    }

    public function testHirdetesAddWorking() {
        $data = [
            "nev" => "John Doe",
            "telSzam" => "1234567890",
            "email" => "johndoe@example.com",
            "hirdetesCim" => "Eladó autó",
            "kepUrl" => "https://example.com/image.jpg",
            "ar" => 5000000,
            "leiras" => "Jó állapotú",
            "marka" => "Ford",
            "modell" => "Focus",
            "kivitel" => "Sedan",
            "evjarat" => 2018,
            "kmOraAllas" => 35000,
            "szallithatoSzemelySzama" => 5,
            "ajtokSzama" => 5,
            "uzemanyag" => "Benzin",
            "hengerurtartalom" => 1600,
            "teljesitmeny" => 120
        ];
    $response = $this->post('/hirdetesek', $data);
    $response->assertStatus(200);
    }

}