<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Http\Response;
class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.suppliers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function get_suppliers(Request $request)
    {
        $suppliers = Supplier::latest()->paginate(20);
        return $request->ajax() ?
            response()->json($suppliers, Response::HTTP_OK)
            : abort(404);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'postal_code' => 'required',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',

        ]);
        if($request->has('company_logo')) {
            $file = $request->file('company_logo') ;
            $fileName = time().$file->getClientOriginalName() ;
            $destinationPath = public_path().'/uploads/suppliers/' ;
            $file->move($destinationPath,$fileName);
        }

        Supplier::updateOrCreate(
            ['id' => $request->id],
            ['name' => $request->name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'postal_code' => $request->postal_code,
                'company_logo' => $fileName,
                ],

        );

        return response()->json(
            [
                'success' => true,
                'message' => 'Data inserted successfully'
            ]
        );
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);
        return response()->json([
            'data' =>  $supplier
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        if(!empty($supplier->company_logo)) {
            if (file_exists(public_path('uploads/suppliers/'. $supplier->company_logo))) {
            unlink(public_path('uploads/suppliers/'. $supplier->company_logo));
            }
            }
        $supplier->delete();
        return response()->json([
            'message' => 'Data deleted successfully!'
        ]);
    }
}
