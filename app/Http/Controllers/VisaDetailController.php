<?php

namespace App\Http\Controllers;

use App\Models\VisaDetail;
use App\Models\VisaMaster;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VisaDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
     {
       
         try{
            if ($request->ajax()) {

                $InvoiceMasterID = $request->InvoiceMasterID;

                $data = VisaDetail::where('InvoiceMasterID', $InvoiceMasterID)->get();

                return Datatables::of($data)
                    ->addIndexColumn()
                    // Status toggle column
                   

                ->addColumn('action', function ($row) {
                    $btn = '
                        <a href="#" onclick="editVisaDetailRecord('.$row->InvoiceDetailID.')" 
                        class="btn btn-sm btn-primary me-1 d-inline-flex align-items-center">
                            <i class="bx bx-pencil font-size-16 me-1"></i> Edit
                        </a>
                        <a href="#" onclick="deleteVisaDetailRecord('.$row->InvoiceDetailID.')" 
                        class="btn btn-sm btn-danger d-inline-flex align-items-center">
                            <i class="bx bx-trash font-size-16 me-1"></i> Delete
                        </a>';
                    
                    return $btn;
                })
                    
                    
                ->rawColumns(['action']) // Mark these columns as raw HTML
                ->make(true);
            }
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
        //
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
            'InvoiceMasterID'  => 'required',
            'PaxName'          => 'required',
           
        ]);

        try {
            $data = $request->only([
                'InvoiceMasterID',
                'ItemID',
                'SupplierID',
                'VisaType',
                'PaxName',
                'Passport',
                'Nationality',
                'VisaStatus',
                'VisaNo',
                'DOB',
                'Age',
                'PaxType',
                'Gender',
                'IssueDate',
                'ExpiryDate',
                'RelationType',
                'Relation',
                'ShirkaID',
                'PackageName',
                'DepartureDate',
                'VisaSaleRate',
                'ExRateSale',
                'Receivable',
                'VisaPurchaseRate',
                'ExRatePurchase',
                'Payable',
            ]);


            
            $visaDetail =  VisaDetail::updateOrCreate(
                ['InvoiceDetailID' => $request->InvoiceDetailID],
                $data
            );


            $visaMasterTotal = $this->updateVisaMaster($visaDetail->InvoiceMasterID);
    
            return response()->json([
                'success' => true,
                'message' => 'Record added successfully.',
                'InvoiceDetailID' => $visaDetail->InvoiceDetailID,
                'visaMasterTotal' => $visaMasterTotal,
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

        try {
            $data = VisaDetail::findOrFail($id);
            return response()->json($data, 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred.',
                'error'   => $e->getMessage(),
            ], 500);
        }

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
    public function destroy(string $id)
    {
        try {
            $record = VisaDetail::find($id);

            $InvoiceMasterID = $record->InvoiceMasterID;

            if (!$record) {
                return response()->json([
                    'success' => false,
                    'message' => 'Record not found.',
                ], 404);
            }

            $record->delete();

            $visaMasterTotal = $this->updateVisaMaster($InvoiceMasterID);

            return response()->json([
                'success' => true,
                'message' => 'Record deleted successfully.',
                'visaMasterTotal' => $visaMasterTotal,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the record.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }


    public function updateAllRecords(Request $request,$InvoiceMasterID)
    {
        $visaMaster = VisaMaster::find($InvoiceMasterID);


         $validated = $request->validate([
            'VisaSaleRate'          => 'required',
            'ExRateSale'          => 'required',
            'Receivable'          => 'required',
            'VisaPurchaseRate'          => 'required',
            'ExRatePurchase'          => 'required',
            'Payable'          => 'required',
           
            ]);

       try{
            VisaDetail::where('InvoiceMasterID',$InvoiceMasterID)->update([
                'VisaSaleRate' => $request->VisaSaleRate,
                'ExRateSale' => $request->ExRateSale,
                'Receivable' => $request->Receivable,
                'VisaPurchaseRate' => $request->VisaPurchaseRate,
                'ExRatePurchase' => $request->ExRatePurchase,
                'Payable' => $request->Payable,
            ]);


            $visaMasterTotal = $this->updateVisaMaster($InvoiceMasterID);

            return response()->json([
                'success' => true,
                'message' => 'Record Updated successfully.',
                'visaMasterTotal' => $visaMasterTotal,
            ], 200);

        }catch(\Exception $e){

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating the record.',
                'error'   => $e->getMessage(),
            ], 500);

        }
    }  
    
    
    public function updateVisaMaster($InvoiceMasterID)
    {
        $total = VisaDetail::where('InvoiceMasterID',$InvoiceMasterID)->sum('Payable');
        $visaMaster = VisaMaster::find($InvoiceMasterID);

        if ($visaMaster) {
            $visaMaster->update([
                'Total' => $total
            ]);
        }

        return $total;
    }


}
