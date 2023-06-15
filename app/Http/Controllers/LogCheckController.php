<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogCheckController extends Controller
{
    private $batas_bawah_enzim_diastase = 3;
    private $batas_atas_enzim_diastase = 9;
    private $batas_bawah_kadar_air = 10;
    private $batas_atas_kadar_air = 24;
    private $batas_bawah_glukosa = 60;
    private $batas_atas_glukosa = 73;
    private $batas_bawah_hidroksi_metilfurfural = 4;
    private $batas_atas_hidroksi_metilfurfural = 26;
    private $batas_bawah_stok = 100;
    private $batas_atas_stok = 2500;
    private $batas_bawah_harga = 50000;
    private $batas_atas_harga = 80000;

    private $batas_bawah_variant = 2;
    private $batas_atas_variant = 8;
    public function check(Request $request)
    {
        $data = $request->all();
        $variant = array_sum($request['variant']);


        // R1
        $aPredikat1 = min([$this->ameningkat($data['enzim_diastase']), $this->bmeningkat($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantbanyak($variant)]);
        $z1 = $aPredikat1 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;

        // R3
        $aPredikat2 = min([$this->ameningkat($data['enzim_diastase']), $this->bmeningkat($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantsedikit($variant)]);
        $z2 = ($aPredikat2 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga) * -1;

        // R4
        $aPredikat3 = min([$this->ameningkat($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantbanyak($variant)]);
        $z3 = $aPredikat3 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;

        // R6
        $aPredikat4 = min([$this->ameningkat($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantsedikit($variant)]);
        $z4 = ($aPredikat4 *  ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga) * -1;

        // R8
        $aPredikat5 = min([$this->ameningkat($data['enzim_diastase']), $this->bmeningkat($data['kadar_air']), $this->cmenurun($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantbanyak($variant)]);
        $z5 = $aPredikat5 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;

        // R10
        $aPredikat6 = min([$this->ameningkat($data['enzim_diastase']), $this->bmeningkat($data['kadar_air']), $this->cmenurun($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantsedikit($variant)]);
        $z6 = ($aPredikat6 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga) * -1;

        // R11
        $aPredikat7 = min([$this->amenurun($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantbanyak($variant)]);
        $z7 = $aPredikat7 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;

        // R13
        $aPredikat8 = min([$this->amenurun($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantbanyak($variant)]);
        $z8 = ($aPredikat8 *  ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga) * -1;
        

        // R14
        $aPredikat9 = min([$this->amenurun($data['enzim_diastase']), $this->bmeningkat($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantbanyak($variant)]);
        $z9 = $aPredikat9 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;

        // R15
        $aPredikat10 = min([$this->amenurun($data['enzim_diastase']), $this->bmeningkat($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantsedikit($variant)]);
        $z10 = ($aPredikat10 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga) * -1;

        // R17
        $aPredikat11 = min([$this->ameningkat($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmenurun($data['hidroksi_metilfurfural']), $this->emenurun($data['stok']), $this->variantbanyak($variant)]);
        $z11 = $aPredikat11 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;

        // R18
        $aPredikat12 = min([$this->amenurun($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantsedikit($variant)]);
        $z12 = ($aPredikat12 *  ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga) * -1;
        

        // R19
        $aPredikat13 = min([$this->amenurun($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmenurun($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantbanyak($variant)]);
        $z13 = $aPredikat13 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;

        // R20
        $aPredikat20 = min([$this->amenurun($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmenurun($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantsedikit($variant)]);
        $z20 = ($aPredikat20 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga) * -1;

        // R21
        $aPredikat21 = min([$this->amenurun($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emenurun($data['stok']), $this->variantbanyak($variant)]);
        $z21 = $aPredikat21 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;

        // R23
        $aPredikat23 = min([$this->amenurun($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emenurun($data['stok']), $this->variantsedikit($variant)]);
        $z23 = ($aPredikat23 *  ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga) * -1;
        

        // R24
        $aPredikat24 = min([$this->amenurun($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emenurun($data['stok']), $this->variantbanyak($variant)]);
        $z24 = $aPredikat24 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;

        // R25
        $aPredikat25 = min([$this->amenurun($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emenurun($data['stok']), $this->variantsedikit($variant)]);
        $z25 = ($aPredikat25 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga) * -1;

        // R26
        $aPredikat26 = min([$this->ameningkat($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantbanyak($variant)]);
        $z26 = $aPredikat26 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;

        // R28
        $aPredikat27 = min([$this->ameningkat($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantsedikit($variant)]);
        $z27 = ($aPredikat27 *  ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga) * -1;
        

        // R30
        $aPredikat28 = min([$this->amenurun($data['enzim_diastase']), $this->bmeningkat($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmenurun($data['hidroksi_metilfurfural']), $this->emenurun($data['stok']), $this->variantbanyak($variant)]);
        $z28 = $aPredikat28 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;

        // R31
        $aPredikat29 = min([$this->amenurun($data['enzim_diastase']), $this->bmeningkat($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmenurun($data['hidroksi_metilfurfural']), $this->emenurun($data['stok']), $this->variantsedikit($variant)]);
        $z29 = ($aPredikat29 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga) * -1;

        // R33
        $aPredikat30 = min([$this->amenurun($data['enzim_diastase']), $this->bmeningkat($data['kadar_air']), $this->cmenurun($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantbanyak($variant)]);
        $z30 = $aPredikat30 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;

        // R35
        $aPredikat31 = min([$this->ameningkat($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmenurun($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantsedikit($variant)]);
        $z31 = ($aPredikat31 *  ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga) * -1;
        

        // R36
        $aPredikat32 = min([$this->ameningkat($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmenurun($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantbanyak($variant)]);
        $z32 = $aPredikat32 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;

        // R37
        $aPredikat33 = min([$this->amenurun($data['enzim_diastase']), $this->bmeningkat($data['kadar_air']), $this->cmenurun($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emenurun($data['stok']), $this->variantsedikit($variant)]);
        $z33 = ($aPredikat33 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga) * -1;

        // R39
        $aPredikat34 = min([$this->amenurun($data['enzim_diastase']), $this->bmeningkat($data['kadar_air']), $this->cmenurun($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emenurun($data['stok']), $this->variantbanyak($variant)]);
        $z34 = $aPredikat34 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;

        // R40
        $aPredikat35 = min([$this->amenurun($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmenurun($data['glukosa']), $this->dmenurun($data['hidroksi_metilfurfural']), $this->emenurun($data['stok']), $this->variantbanyak($variant)]);
        $z35 = ($aPredikat35 *  ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga) * -1;
        
        // R41
        $aPredikat36 = min([$this->ameningkat($data['enzim_diastase']), $this->bmeningkat($data['kadar_air']), $this->cmenurun($data['glukosa']), $this->dmenurun($data['hidroksi_metilfurfural']), $this->emenurun($data['stok']), $this->variantbanyak($variant)]);
        $z36 = $aPredikat36 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;

        // R43
        $aPredikat37 = min([$this->ameningkat($data['enzim_diastase']), $this->bmeningkat($data['kadar_air']), $this->cmenurun($data['glukosa']), $this->dmenurun($data['hidroksi_metilfurfural']), $this->emenurun($data['stok']), $this->variantbanyak($variant)]);
        $z37 = ($aPredikat37 *  ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga) * -1;

        // R44
        $aPredikat38 = min([$this->ameningkat($data['enzim_diastase']), $this->bmeningkat($data['kadar_air']), $this->cmenurun($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantbanyak($variant)]);
        $z38 = $aPredikat38 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;

        // R45
        $aPredikat39 = min([$this->ameningkat($data['enzim_diastase']), $this->bmeningkat($data['kadar_air']), $this->cmenurun($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emenurun($data['stok']), $this->variantbanyak($variant)]);
        $z39 = ($aPredikat39 *  ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga) * -1;

        // R46
        $aPredikat40 = min([$this->ameningkat($data['enzim_diastase']), $this->bmeningkat($data['kadar_air']), $this->cmenurun($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emenurun($data['stok']), $this->variantbanyak($variant)]);
        $z40 = $aPredikat40 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;

        // R48
        $aPredikat41 = min([$this->amenurun($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmenurun($data['glukosa']), $this->dmenurun($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantbanyak($variant)]);
        $z41 = ($aPredikat41 *  ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga) * -1;

        // R50
        $aPredikat42 = min([$this->ameningkat($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmenurun($data['glukosa']), $this->dmenurun($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantbanyak($variant)]);
        $z42 = $aPredikat42 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;

        // R51
        $aPredikat43 = min([$this->ameningkat($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmenurun($data['glukosa']), $this->dmenurun($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantbanyak($variant)]);
        $z43 = ($aPredikat43 *  ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga) * -1;

        // R52
        $aPredikat44 = min([$this->ameningkat($data['enzim_diastase']), $this->bmeningkat($data['kadar_air']), $this->cmenurun($data['glukosa']), $this->dmeningkat($data['hidroksi_metilfurfural']), $this->emenurun($data['stok']), $this->variantbanyak($variant)]);
        $z44 = $aPredikat44 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;

        // R54
        $aPredikat45 = min([$this->amenurun($data['enzim_diastase']), $this->bmeningkat($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmenurun($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantbanyak($variant)]);
        $z45 = ($aPredikat45 *  ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga) * -1;

        // R55
        $aPredikat46 = min([$this->ameningkat($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmenurun($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantbanyak($variant)]);
        $z46 = $aPredikat46 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;

        // R57
        $aPredikat47 = min([$this->ameningkat($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmenurun($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantbanyak($variant)]);
        $z47 = ($aPredikat47 *  ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga) * -1;

        // R61
        $aPredikat48 = min([$this->ameningkat($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmenurun($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantbanyak($variant)]);
        $z48 = $aPredikat48 * ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga;

        // R62
        $aPredikat49 = min([$this->ameningkat($data['enzim_diastase']), $this->bmenurun($data['kadar_air']), $this->cmeningkat($data['glukosa']), $this->dmenurun($data['hidroksi_metilfurfural']), $this->emeningkat($data['stok']), $this->variantbanyak($variant)]);
        $z49 = ($aPredikat49 *  ($this->batas_atas_harga - $this->batas_bawah_harga) + $this->batas_bawah_harga) * -1;

        
        

        $z_rata_rata = ($aPredikat1 * $z1 + $aPredikat2 * $z2 + $aPredikat3 * $z3 + $aPredikat4 * $z4) / ($aPredikat1 + $aPredikat2 + $aPredikat3 + $aPredikat4);

        return view('form-check', [
            'data_form' => $request->all(),
            'result_price' => (int) $z_rata_rata
        ]);
    }

    protected function ameningkat($a)
    {
        if ($a <= $this->batas_bawah_enzim_diastase) {
            return 0;
        } else if ($a >= $this->batas_bawah_enzim_diastase && $a <= $this->batas_atas_enzim_diastase) {
            return ($a - $this->batas_bawah_enzim_diastase) / ($this->batas_atas_enzim_diastase - $this->batas_bawah_enzim_diastase);
        } else if ($a >= $this->batas_atas_enzim_diastase) {
            return 1;
        }
    }

    protected function  amenurun($a)
    {
        if ($a <= $this->batas_bawah_enzim_diastase) {
            return 1;
        } else if ($a >= $this->batas_bawah_enzim_diastase && $a <= $this->batas_atas_enzim_diastase) {
            return (($this->batas_atas_enzim_diastase) - $a) / (($this->batas_atas_enzim_diastase) - ($this->batas_bawah_enzim_diastase));
        } else if ($a >= $this->batas_atas_enzim_diastase) {
            return 0;
        }
    }

    protected function bmeningkat($b)
    {
        if ($b <= $this->batas_bawah_kadar_air) {
            return 0;
        } else if ($b >= $this->batas_bawah_kadar_air && $b <= $this->batas_atas_kadar_air) {
            return ($b - $this->batas_bawah_kadar_air) / ($this->batas_atas_kadar_air - $this->batas_bawah_kadar_air);
        } else if ($b >= $this->batas_atas_kadar_air) {
            return 1;
        }
    }

    protected function  bmenurun($b)
    {
        if ($b <= $this->batas_bawah_kadar_air) {
            return 1;
        } else if ($b >= $this->batas_bawah_kadar_air && $b <= $this->batas_atas_kadar_air) {
            return (($this->batas_atas_kadar_air) - $b) / (($this->batas_atas_kadar_air) - ($this->batas_bawah_kadar_air));
        } else if ($b >= $this->batas_atas_kadar_air) {
            return 0;
        }
    }

    protected function cmeningkat($c)
    {
        if ($c <= $this->batas_bawah_glukosa) {
            return 0;
        } else if ($c >= $this->batas_bawah_glukosa && $c <= $this->batas_atas_glukosa) {
            return ($c - $this->batas_bawah_glukosa) / ($this->batas_atas_glukosa - $this->batas_bawah_glukosa);
        } else if ($c >= $this->batas_atas_glukosa) {
            return 1;
        }
    }

    protected function  cmenurun($c)
    {
        if ($c <= $this->batas_bawah_glukosa) {
            return 1;
        } else if ($c >= $this->batas_bawah_glukosa && $c <= $this->batas_atas_glukosa) {
            return (($this->batas_atas_glukosa) - $c) / (($this->batas_atas_glukosa) - ($this->batas_bawah_glukosa));
        } else if ($c >= $this->batas_atas_glukosa) {
            return 0;
        }
    }

    protected function dmeningkat($d)
    {
        if ($d <= $this->batas_bawah_hidroksi_metilfurfural) {
            return 0;
        } else if ($d >= $this->batas_bawah_hidroksi_metilfurfural && $d <= $this->batas_atas_hidroksi_metilfurfural) {
            return ($d - $this->batas_bawah_hidroksi_metilfurfural) / ($this->batas_atas_hidroksi_metilfurfural - $this->batas_bawah_hidroksi_metilfurfural);
        } else if ($d >= $this->batas_atas_hidroksi_metilfurfural) {
            return 1;
        }
    }

    protected function  dmenurun($d)
    {
        if ($d <= $this->batas_bawah_hidroksi_metilfurfural) {
            return 1;
        } else if ($d >= $this->batas_bawah_hidroksi_metilfurfural && $d <= $this->batas_atas_hidroksi_metilfurfural) {
            return (($this->batas_atas_hidroksi_metilfurfural) - $d) / (($this->batas_atas_hidroksi_metilfurfural) - ($this->batas_bawah_hidroksi_metilfurfural));
        } else if ($d >= $this->batas_atas_hidroksi_metilfurfural) {
            return 0;
        }
    }

    protected function emeningkat($f)
    {
        if ($f <= $this->batas_bawah_stok) {
            return 0;
        } else if ($f >= $this->batas_bawah_stok && $f <= $this->batas_atas_stok) {
            return ($f - $this->batas_bawah_stok) / ($this->batas_atas_stok - $this->batas_bawah_stok);
        } else if ($f >= $this->batas_atas_stok) {
            return 1;
        }
    }

    protected function  emenurun($f)
    {
        if ($f <= $this->batas_bawah_stok) {
            return 1;
        } else if ($f >= $this->batas_bawah_stok && $f <= $this->batas_atas_stok) {
            return (($this->batas_atas_stok) - $f) / (($this->batas_atas_stok) - ($this->batas_bawah_stok));
        } else if ($f >= $this->batas_atas_stok) {
            return 0;
        }
    }

    protected function fmeningkat($f)
    {
        if ($f <= $this->batas_bawah_harga) {
            return 0;
        } else if ($f >= $this->batas_bawah_harga && $f <= $this->batas_atas_harga) {
            return ($f - $this->batas_bawah_harga) / ($this->batas_atas_harga - $this->batas_bawah_harga);
        } else if ($f >= $this->batas_atas_harga) {
            return 1;
        }
    }

    protected function  fmenurun($f)
    {
        if ($f <= $this->batas_bawah_harga) {
            return 1;
        } else if ($f >= $this->batas_bawah_harga && $f <= $this->batas_atas_harga) {
            return (($this->batas_atas_harga) - $f) / (($this->batas_atas_harga) - ($this->batas_bawah_harga));
        } else if ($f >= $this->batas_atas_harga) {
            return 0;
        }
    }
    protected function variantbanyak($g)
    {
        if ($g <= $this->batas_bawah_variant) {
            return 0;
        } else if ($g >= $this->batas_bawah_variant && $g <= $this->batas_atas_variant) {
            return ($g - $this->batas_bawah_variant) / ($this->batas_atas_variant - $this->batas_bawah_variant);
        } else if ($g >= $this->batas_atas_variant) {
            return 1;
        }
    }

    protected function  variantsedikit($g)
    {
        if ($g <= $this->batas_bawah_variant) {
            return 1;
        } else if ($g >= $this->batas_bawah_variant && $g <= $this->batas_atas_variant) {
            return (($this->batas_atas_variant) - $g) / (($this->batas_atas_variant) - ($this->batas_bawah_variant));
        } else if ($g >= $this->batas_atas_variant) {
            return 0;
        }
    }
}
