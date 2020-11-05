<?php

namespace App\Http\Controllers;
use App\Grant;

use Illuminate\Http\Request;

class GrantController extends Controller
{
/*
    public function store(Request $request)
    {
        $grant = Grant::create($request->all());

        return (new Grant($grant))
                ->response()
                ->setStatusCode(201);
    }*/
    //
    public function saveGrantData (Request $request){
        $grant = new Grant();
        //$grant = grant_name = $request->input('grant_name')
        $grant->grant_name = $request->input('grant_name');
        $grant->grant_status = $request->input('grant_status');
        $grant->grantor = $request->input('grantor');
        $grant->grant_geo_location = $request->input('grant_geo_location');
        $grant->grant_description = $request->input('grant_description');
        $grant->grant_amount = $request->input('grant_amount');
        $grant->grant_amount_currency = $request->input('grant_amount_currency');
        $grant->save();

        return response()->json([
            'status' =>true,
            'message' => 'sucess',            
        ], 200);
    }


    public function loadGrants(){
        $grant = Grant::all();
        $response = [
          'grant' => $grant
        ];
    
        return response()->json($response, 200);
      }

    public function getGrantData (Request $request, $id){

        $grantDetails = Grant::where('id', $id)->first();
        if(isset($grantDetails)) {
            return response()->json([
                'status' =>true,
                'message' => 'sucess',
                'grant'     => $grantDetails,
            ], 200);
        } else {
            return response()->json([
                'status' =>false,
                'message' => 'can \'t find a registered grant',                
            ], 400);
        }
    }

    public function updateGrantData (Request $request, $id){

        $newGrant = Grant::where('id', $id)
                              ->update(['grant_name' => $request->input('grant_name'),
                                        'grant_status' => $request->input('grant_status'),
                                        'grantor' => $request->input('grantor'),
                                        'grant_geo_location' => $request->input('grant_geo_location'),
                                        'grant_description' => $request->input('grant_description'),
                                        'grant_amount' => $request->input('grant_amount'),
                                        'grant_amount_currency' => $request->input('grant_amount_currency')]);  
     
        if(isset($newGrant)) {
            return response()->json([
                'status' => true,
                'message' => 'Sucess',
                'isUpdated'     => $newGrant
            ], 200);
        } else {
            return response()->json([
                'status' =>false,
                'message' => 'can \'t update the grant',                
            ], 400);
        }
    }

    public function deleteGrant (Request $request, $id){

        $deleteGrant = Grant::where('id', $id)->delete();
        if(isset($deleteGrant)) {
            return response()->json([
                'status' => true,
                'message' => 'sucess',
                'isDeleted'     => $deleteGrant,
            ], 200);
        } else {
            return response()->json([
                'status' =>false,
                'message' => 'can \'t delete the grant',               
            ], 400);
        }
    }

    public function deleteQuote(Request $request, $id){
        $grant = Grant::find($id);
        $grant->delete();
    
        return response()->json(['message' => 'Quote Deleted'], 200);
      }

   
}
