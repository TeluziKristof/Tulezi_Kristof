<?php

namespace App\Models;

class HirdetesCardViewModel implements \JsonSerializable {

    private int $hirdetesId;
    private string $kepUrl;
    private string $felhasznaloNev;
    private string $hirdetesCim;
    private string $uzemanyag;
    private int $evjarat;
    private int $ar;
    private ?string $leiras;

    public function __construct(
        int $hirdetesId,
        string $kepUrl, string $felhasznaloNev, string $hirdetesCim, 
        string $uzemanyag, int $evjarat, int $ar, ?string $leiras
    ) {
        $this->hirdetesId = $hirdetesId;
        $this->kepUrl = $kepUrl;
        $this->felhasznaloNev = $felhasznaloNev;
        $this->hirdetesCim = $hirdetesCim;
        $this->uzemanyag = $uzemanyag;
        $this->evjarat = $evjarat;
        $this->ar = $ar;
        $this->leiras = $leiras;
    }

    public function getHirdetesId(): int {
        return $this->hirdetesId;
    }

    public function setHirdetesId(int $hirdetesId): void {
        $this->hirdetesId = $hirdetesId;
    }

    public function getKepUrl(): string {
        return $this->kepUrl;
    }

    public function setKepUrl(string $kepUrl): void {
        $this->kepUrl = $kepUrl;
    }

    public function getFelhasznaloNev(): string {
        return $this->felhasznaloNev;
    }

    public function setFelhasznaloNev(string $felhasznaloNev): void {
        $this->felhasznaloNev = $felhasznaloNev;
    }

    public function getHirdetesCim(): string {
        return $this->hirdetesCim;
    }

    public function setHirdetesCim(string $hirdetesCim): void {
        $this->hirdetesCim = $hirdetesCim;
    }

    public function getUzemanyag(): string {
        return $this->uzemanyag;
    }

    public function setUzemanyag(string $uzemanyag): void {
        $this->uzemanyag = $uzemanyag;
    }

    public function getEvjarat(): int {
        return $this->evjarat;
    }

    public function setEvjarat(int $evjarat): void {
        $this->evjarat = $evjarat;
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

    public function jsonSerialize(): array {
        return get_object_vars($this);
    }

    public static function fromSqlRow(object $row): ?HirdetesCardViewModel {
        try {
            return new HirdetesCardViewModel(
                $row->hirdetes_id,
                $row->kep_url,
                $row->nev,
                $row->hirdetes_cim,
                $row->uzemanyag,
                $row->evjarat,
                $row->ar,
                $row->leiras
            );
        } catch (\Exception $e) {
            echo($e);
            return null;
        }
    }
}
