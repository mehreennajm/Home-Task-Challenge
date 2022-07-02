<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\ProductType;
use Illuminate\Http\Response;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productType= ProductType::all();
        $suppliers = Supplier::all();
        return view('pages.products.index',compact('productType','suppliers',));
    }


    public function get_products(Request $request)
    {
        $products = Product::with('productType','supplier')->latest()->paginate(20);
        return $request->ajax() ?
            response()->json($products, Response::HTTP_OK)
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
            'product_name' => 'required',
            'product_price' => 'required',
            'produced_date' => 'required|date',
            'expire_date' => 'required|date',
            'product_warranty' => 'required|date',
            'product_desc' => 'required',
            'supplier_id' => 'required',
            'product_type_id' => 'required',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',

        ]);

        if($request->has('product_image')) {
            $file = $request->file('product_image') ;
            $fileName = time().$file->getClientOriginalName() ;
            $destinationPath = public_path().'/uploads/products/' ;
            $file->move($destinationPath,$fileName);
        }

        Product::updateOrCreate(
            ['id' => $request->id],
            ['product_name' => $request->product_name,
                'produced_date' => $request->produced_date,
                'expire_date' => $request->expire_date,
                'product_warranty' => $request->product_warranty,
                'product_price' => $request->product_price,
                'supplier_id' => $request->supplier_id,
                'product_type_id' => $request->product_type_id,
                'product_desc' => $request->product_desc,
                'product_image' => $fileName,
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        return response()->json([
            'data' => $product
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
        $product = Product::find($id);
        if(!empty($product->product_image)) {
            if (file_exists(public_path('uploads/products/'. $product->product_image))) {
                unlink(public_path('uploads/products/'. $product->product_image));
            }
        }
        $product->delete();
        return response()->json([
            'message' => 'Data deleted successfully!'
        ]);
    }
}
