<?php

namespace App\Models;

class Hirdetes implements \JsonSerializable {

    private int $hirdetoId;
    private string $nev;
    private string $telSzam;
    private string $email;

    private int $hirdetesId;
    private string $hirdetesCim;
    private string $kepUrl;
    private int $ar;
    private ?string $leiras;

    private string $marka;
    private string $modell;
    private string $kivitel;
    private int $evjarat;

    private int $kmOraAllas;
    private int $szallithatoSzemelySzama;
    private int $ajtokSzama;
    private string $uzemanyag;
    private int $hengerurtartalom;
    private int $teljesitmeny;

    public function __construct(
        int $hirdetoId, string $nev, string $telSzam, string $email,
        int $hirdetesId, string $hirdetesCim, string $kepUrl, int $ar, ?string $leiras,
        string $marka, string $modell, string $kivitel, int $evjarat,
        int $kmOraAllas, int $szallithatoSzemelySzama, int $ajtokSzama,
        string $uzemanyag, int $hengerurtartalom, int $teljesitmeny
    ) {
        $this->hirdetoId = $hirdetoId;
        $this->nev = $nev;
        $this->telSzam = $telSzam;
        $this->email = $email;
        $this->hirdetesId = $hirdetesId;
        $this->hirdetesCim = $hirdetesCim;
        $this->kepUrl = $kepUrl;
        $this->ar = $ar;
        $this->leiras = $leiras;
        $this->marka = $marka;
        $this->modell = $modell;
        $this->kivitel = $kivitel;
        $this->evjarat = $evjarat;
        $this->kmOraAllas = $kmOraAllas;
        $this->szallithatoSzemelySzama = $szallithatoSzemelySzama;
        $this->ajtokSzama = $ajtokSzama;
        $this->uzemanyag = $uzemanyag;
        $this->hengerurtartalom = $hengerurtartalom;
        $this->teljesitmeny = $teljesitmeny;
    }




    public function getHirdetoId(): int {
        return $this->hirdetoId;
    }

    public function setHirdetoId(int $hirdetoId): void {
        $this->hirdetoId = $hirdetoId;
    }

    public function getNev(): string {
        return $this->nev;
    }

    public function setNev(string $nev): void {
        $this->nev = $nev;
    }

    public function getTelSzam(): string {
        return $this->telSzam;
    }

    public function setTelSzam(string $telSzam): void {
        $this->telSzam = $telSzam;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getHirdetesId(): int {
        return $this->hirdetesId;
    }

    public function setHirdetesId(int $hirdetesId): void {
        $this->hirdetesId = $hirdetesId;
    }

    public function getHirdetesCim(): string {
        return $this->hirdetesCim;
    }

    public function setHirdetesCim(string $hirdetesCim): void {
        $this->hirdetesCim = $hirdetesCim;
    }

    public function getKepUrl(): string {
        return $this->kepUrl;
    }

    public function setKepUrl(string $kepUrl): void {
        $this->kepUrl = $kepUrl;
    }

    public function getAr(): int {
        return $this->ar;
    }

    public function setAr(int $ar): void {
        $this->ar = $ar;
    }

    public function getLeiras(): ?string {
        return $this->leiras;
    }

    public function setLeiras(?string $leiras): void {
        $this->leiras = $leiras;
    }

    public function getMarka(): string {
        return $this->marka;
    }

    public function setMarka(string $marka): void {
        $this->marka = $marka;
    }

    public function getModell(): string {
        return $this->modell;
    }

    public function setModell(string $modell): void {
        $this->modell = $modell;
    }

    public function getKivitel(): string {
        return $this->kivitel;
    }

    public function setKivitel(string $kivitel): void {
        $this->kivitel = $kivitel;
    }

    public function getEvjarat(): int {
        return $this->evjarat;
    }

    public function setEvjarat(int $evjarat): void {
        $this->evjarat = $evjarat;
    }

    public function getKmOraAllas(): int {
        return $this->kmOraAllas;
    }

    public function setKmOraAllas(int $kmOraAllas): void {
        $this->kmOraAllas = $kmOraAllas;
    }

    public function getSzallithatoSzemelySzama(): int {
        return $this->szallithatoSzemelySzama;
    }

    public function setSzallithatoSzemelySzama(int $szallithatoSzemelySzama): void {
        $this->szallithatoSzemelySzama = $szallithatoSzemelySzama;
    }

    public function getAjtokSzama(): int {
        return $this->ajtokSzama;
    }

    public function setAjtokSzama(int $ajtokSzama): void {
        $this->ajtokSzama = $ajtokSzama;
    }

    public function getUzemanyag(): string {
        return $this->uzemanyag;
    }

    public function setUzemanyag(string $uzemanyag): void {
        $this->uzemanyag = $uzemanyag;
    }

    public function getHengerurtartalom(): int {
        return $this->hengerurtartalom;
    }

    public function setHengerurtartalom(int $hengerurtartalom): void {
        $this->hengerurtartalom = $hengerurtartalom;
    }

    public function getTeljesitmeny(): int {
        return $this->teljesitmeny;
    }

    public function setTeljesitmeny(int $teljesitmeny): void {
        $this->teljesitmeny = $teljesitmeny;
    }

    public static function fromSqlRow(object $row): ?Hirdetes {
        try {
            return new Hirdetes(
                $row->hirdeto_id,
                $row->hirdeto_nev,
                $row->hirdeto_tel_szam,
                $row->hirdeto_email,
                $row->hirdetes_id,
                $row->hirdetes_cim,
                $row->hirdetes_kep_url,
                $row->hirdetes_ar,
                $row->hirdetes_leiras,
                $row->altalanos_adat_marka,
                $row->altalanos_adat_modell,
                $row->altalanos_adat_kivitel,
                $row->altalanos_adat_evjarat,
                $row->jarmu_adat_km_ora_allas,
                $row->jarmu_adat_szallithato_szemely_szama,
                $row->jarmu_adat_ajtok_szama,
                $row->jarmu_adat_uzemanyag,
                $row->jarmu_adat_hengerurtartalom,
                $row->jarmu_adat_teljesitmeny
            );
        } catch (\Exception $e) {
            echo($e);
            return null;
        }
    }

    public static function fromRequest(array $data): ?Hirdetes {
        try {
            if (!is_string($data['nev']) ||
                !is_string($data['telSzam']) ||
                !is_string($data['email']) ||
                !is_string($data['hirdetesCim']) ||
                !is_string($data['kepUrl']) ||
                !is_int($data['ar']) ||
                (isset($data['leiras']) && !is_string($data['leiras'])) ||
                !is_string($data['marka']) ||
                !is_string($data['modell']) ||
                !is_string($data['kivitel']) ||
                !is_int($data['evjarat']) ||
                !is_int($data['kmOraAllas']) ||
                !is_int($data['szallithatoSzemelySzama']) ||
                !is_int($data['ajtokSzama']) ||
                !is_string($data['uzemanyag']) ||
                !is_int($data['hengerurtartalom']) ||
                !is_int($data['teljesitmeny'])
            ) {
                return null;
            }

            return new Hirdetes(
                0, 
                $data['nev'],
                $data['telSzam'],
                $data['email'],
                0,
                $data['hirdetesCim'],
                $data['kepUrl'],
                $data['ar'],
                $data['leiras'] ?? null,
                $data['marka'],
                $data['modell'],
                $data['kivitel'],
                $data['evjarat'],
                $data['kmOraAllas'],
                $data['szallithatoSzemelySzama'],
                $data['ajtokSzama'],
                $data['uzemanyag'],
                $data['hengerurtartalom'],
                $data['teljesitmeny']
            );

        } catch (\Exception $e) {
            var_dump($e->getMessage());
            return null; 
        }
    }


    public function jsonSerialize(): array {
        return get_object_vars($this);
    }
}
