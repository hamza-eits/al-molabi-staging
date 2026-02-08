<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\VisaMaster;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VisaMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Visa";

         try{
            if ($request->ajax()) {
                        $data = VisaMaster::orderBy('Date','desc')->get();

                return Datatables::of($data)
                    ->addIndexColumn()
                    // Status toggle column
                   

                    ->addColumn('action', function ($row) {
                        $btn = '
                            <div class="d-flex align-items-center col-actions">
                                <div class="dropdown">
                                    <a class="action-set show" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a href="'.route('visa-master.edit',$row->InvoiceMasterID).'" class="dropdown-item">
                                                <i class="bx bx-pencil font-size-16 text-secondary me-1"></i> Edit
                                            </a>
                                        </li>
                                         <li>
                                            <a href="javascript:void(0)" onclick="deleteRecord(' . $row->InvoiceMasterID . ')" class="dropdown-item">
                                                <i class="bx bx-trash font-size-16 text-danger me-1"></i> Delete
                                            </a>
                                        </li>
                                       
                                       
                                    </ul>
                                </div>
                            </div>';
    
                   
                    return $btn;
                   
                    })
                    
                    
                    ->rawColumns(['action']) // Mark these columns as raw HTML
                    ->make(true);
            }

        
        
       
    
            return view('visa.index',compact('title'));

        }catch (\Exception $e){
             return back()->with('flash-danger', $e->getMessage());
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $party = Party::getPartyList();    
        $supplier = Party::getSupplierList();  
        $visaMaster = new VisaMaster;  

        return view('visa.create',compact('party','supplier','visaMaster'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Date'           => 'required|date',
           
        ], [
            'Date.required'   => 'Please enter the start date.',
            'Date.date'       => 'The start date must be a valid date.',
          
        ]);

        try {
            $data = $request->only([
                'Date',
                'PartyID',
                'GroupNo',
                
            ]);

            $data['InvoiceTypeID'] = 1;

            
            $visaMaster =  VisaMaster::updateOrCreate(
                ['InvoiceMasterID' => $request->InvoiceMasterID],
                $data
            );
    
            return response()->json([
                'success' => true,
                'message' => 'Record added successfully.',
                'InvoiceMasterID' => $visaMaster->InvoiceMasterID
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving the record.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $party = Party::getPartyList();    
        $supplier = Party::getSupplierList();  
        $visaMaster = VisaMaster::find($id);  
        return view('visa.create',compact('party','supplier','visaMaster'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
