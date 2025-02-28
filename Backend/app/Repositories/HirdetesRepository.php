<?php 

namespace App\Repositories;

use App\Models\Hirdetes;
use App\Models\HirdetesCardViewModel;
use App\Models\HirdetesTableViewModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HirdetesRepository {

    public function getHirdetesekKartyak() : ?array {
        try {

            $sql = 
            'SELECT
            hs.id AS hirdetes_id, 
            hs.kep_url AS kep_url, 
            ho.nev AS nev, 
            hs.hirdetes_cim AS hirdetes_cim, 
            ja.uzemanyag AS uzemanyag, 
            aa.evjarat AS evjarat, 
            hs.ar AS ar, 
            hs.leiras AS leiras
            FROM hirdetes hs
            JOIN hirdeto_hirdetes_kapcsolat hkk ON hs.id = hkk.hirdetes_id
            JOIN hirdeto ho ON ho.id = hkk.hirdeto_id
            JOIN altalanos_adat aa ON hs.id = aa.hirdetes_id
            JOIN jarmu_adat ja ON hs.id = ja.hirdetes_id';

            $sqlResult = DB::select($sql);

            $result = [];

            foreach($sqlResult as $row) {
                $hirdetesCard = HirdetesCardViewModel::fromSqlRow($row);
                $result[] = $hirdetesCard; 
            }

            return $result;
        } catch (\Exception $e) {
            echo($e);
            return null;
        }
    }

     public function getHirdetesKartya(int $id) : ?HirdetesCardViewModel {
        try {

            $sql = 
            'SELECT 
            hs.id AS hirdetes_id,
            hs.kep_url AS kep_url, 
            ho.nev AS nev, 
            hs.hirdetes_cim AS hirdetes_cim, 
            ja.uzemanyag AS uzemanyag, 
            aa.evjarat AS evjarat, 
            hs.ar AS ar, 
            hs.leiras AS leiras
            FROM hirdetes hs
            JOIN hirdeto_hirdetes_kapcsolat hkk ON hs.id = hkk.hirdetes_id
            JOIN hirdeto ho ON ho.id = hkk.hirdeto_id
            JOIN altalanos_adat aa ON hs.id = aa.hirdetes_id
            JOIN jarmu_adat ja ON hs.id = ja.hirdetes_id
            WHERE hs.id = :id';

            $sqlResult = DB::select($sql, ['id' => $id]);

            if(count($sqlResult) != 1) {
                return null;
            }

            return HirdetesCardViewModel::fromSqlRow($sqlResult[0]);

        } catch (\Exception $e) {
            echo($e);
            return null;
        }
    } 

    public function getHirdetesReszlet(int $id) : ?Hirdetes {
        try {

            $sql = 'SELECT
            h.id AS hirdeto_id,
            h.nev AS hirdeto_nev,
            h.tel_szam AS hirdeto_tel_szam,
            h.email AS hirdeto_email,
            
            ht.id AS hirdetes_id,
            ht.hirdetes_cim AS hirdetes_cim,
            ht.kep_url AS hirdetes_kep_url,
            ht.ar AS hirdetes_ar,
            ht.leiras AS hirdetes_leiras,
            
            aa.marka AS altalanos_adat_marka,
            aa.modell AS altalanos_adat_modell,
            aa.kivitel AS altalanos_adat_kivitel,
            aa.evjarat AS altalanos_adat_evjarat,
            
            ja.km_ora_allas AS jarmu_adat_km_ora_allas,
            ja.szallithato_szemely_szama AS jarmu_adat_szallithato_szemely_szama,
            ja.ajtok_szama AS jarmu_adat_ajtok_szama,
            ja.uzemanyag AS jarmu_adat_uzemanyag,
            ja.hengerurtartalom AS jarmu_adat_hengerurtartalom,
            ja.teljesitmeny AS jarmu_adat_teljesitmeny
        
        FROM
            hirdetes ht
        JOIN
            hirdeto_hirdetes_kapcsolat hhk ON ht.id = hhk.hirdetes_id  
        JOIN
            hirdeto h ON hhk.hirdeto_id = h.id  
        JOIN
            altalanos_adat aa ON ht.id = aa.hirdetes_id
        JOIN
            jarmu_adat ja ON ht.id = ja.hirdetes_id
        WHERE ht.id = :id';

            $sqlResult = DB::select($sql, ['id' => $id]);

            if(count($sqlResult) != 1) {
                return null;
            }

            return Hirdetes::fromSqlRow($sqlResult[0]);

        } catch (\Exception $e) {
            echo($e);
            return null;
        }
    } 

    public function getHirdetesekTabla() : ?array {
        try {

            $sql = 'SELECT
    h.id AS hirdeto_id,
    h.nev AS hirdeto_nev,
    h.tel_szam AS hirdeto_tel_szam,
    h.email AS hirdeto_email,
    
    ht.id AS hirdetes_id,
    ht.hirdetes_cim AS hirdetes_cim,
    ht.kep_url AS hirdetes_kep_url,
    ht.ar AS hirdetes_ar,
    ht.leiras AS hirdetes_leiras,
    
    aa.marka AS altalanos_adat_marka,
    aa.modell AS altalanos_adat_modell,
    aa.kivitel AS altalanos_adat_kivitel,
    aa.evjarat AS altalanos_adat_evjarat,
    
    ja.km_ora_allas AS jarmu_adat_km_ora_allas,
    ja.szallithato_szemely_szama AS jarmu_adat_szallithato_szemely_szama,
    ja.ajtok_szama AS jarmu_adat_ajtok_szama,
    ja.uzemanyag AS jarmu_adat_uzemanyag,
    ja.hengerurtartalom AS jarmu_adat_hengerurtartalom,
    ja.teljesitmeny AS jarmu_adat_teljesitmeny

FROM
    hirdetes ht
JOIN
    hirdeto_hirdetes_kapcsolat hhk ON ht.id = hhk.hirdetes_id  
JOIN
    hirdeto h ON hhk.hirdeto_id = h.id  
JOIN
    altalanos_adat aa ON ht.id = aa.hirdetes_id
JOIN
    jarmu_adat ja ON ht.id = ja.hirdetes_id;
';

            $sqlResult = DB::select($sql);

            $result = [];

            foreach($sqlResult as $row) {
                $hirdetesTable = Hirdetes::fromSqlRow($row);
                $result[] = $hirdetesTable; 
            }

            return $result;
        } catch (\Exception $e) {
            echo($e);
            return null;
        }
    }

    public function ujHirdetesFelvetele(Hirdetes $hirdetes): bool {
        try {
            DB::beginTransaction();
            
            $existingHirdeto = DB::select("SELECT id FROM hirdeto WHERE email = :email AND tel_szam = :tel_szam", [
                'email' => $hirdetes->getEmail(),
                'tel_szam' => $hirdetes->getTelSzam(),
            ]);
            
            if (empty($existingHirdeto)) {
                DB::insert("INSERT INTO hirdeto (nev, tel_szam, email) VALUES (:nev, :tel_szam, :email)", [
                    'nev' => $hirdetes->getNev(),
                    'tel_szam' => $hirdetes->getTelSzam(),
                    'email' => $hirdetes->getEmail(),
                ]);
                
                $hirdetoId = $this->getUtolsoId('hirdeto');
                Log::info("Új hirdető létrehozva: Hirdető ID: {$hirdetoId}");
            } else {
                $hirdetoId = $existingHirdeto[0]->id;
                Log::info("Hirdető már létezik: Hirdető ID: {$hirdetoId}");
            }
            
            DB::insert("INSERT INTO hirdetes (hirdetes_cim, kep_url, ar, leiras) VALUES (:hirdetes_cim, :kep_url, :ar, :leiras)", [
                'hirdetes_cim' => $hirdetes->getHirdetesCim(),
                'kep_url' => $hirdetes->getKepUrl(),
                'ar' => $hirdetes->getAr(),
                'leiras' => $hirdetes->getLeiras(),
            ]);
            
            $hirdetesId = $this->getUtolsoId('hirdetes');
            Log::info("Új hirdetés létrehozva: Hirdetés ID: {$hirdetesId}");
            
            DB::insert("INSERT INTO hirdeto_hirdetes_kapcsolat (hirdeto_id, hirdetes_id) VALUES (:hirdeto_id, :hirdetes_id)", [
                'hirdeto_id' => $hirdetoId,
                'hirdetes_id' => $hirdetesId,
            ]);
            Log::info("Hirdető és hirdetés összekapcsolva: Hirdető ID: {$hirdetoId}, Hirdetés ID: {$hirdetesId}");
            
            DB::insert("INSERT INTO altalanos_adat (hirdetes_id, marka, modell, kivitel, evjarat) 
                        VALUES (:hirdetes_id, :marka, :modell, :kivitel, :evjarat)", [
                'hirdetes_id' => $hirdetesId,
                'marka' => $hirdetes->getMarka(),
                'modell' => $hirdetes->getModell(),
                'kivitel' => $hirdetes->getKivitel(),
                'evjarat' => $hirdetes->getEvjarat(),
            ]);
            Log::info("Autó adat beszúrva: Hirdetés ID: {$hirdetesId}");
            
            DB::insert("INSERT INTO jarmu_adat (hirdetes_id, km_ora_allas, szallithato_szemely_szama, ajtok_szama, uzemanyag, hengerurtartalom, teljesitmeny)
                        VALUES (:hirdetes_id, :km_ora_allas, :szallithato_szemely_szama, :ajtok_szama, :uzemanyag, :hengerurtartalom, :teljesitmeny)", [
                'hirdetes_id' => $hirdetesId,
                'km_ora_allas' => $hirdetes->getKmOraAllas(),
                'szallithato_szemely_szama' => $hirdetes->getSzallithatoSzemelySzama(),
                'ajtok_szama' => $hirdetes->getAjtokSzama(),
                'uzemanyag' => $hirdetes->getUzemanyag(),
                'hengerurtartalom' => $hirdetes->getHengerurtartalom(),
                'teljesitmeny' => $hirdetes->getTeljesitmeny(),
            ]);
            Log::info("Jármű adatok beszúrva: Hirdetés ID: {$hirdetesId}");
            
            DB::commit();
            Log::info("Tranzakció sikeresen befejezve.");
            
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Hiba a tranzakció során: ' . $e->getMessage(), [
                'hirdetes_id' => $hirdetes->getId(),
                'exception' => $e->getMessage()
            ]);
            return false;
        }
    }
    
    
    public function getUtolsoId()  {
        $result = DB::select("SELECT LAST_INSERT_ID() AS uj_id");
        return $result[0]->uj_id;
    }
    

}