<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;
use App\Models\ward;
use App\Models\Address;

class AddressFrom extends Component
{
    public $addressType;//current or permanent
    public $modelId;//student id or teacher id etc
    public $modelType;//student or parent or teacher etc
    public $prefix;// to differentiate multiple address forms in a single page
    
    // Input Fields
    public $divisionId;
    public $districtId;
    public $upazilaId;
    public $unionId;
    public $wardId;
    public $detailAddress;

    // dynamic dropdown data
    public $divisions = [];
    public $districts = [];
    public $upazilas = [];
    public $unions = [];
    public $wards = [];

    // when component is loaded
    public function mount($modelId = null, $modelType = Null, $addressType)
    {
        $this->modelId = $modelId;//student id or teacher id etc
        $this->modelType = $modelType;//student or parent or teacher etc
        $this->addressType = $addressType;//current or permanent  
        
        //if exists address then Load data
        if($modelId && $modelType){
            $address = Address::where('addressable_id', $modelId)
                              ->where('addressable_type', $modelType)
                              ->where('address_type', $addressType)
                              ->first();
            if($address){
                $this->divisionId = $address->division_id;
                $this->districtId = $address->district_id;
                $this->upazilaId = $address->upazila_id;
                $this->unionId = $address->union_id;
                $this->wardId = $address->ward_id;
                $this->detailAddress = $address->detail_address;

                 //  dropdown pre populate
            $this->updatedDivisionId($this->divisionId);
            $this->updatedDistrictId($this->districtId);
            $this->updatedUpazilaId($this->upazilaId);
            $this->updatedUnionId($this->unionId);  
            }
        }
    }

    //if change division load districts
    public function updatedDivisionId($value)
    {
        $this->districts = District::where('division_id', $value)->get();
        $this-> districtId = null;
        $this-> upazilas = [];
        $this-> unions = [];
        $this-> wards = [];
    }  
        // if change district load upazilas
    public function updatedDistrictId($value)
    {
    $this->upazilas = Upazila::where('district_id', $value)->get();
    $this-> upazilaId = null;
    $this-> unions = [];
    $this-> wards = [];
    }
    // if change upazila load unions
    public function updatedUpazilaId($value)
    {
        $this->unions = Union::where('upazila_id', $value)->get();
        $this-> unionId = null;
    }

    // if change union load wards
    public function updatedUnionId($value)
    {
        $this->wards = ward::where('union_id', $value)->get();
        $this-> wardId = null;
    }

    public function render()
    {
        $divisions = Division::all();
        return view('livewire.address-from', compact('divisions'));
    }

    // this function will save or update address
    public function getAddressData()
    {
        $this->validate([
            'divisionId' => 'required',
            'districtId' => 'required',
            'upazilaId' => 'required',
            'unionId' => 'required',
            'detailAddress' => 'required|string|max:255',
        ]);
        return [
            'division_id' => $this->divisionId,
            'district_id' => $this->districtId,
            'upazila_id' => $this->upazilaId,
            'union_id' => $this->unionId,
            'ward_id' => $this->wardId,
            'detail_address' => $this->detailAddress,
            'address_type' => $this->addressType,
        ];
    }
}
