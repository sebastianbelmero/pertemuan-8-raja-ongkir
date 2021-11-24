<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Province;
use Kavist\RajaOngkir\Facades\RajaOngkir as FacadesRajaOngkir;
use Livewire\Component;

class RajaOngkir extends Component
{
    public $dariIdProvince = 0;
    public $dariIdCity = 0;
    public $keIdProvince = 0;
    public $keIdCity = 0;
    public $kurir = 0;
    public $berat = 0;
    public $harga;

    public function render()
    {
        $dariProvinces = Province::pluck('name', 'province_id');
        $dariCities = City::where('province_id', $this->dariIdProvince)->pluck('name', 'city_id');
        $keProvinces = Province::pluck('name', 'province_id');
        $keCities = City::where('province_id', $this->keIdProvince)->pluck('name', 'city_id');
        return view('livewire.raja-ongkir', compact('dariProvinces', 'dariCities', 'keProvinces', 'keCities'));
    }

    public function checkOngkir()
    {
        $cost = FacadesRajaOngkir::ongkosKirim([
            'origin'        => $this->dariIdCity, // ID kota/kabupaten asal
            'destination'   => $this->keIdCity, // ID kota/kabupaten tujuan
            'weight'        => $this->berat, // berat barang dalam gram
            'courier'       => $this->kurir // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();


        $this->harga = $cost;
    }
}
