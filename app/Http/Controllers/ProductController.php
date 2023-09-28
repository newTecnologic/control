<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

use function PHPUnit\Framework\returnCallback;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $products = Product::all();

;       // $products = DB::table('products')->get();
        
        // return $products;
        // dd($products);

        return view('products.index')->with([
            'products' => Product::all(),
        ]);
    }

    public function pdf()
    {
    $products = Product::paginate();
    //dd($products);
    // return view('products.pdf', compact('products'));
    $pdf = \PDF::loadView('products.pdf',['products'=>$products])->setOptions(['defaultFont' => 'sans-serif']);
    // $pdf->loadHTML('<h1>Test</h1>');
    // return $pdf->stream();
    return $pdf->download('___producto.pdf');
}

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        // $product = Product::create([
        //     'title' => request()->title,
        //     'description' => request()->description,
        //     'price' => request()->price,
        //     'stock' => request()->stock,
        //     'status' => request()->status,
        // ]);
    

        // if ($request->status == 'available' && $request->stock == 0){
        //     // session()->put('error', 'if available must have stock');
        //     // establece el valor en la sesion poner el valor - ya no esta disponible
        //     // session()->flash('error', 'if available must have stock');
        //     return redirect()->back()->withInput($request->all())->withErrors('if available must have stock');
        // }
        // dd(request()->all(), $request->all(), $request->validated());

        // session()->forget('error');

        $product = Product::create($request->validated());
        // session()->flash('success', "the new product with id {$product->id} was created");

        // return $product;
        // redireccionar hacia la hubicacion anterior forma1 helper AL  mismo formulario
        // return redirect()->back();
        // redireccionar a una accion de un controlador
        // return redirect()->action([ProductController::class, 'index']);
        // redireccionar a una ruta  conde se indique
        return redirect()->route('products.index')->withSuccess("the new product with id {$product->id} was created");
        //(segunda forma mensaje de exito)with(['success' => "the new product with id {$product->id} was created"]);

        // return $product;
        // return view('products.store');
    }

    public function show(Product $product)
    {
        // pedir por la llave primaria el id 1
        // $product = DB::table('products')->where('id', $product)->first();
        // por medio de find indicar el atributo para obtener el id 1-encuentra el primer elemento
        // $product = DB::table('products')->find($prosduct);
//por medip de eloquent se accede

        // $product = Product::findOrFail($product);
        //formato json
        // return $product;
        // dd($product);
        return view('products.show')->with([
            'product' => $product,
        ]);
    }

    public function edit(Product $product)
    {
        return view('products.edit')->with([
            // 'product' => Product::findOrFail($product),
            'product' => $product,
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
     
        // $product = Product::findOrFail($product);
        $product->update($request->validated ());
        // return $product;
        return redirect()->route('products.index')->withSuccess("the product with id {$product->id} was edited");

        // dd('en update');
        // return view('products.update');
    }

    public function destroy(Product $product)
    {
        // $product = Product::findOrFail($product);
        $product->delete();
        // return $product;
        return redirect()->route('products.index')->withSuccess("the product with id {$product->id} was deleted");

    }
}
