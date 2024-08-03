<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //show
        $books =DB::table('categories')
            ->join('books', 'categories.id', '=', 'books.category_id')
            ->orderBy('books.id','asc')
            ->get();
//        dd($books);
        return view('admin.book.list',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cate=DB::table('categories')->get();
//        dd($cate);
        return view('admin.book.create',compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
//        dd($request->all());
        DB::table('books')->insert([
            'title'=>$request->input('title'),
            'thumbnail'=>$request->input('thumbnail'),
            'author'=>$request->input('author'),
            'publisher'=>$request->input('publisher'),
            'publication'=>$request->input('publication'),
            'quantity'=>$request->input('quantity'),
            'price'=>$request->input('price'),
            'category_id'=>$request->input('category_id')
        ]);
        return redirect('admin/book')->with('success', 'thêm mới  thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // show detail one book

        $book=DB::table('books')->where('id',$id)
            ->first();// lấy ra 1 bản ghi

        $cate=DB::table('categories')->get();
        dd($book);
        return view('admin.book.show',compact('book','cate'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $book)
    {
        //

        $book=DB::table('books')->where('id',$book)
            ->first();// lấy ra 1 bản ghi

        $cate=DB::table('categories')->get();
//        dd($book);
        return view('admin.book.edit',compact('book','cate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $book)
    {
        //
//        dd($request->all());
        DB::table('books')->where('id', $book )
            ->update([
                'title'=>$request->input('title'),
                'thumbnail'=>$request->input('thumbnail'),
                'author'=>$request->input('author'),
                'publisher'=>$request->input('publisher'),
                'publication'=>$request->input('publication'),
                'quantity'=>$request->input('quantity'),
                'price'=>$request->input('price'),
                'category_id'=>$request->input('category_id')
            ]);
        return redirect('admin/book')->with('success','Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $book)
    {
        //

        DB::table('books')
            ->where('id',$book)
            ->delete();

        return redirect('admin/book')->with('success','Xóa sản phẩm thành công');
    }
}
