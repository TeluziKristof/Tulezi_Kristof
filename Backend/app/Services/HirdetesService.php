<?php 

namespace App\Services;

use App\Repositories\HirdetesRepository;
use App\Models\Hirdetes;
use App\Models\HirdetesCardViewModel;
use App\Models\HirdetesTableViewModel;
use App\Validators\HirdetesValidator;
use Illuminate\Support\Facades\Log;

class HirdetesService {

    private HirdetesRepository $hirdetesRepository;

    public function __construct() {
        $this->hirdetesRepository = new HirdetesRepository();
    }

    public function getHirdetesekKartyak(): ?array {
        return $this->hirdetesRepository->getHirdetesekKartyak();
    }

    public function getHirdetesKartya(int $id): ?HirdetesCardViewModel {
        return $this->hirdetesRepository->getHirdetesKartya($id);
    } 

    public function getHirdetesReszlet(int $id): ?Hirdetes {
        return $this->hirdetesRepository->getHirdetesReszlet($id);
    } 

    public function getHirdetesekTabla(): ?array {
        return $this->hirdetesRepository->getHirdetesekTabla();
    }

    public function ujHirdetesFelvetele(Hirdetes $hirdetes): array {
        $hirdetesValidator = new HirdetesValidator();
        $hibak = $hirdetesValidator->ellenoriz($hirdetes);
    
        if (!empty($hibak)) {
            Log::error('Hirdetés validációs hiba', ['hibak' => $hibak, 'hirdetes' => $hirdetes]);
            return ["id" => null, "hibak" => $hibak];
        }
    
        $insertResult = $this->hirdetesRepository->ujHirdetesFelvetele($hirdetes);
    
        if ($insertResult) {
            $ujId = $this->hirdetesRepository->getUtolsoId();
            Log::info('Új hirdetés sikeresen mentve', ['id' => $ujId, 'hirdetes' => $hirdetes]);
            return ["id" => $ujId, "hibak" => null];
        } else {
            Log::error('Hiba a DB művelet során!', ['hirdetes' => $hirdetes]);
            return ["id" => null, "hibak" => ["Hiba a DB művelet során!"]];
        }
    }
    

}