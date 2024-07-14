<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $query = DB::table('products')
            ->join('categories', 'id_cate', '=', 'id_dm')
            ->select('id_pro', 'name', 'price', 'id_dm', 'name_dm')
            ->orderBy('id_pro', 'desc');
        $product = $query->get();
        $title = "Trang list";
        return view('admin.product.list', compact('product', 'title'));
    }
    public function contact()
    {
        echo "đây là trang liên hệ";
    }
    public function detalPro(string $id, string $name, string $price)
    {
        echo "đây là trang chi tiết sản phẩm " . $id;
        echo '<br><span>Mã sản phẩm:</span>' . $id . '<br><span>Tên sản phẩm:</span>' . $name . '<br><span>Giá sản phẩm:</span>' . $price;
    }

    /**
     * Show the form for creating a new resource.
     * Hiển thị form add
     */
    public function create()
    {
        //
        $title = 'ADD';
        return view('admin.product.add', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $newPro = DB::table('products')->insert([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'id_dm' => $request->input('id_dm')
        ]);

        return redirect('product')->with('success', 'thêm mới  thành công');
        echo $request->input('id_dm');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $product)
    {
        $query = DB::table('products')
            ->select('id_pro', 'name', 'price', 'id_dm')
            ->where('id_pro', '=', $product);
        $detalPro = $query->get();
        $title = "Trang edit";
        return view('admin.product.edit', compact('detalPro', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $product)
    {
        DB::table('products')->where('id_pro', '=', $product)
            ->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'id_dm' => $request->input('id_dm')
            ]);
        return redirect('product')->with('success', 'Cập nhật thành công');
        // echo $product;
        // echo $request->input('name');
        // echo $request->input('price');
        // echo $request->input('id_dm');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $product)
    {
        DB::table('products')->where('id_pro', '=', $product)->delete();
        return redirect('product')->with('success', 'Xóa thành công');
    }
}
