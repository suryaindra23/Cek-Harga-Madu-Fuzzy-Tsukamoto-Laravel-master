<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogCheckController extends Controller
{

    private $batas_bawah_kilogram = 2;
    private $batas_atas_kilogram = 100;
    private $batas_bawah_variant = 10;
    private $batas_atas_variant = 300;
    private $batas_bawah_harga = 35000;
    private $batas_atas_harga = 95000;
    private $batas_bawah_kualitas = 2;
    private $batas_atas_kualitas = 4;

    public function check(Request $request) {
        $data = $request->all();
        $fasilitas = array_sum($request['fasilitas']);
        $kualitas = array_sum($request['kualitas']);
        
        // R1
        $aPredikat1 = min([$this->luas_kecil($data['luas']), $this->fasilitas_banyak($fasilitas)]);
        $aPredikat1b = min([$this->fasilitas_sedikit($data['fasilitas']), $this->kualitas_tinggi($kualitas)]);
        $aPredikat1c = min([$this->luas_kecil($data['luas']),$this->kualitas_tinggi($kualitas)]);
        $aPredikat1d = min([$this->luas_besar($data['luas']),$this->kualitas_rendah($kualitas)]);
        $z1 = $aPredikat1 * $aPredikat1b * $aPredikat1c * $aPredikat1d * ($this->batas_atas_harga - $this->batas_bawah_harga) +  $this->batas_bawah_harga;

        // R2
        $aPredikat2 = min([$this->luas_kecil($data['luas']), $this->fasilitas_sedikit($fasilitas)]);
        $aPredikat2b = min([$this->fasilitas_sedikit($data['fasilitas']), $this->kualitas_rendah($kualitas)]);
        $aPredikat2c = min([$this->luas_besar($data['luas']),$this->kualitas_rendah($kualitas)]);
        $aPredikat2d = min([$this->luas_kecil($data['luas']),$this->kualitas_tinggi($kualitas)]);
        $z2 = ($aPredikat2 * $aPredikat2b * $aPredikat2c * $aPredikat2d * ($this->batas_atas_harga - $this->batas_bawah_harga) - $this->batas_atas_harga) * -1;

        // R3
        $aPredikat3 = min([$this->luas_besar($data['luas']), $this->fasilitas_banyak($fasilitas)]);
        $aPredikat3b = min([$this->fasilitas_banyak($data['fasilitas']), $this->kualitas_tinggi($kualitas)]);
        $aPredikat3c = min([$this->luas_kecil($data['luas']),$this->kualitas_tinggi($kualitas)]);
        $aPredikat3d = min([$this->luas_besar($data['luas']),$this->kualitas_rendah($kualitas)]);
        $z3 = $aPredikat3 * $aPredikat3b * $aPredikat3c * $aPredikat3d * ($this->batas_atas_harga -  $this->batas_bawah_harga) +  $this->batas_bawah_harga;

        // R4
        $aPredikat4 = min([$this->luas_besar($data['luas']), $this->fasilitas_sedikit($fasilitas)]);
        $aPredikat4b = min([$this->fasilitas_banyak($data['kualitas']), $this->kualitas_rendah($kualitas)]);
        $aPredikat4c = min([$this->luas_besar($data['luas']),$this->kualitas_rendah($kualitas)]);
        $aPredikat4d = min([$this->luas_kecil($data['luas']),$this->kualitas_tinggi($kualitas)]);
        $z4 = ($aPredikat4 * $aPredikat4b * $aPredikat4c * $aPredikat4d * ($this->batas_atas_harga -  $this->batas_bawah_harga) - $this->batas_atas_harga) * -1;

        $z_rata_rata = (($aPredikat1 + $aPredikat1b + $aPredikat1c * $aPredikat1d) * $z1 + ($aPredikat2 + $aPredikat2b + $aPredikat2c + $aPredikat2d) * $z2 + ($aPredikat3 + $aPredikat3b + $aPredikat3c + $aPredikat3d) * $z3 + ($aPredikat4 + $aPredikat4b + $aPredikat4c + $aPredikat4d) * $z4) / ($aPredikat1 + $aPredikat2 + $aPredikat3 + $aPredikat4 + $aPredikat1b + $aPredikat2b + $aPredikat3b + $aPredikat4b + 
        $aPredikat1c + $aPredikat2c + $aPredikat3c + $aPredikat4c +$aPredikat1d + $aPredikat2d + $aPredikat3d + $aPredikat4d );
    
        return view('form-check', [
            'data_form' => $request->all(),
            'result_price' => (int) $z_rata_rata
        ]);
    }

    protected function luas_besar($x) {
        if ($x <= $this->batas_bawah_kilogram) {
            return 0;
        } else if ($x >= $this->batas_bawah_kilogram && $x <= $this->batas_atas_kilogram) {
            return ($x - $this->batas_bawah_kilogram) / ($this->batas_atas_kilogram - $this->batas_bawah_kilogram);
        } else if ($x >= $this->batas_atas_kilogram) {
            return 1;
        }
    }

    protected function luas_kecil($x) {
        if ($x <= $this->batas_bawah_kilogram) {
            return 1;
        } else if ($x >= $this->batas_bawah_kilogram && $x <= $this->batas_atas_kilogram) {
            return ($this->batas_atas_kilogram - $x) / ($this->batas_atas_kilogram - $this->batas_bawah_kilogram);
        } else if ($x >= $this->batas_atas_kilogram) {
            return 0;
        }
    }

    protected function fasilitas_banyak($y) {
        if ($y <= $this->batas_bawah_variant) {
            return 0;
        } else if ($y >= $this->batas_bawah_variant && $y <= $this->batas_atas_variant) {
            return ($y - $this->batas_bawah_variant) / ($this->batas_atas_variant - $this->batas_bawah_variant);
        } else if ($y >= $this->batas_atas_variant) {
            return 1;
        }
    }

    protected function fasilitas_sedikit($y) {
        if ($y <= $this->batas_bawah_variant) {
            return 1;
        } else if ($y >= $this->batas_bawah_variant && $y <= $this->batas_atas_variant) {
            return ($this->batas_atas_variant - $y) / ($this->batas_atas_variant - $this->batas_bawah_variant);
        } else if ($y >= $this->batas_atas_variant) {
            return 0;
        }
    }

    protected function harga_mahal($z) {
        if ($z <= $this->batas_bawah_harga) {
            return 0;
        } else if ($z >= $this->batas_bawah_harga && $z <= $this->batas_atas_harga) {
            return ($z - $this->batas_bawah_harga) / ($this->batas_atas_harga - $this->batas_bawah_harga);
        } else if ($z >= $this->batas_atas_harga) {
            return 1;
        }
    }

    protected function harga_murah($z) {
        if ($z <= $this->batas_bawah_harga) {
            return 1;
        } else if ($z >= $this->batas_bawah_harga && $z <= $this->batas_atas_harga) {
            return ($this->batas_atas_harga - $z) / ($this->batas_atas_harga - $this->batas_bawah_harga);
        } else if ($z >= $this->batas_atas_harga) {
            return 0;
        }
    }

    protected function kualitas_tinggi($y) {
        if ($y <= $this->batas_bawah_kualitas) {
            return 0;
        } else if ($y >= $this->batas_bawah_kualitas && $y <= $this->batas_atas_kualitas) {
            return ($y - $this->batas_bawah_kualitas) / ($this->batas_atas_kualitas - $this->batas_bawah_kualitas);
        } else if ($y >= $this->batas_atas_kualitas) {
            return 1;
        }
    }

    protected function kualitas_rendah($y) {
        if ($y <= $this->batas_bawah_kualitas) {
            return 1;
        } else if ($y >= $this->batas_bawah_kualitas && $y <= $this->batas_atas_kualitas) {
            return ($this->batas_atas_kualitas - $y) / ($this->batas_atas_kualitas - $this->batas_bawah_kualitas);
        } else if ($y >= $this->batas_atas_kualitas) {
            return 0;
        }
    }


}
