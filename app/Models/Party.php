<?php

namespace App\Models;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Party extends Model
{
    use HasFactory;
    protected $table = 'party';
    protected $primaryKey = 'PartyID';

    //   protected $fillable = [
    //     'ItemName',
       
    // ];getSupplierList


    public function branch()
    {
        return $this->belongsTo(Branch::class, 'BranchID');
    }

    static function getPartyList($party_type = null)
    {
        $party = Party::query()
            ->when(session('UserType') != 'SuperAdmin', function ($query) {
                return $query->where('BranchID', session('BranchID'));
            })
            
        //    ->when($party_type=='VC', function ($query) {
        //         return $query->whereIn('PartyType', ['VC','VS']);
        //     })
            ->when($party_type=='C', function ($query) {
                return $query->whereIn('PartyType', ['C','VC']);
            })
            ->orderby('PartyType', 'asc')
            ->get();

        if (session('UserType') == 'SuperAdmin') {
            $chooseOption = (object)[
                'PartyID' => '',
                'PartyType' => 'Choose...',
                'PartyName' => '',
                'Phone' => ''
            ];
            $party->prepend($chooseOption);
        }

        return $party;
    }
    
       
    static function getSupplierList()
    {
        $party = Party::query()->whereIn('PartyType', ['VC','VS'])         
                ->orderby('PartyType', 'asc')
                ->get();

        return $party;
    }

    public function customer()
    {
        return $this->hasMany(Party::class, 'PartyID', 'CustomerID');
    }

    public function supplier()
    {
        return $this->hasMany(Party::class, 'PartyID', 'SupplierID');
    }
    
    
  
    

    //$party= Party::getPartyList(); 
}
