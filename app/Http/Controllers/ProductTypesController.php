<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;
use Illuminate\Http\Response;

class ProductTypesController extends Controller
{

    public function index()
    {
        return view('pages.product-types.index');
    }

    public function get_types(Request $request)
    {
        $types = ProductType::latest()->paginate(20);
        return $request->ajax() ?
            response()->json($types, Response::HTTP_OK)
            : abort(404);
    }

    public function store_types(Request $request)
    {
        $this->validate($request,[
            'type' => 'required',
        ]);

        ProductType::updateOrCreate(
            ['id' => $request->id],
            ['type' => $request->type,]
        );
        return response()->json(
            [
                'success' => true,
                'message' => 'Data inserted successfully'
            ]
        );
    }

    public function update($id)
    {
        $type = ProductType::findOrFail($id);
        return response()->json([
            'data' => $type
        ]);
    }

    public function destroy($id)
    {
        $type = ProductType::find($id);
        $type->delete();
        return response()->json([
            'message' => 'Data deleted successfully!'
        ]);
    }

}
