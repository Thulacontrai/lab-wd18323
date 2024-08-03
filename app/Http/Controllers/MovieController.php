<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $movies = Movie::query()
            ->orderBy('created_at', 'desc')
            ->paginate(8);
        $genres = Genre::all();
        // dd($movies);
        return view('admin.movie.list', compact('movies', 'genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $movies = Movie::with('genre')->get();
        // dd($movies);
        $genres = Genre::all();
        // foreach($genres as $cate){
        //         echo $cate->name;
        // }
        // dd($genres);
        return view('admin.movie.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        /// thêm ảnh thì phải thêm enctype="multipart/form-data" vào form
        //
        // dd($request->all());
        $data = request()->except('poster');
        //nếu người dùng không nhập ảnh
        $data['poster'] = '';
        //nếu người dùng nhập ảnh
        if ($request->hasFile('poster')) {
            //lưu ảnh vào phần storage
            $path_img = $request->file('poster')->store('images');
            $data['poster'] = $path_img;
        }
        // dd($data);

        Movie::create($data);
        return redirect('admin/movie')->with('msg', 'Thêm mới phim thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
//        dd($movie);
        $genres=Genre::all();
        return view('admin.movie.show', compact('movie','genres'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //

        $genres = Genre::all();
        return view('admin.movie.edit', compact('movie', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        //
        $data = request()->except('poster');
        ///lấy ra src ảnh cũ
        $old_poster = $movie->poster;
        //nếu người dùng không thêm ảnh mới thì gán ảnh cũ vào data
        $data['poster'] = $old_poster;
        //nếu người dùng thêm ảnh mới
        if ($request->hasFile('poster')) {
            //lưu ảnh mới vào phần storage
            $path_img = $request->file('poster')->store('images');
            $data['poster'] = $path_img;
        }

        $movie->update($data);

        ///xóa src trong storage nếu ảnh trùng
        if (isset($path_img)) {
            if (file_exists('storage/' . $old_poster)) {
                unlink('storage/' . $old_poster);
            }
        }

        return redirect()->back()->with('msg', 'Cập nhật thành công ');
        // dd($data);
        // dd($old_poster);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
        $movie->delete();
        return redirect('admin/movie')->with('msg', 'Xóa phim thành công');
    }


    public function search(Request $request)
    {

        // dd($request->all());
        $search = $request->input('keyword');
        $movies = Movie::where('title', 'LIKE', '%' . $search . '%')->paginate(8);
        $genres = Genre::all();

        // dd($movies);
        return view('admin.movie.list', compact('movies', 'genres'));
    }

    public function genreFilter($id)
    {
        // dd($id);
        $movies = Movie::where('genre_id', $id)->paginate(8);
        //  dd($movies);
        $genres = Genre::all();
        return view('admin.movie.list', compact('movies', 'genres'));
    }

    public function loadAllGenres()
    {
        $genres = Genre::all();
        return view('admin.layout.nav', compact('genres'));
    }
}
