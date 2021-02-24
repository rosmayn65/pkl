<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Rw;

class Dropdowns extends Component 
{

    public $provinsi;
    public $kota;
    public $kecamatan;
    public $kelurahan;
    public $rw;

    public $selectedProvinsi = null;
    public $selectedKota = null;
    public $selectedKecamatan = null;
    public $selectedKelurahan = null;
    public $selectedRw = null;

    public function mount($selectedRw = null)
    {
        $this->provinsi = Provinsi::all();
        $this->kota = collect();
        $this->kecamatan = collect();
        $this->kelurahan = collect();
        $this->rw = collect();
        $this->selectedRw = $selectedRw;
    
        if (!is_null($selectedRw)) {
            $rw = Rw::with('kelurahan.kecamatan.kota.provinsi')->find($selectedRw);
            
            if ($rw) {
                $this->rws = RW::where('nama_kel', $rw->nama_kel)->get();
                $this->kelurahans = Kelurahan::where('id_kec', $rw->kelurahan->id_kec)->get();
                $this->kecamatans = Kecamatan::where('id_kota', $rw->kelurahan->kecamatan->id_kota)->get();
                $this->kota = Kota::where('id_provinsi', $rw->kelurahan->kecamatan->kota->id_provinsi)->get();
                $this->selectedProvinsi =$rw->kelurahan->kecamatan->kota->id_provinsi;
                $this->selectedKota = $rw->kelurahan->kecamatan->id_kota;
                $this->selectedKecamatan = $rw->kelurahan->id_kec;
                $this->selectedKelurahan = $rw->nama_kel;
            }
        }
    }

    public function render()
    {
        return view('livewire.dropdowns');
    }

    public function updatedselectedProvinsi($provinsi)
    {
        $this->kota = Kota::where('id_provinsi',$provinsi)->get();
        $this->selectedKecamatan = NULL;
        $this->selectedKelurahan = NULL;
        $this->selectedRw = Null;
    }

    public function updatedSelectedKota($kota)
    {
        $this->kecamatan = Kecamatan::where('id_kota',$kota)->get();
        $this->selectedKelurahan = NULL;
        $this->selectedRw = null;
    }

    public function updatedSelectedKecamatan($kecamatan)
    {
        $this->kelurahan = Kelurahan::where('id_kec',$kecamatan)->get();
        $this->selectedRw = null;
    }

    public function updatedSelectedKelurahan($kelurahan)
    {
        if (!is_null($kelurahan)) {
            $this->rw = Rw::where('nama_kel', $kelurahan)->get();
        } else {
            $this->selectedRw = null;
        }
    }

    
}