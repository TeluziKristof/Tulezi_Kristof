<?php

namespace App\Validators;

use App\Models\Hirdetes;

use Illuminate\Support\Facades\Log;

class HirdetesValidator {

    public function ellenoriz(Hirdetes $hirdetes): array {
        $hibak = [];

        if (trim($hirdetes->getNev()) == '') {
            $hibak[] = 'A név megadása kötelező!';
            Log::error('Validációs hiba: A név megadása kötelező!', ['hirdetes_id' => $hirdetes->getHirdetoId(), 'nev' => $hirdetes->getNev()]);
        }

        if (trim($hirdetes->getTelSzam()) == '') {
            $hibak[] = 'A telefonszám megadása kötelező!';
            Log::error('Validációs hiba: A telefonszám megadása kötelező!', ['hirdetes_id' => $hirdetes->getHirdetoId(), 'telSzam' => $hirdetes->getTelSzam()]);
        } 

        if (trim($hirdetes->getEmail()) == '') {
            $hibak[] = 'Az email cím megadása kötelező!';
            Log::error('Validációs hiba: Az email cím megadása kötelező!', ['hirdetes_id' => $hirdetes->getHirdetoId(), 'email' => $hirdetes->getEmail()]);
        } 

        if (trim($hirdetes->getHirdetesCim()) == '') {
            $hibak[] = 'A hirdetés címének megadása kötelező!';
            Log::error('Validációs hiba: A hirdetés címének megadása kötelező!', ['hirdetes_id' => $hirdetes->getHirdetoId(), 'hirdetes_cim' => $hirdetes->getHirdetesCim()]);
        }

        if (trim($hirdetes->getKepUrl()) == '') {
            $hibak[] = 'A képfájl URL megadása kötelező!';
            Log::error('Validációs hiba: A képfájl URL megadása kötelező!', ['hirdetes_id' => $hirdetes->getHirdetoId(), 'kep_url' => $hirdetes->getKepUrl()]);
        }

        if ($hirdetes->getAr() <= 0) {
            $hibak[] = 'Az ár nem lehet 0 vagy negatív!';
            Log::error('Validációs hiba: Az ár nem lehet 0 vagy negatív!', ['hirdetes_id' => $hirdetes->getHirdetoId(), 'ar' => $hirdetes->getAr()]);
        }

        if ($hirdetes->getLeiras() && strlen($hirdetes->getLeiras()) > 1000) {
            $hibak[] = 'A leírás túl hosszú! Maximum 1000 karakter megengedett.';
            Log::error('Validációs hiba: A leírás túl hosszú!', [
                'hirdetes_id' => $hirdetes->getHirdetoId(),
                'leiras_hossz' => strlen($hirdetes->getLeiras()),
                'message' => 'A leírás hosszúsága meghaladja az engedélyezett 1000 karaktert.'
            ]);
        }

        if (trim($hirdetes->getMarka()) == '') {
            $hibak[] = 'A márka megadása kötelező!';
            Log::error('Validációs hiba: A márka megadása kötelező!', ['hirdetes_id' => $hirdetes->getHirdetoId(), 'marka' => $hirdetes->getMarka()]);
        }

        if (trim($hirdetes->getModell()) == '') {
            $hibak[] = 'A modell megadása kötelező!';
            Log::error('Validációs hiba: A modell megadása kötelező!', ['hirdetes_id' => $hirdetes->getHirdetoId(), 'modell' => $hirdetes->getModell()]);
        }

        if (trim($hirdetes->getKivitel()) == '') {
            $hibak[] = 'A kivitel megadása kötelező!';
            Log::error('Validációs hiba: A kivitel megadása kötelező!', ['hirdetes_id' => $hirdetes->getHirdetoId(), 'kivitel' => $hirdetes->getKivitel()]);
        }

        if ($hirdetes->getEvjarat() < 1900 || $hirdetes->getEvjarat() > date('Y')) {
            $hibak[] = 'Érvénytelen évjárat!';
            Log::error('Validációs hiba: Érvénytelen évjárat!', ['hirdetes_id' => $hirdetes->getHirdetoId(), 'evjarat' => $hirdetes->getEvjarat()]);
        }

        if ($hirdetes->getKmOraAllas() < 0) {
            $hibak[] = 'A km állás nem lehet negatív!';
            Log::error('Validációs hiba: A km állás nem lehet negatív!', ['hirdetes_id' => $hirdetes->getHirdetoId(), 'km_ora_allas' => $hirdetes->getKmOraAllas()]);
        }

        if ($hirdetes->getSzallithatoSzemelySzama() < 1 || $hirdetes->getSzallithatoSzemelySzama() > 7) {
            $hibak[] = 'Érvénytelen személyszám!';
            Log::error('Validációs hiba: Érvénytelen személyszám!', [
                'hirdetes_id' => $hirdetes->getHirdetoId(),
                'szallithato_szemely_szama' => $hirdetes->getSzallithatoSzemelySzama()
            ]);
        }

        if ($hirdetes->getAjtokSzama() < 3 || $hirdetes->getAjtokSzama() > 5) {
            $hibak[] = 'Érvénytelen ajtók száma!';
            Log::error('Validációs hiba: Érvénytelen ajtók száma!', [
                'hirdetes_id' => $hirdetes->getHirdetoId(),
                'ajtok_szama' => $hirdetes->getAjtokSzama()
            ]);
        }

        if (trim($hirdetes->getUzemanyag()) == '') {
            $hibak[] = 'Az üzemanyag típus megadása kötelező!';
            Log::error('Validációs hiba: Az üzemanyag típus megadása kötelező!', ['hirdetes_id' => $hirdetes->getHirdetoId(), 'uzemanyag' => $hirdetes->getUzemanyag()]);
        }

        if ($hirdetes->getHengerurtartalom() <= 0) {
            $hibak[] = 'A hengerűrtartalom nem lehet 0 vagy negatív!';
            Log::error('Validációs hiba: A hengerűrtartalom nem lehet 0 vagy negatív!', ['hirdetes_id' => $hirdetes->getHirdetoId(), 'hengerurtartalom' => $hirdetes->getHengerurtartalom()]);
        }

        if ($hirdetes->getTeljesitmeny() <= 0) {
            $hibak[] = 'A teljesítmény nem lehet 0 vagy negatív!';
            Log::error('Validációs hiba: A teljesítmény nem lehet 0 vagy negatív!', ['hirdetes_id' => $hirdetes->getHirdetoId(), 'teljesitmeny' => $hirdetes->getTeljesitmeny()]);
        }

        return $hibak;
    }
}

