<?php

namespace App\Http\Controllers;

use App\Services\HirdetesService;
use App\Models\Hirdetes;
use App\Models\HirdetesCardViewModel;
use App\Models\HirdetesTableViewModel;

use Illuminate\Http\Request;

class HirdetesController extends Controller
{
    private HirdetesService $hirdetesService;

    public function __construct() {
        $this->hirdetesService = new HirdetesService();
    } 

    function getHirdetesekKartyak() {
        try {

            $lista = $this->hirdetesService->getHirdetesekKartyak();
            return response()->json($lista);

        } catch (\Exception $e) {
            echo($e);
            return response()->json(null, 400);
        }
    }

    public function getHirdetesKartya($id) {
        try {

            $hirdetesCard = $this->hirdetesService->getHirdetesKartya($id);

            if($hirdetesCard != null) {
                return response()->json($hirdetesCard);
            } else {
                return response()->json(null, 404);
            }

        } catch (\Exception $e) {
            echo($e);
            return response()->json(null, 400);
        }
    } 

    public function getHirdetesReszlet($id) {
        try {

            $hirdetesReszlet = $this->hirdetesService->getHirdetesReszlet($id);

            if($hirdetesReszlet != null) {
                return response()->json($hirdetesReszlet);
            } else {
                return response()->json(null, 404);
            }

        } catch (\Exception $e) {
            echo($e);
            return response()->json(null, 400);
        }
    } 

    function getHirdetesekTabla() {
        try {

            $lista = $this->hirdetesService->getHirdetesekTabla();
            return response()->json($lista);

        } catch (\Exception $e) {
            echo($e);
            return response()->json(null, 400);
        }
    }

    public function ujHirdetesFelvetele() {
        $jsonText = file_get_contents('php://input');
        $data = json_decode($jsonText, true);


        try {
            $hirdetes = Hirdetes::fromRequest($data);

            if($hirdetes == null) {
                return response()->json(['Érvénytelen kérés!'], 400);
            }

          $serviceEredmeny = $this->hirdetesService->ujHirdetesFelvetele($hirdetes);

          if (empty($serviceEredmeny['hibak'])) {
            return response()->json(['id' => $serviceEredmeny['id']]);
        } else {
            return response()->json(['hibak' => $serviceEredmeny['hibak']], 400);
        }
        



    } catch (\Exception $e) {
        echo($e);
            return response()->json(["hibak" => ['Hiba!']], 400);
        }
    }
}
