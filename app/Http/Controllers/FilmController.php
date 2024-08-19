<?php

namespace App\Http\Controllers;

use App\Models\Fav;
use App\Models\Film;
use App\Models\Like;
use App\Models\Review;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Home';
        $movies = Film::select('*')->get();
        $categories = Film::select('genre')->orderBy('genre')->distinct()->get();
        return view('Home', compact('movies','title','categories'));
    }

    public function Search(Request $request)
    {
        $title = 'Search';
        $moviesq = Film::select('*')->orwhere('title','REGEXP',$request->search)
        ->orwhere('genre','REGEXP',$request->search)
        ->orwhere('year','REGEXP',$request->search);
        if($request->rate){
        $moviesq->orderBy('scores',$request->rate);
        }
        if($request->sort){
            $moviesq->orderBy('title',$request->sort);
            }
        $movies= $moviesq->paginate(9)->withQueryString();

        return view('Search', compact('movies','title'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request){

        $request->validate([
            'title' => 'required|string',
            'genre' => 'required|string',
            'language' => 'required|string',
            'producer' => 'required|string',
            'runtime' => 'required|string',
            'director' => 'required|string',
            'distributor' => 'required|string',
            'year' => 'required|size:4',
            'rating' => 'required|string',
            'casts' => 'required|string',
            'synopsisshort' => 'required|string',
            'synopsisline1' => 'required|string',
            'videourl' => 'required|string',
        ]);
            $data['title'] = $request->title;
            $data['slug'] = Str::slug($request->title);
            $data['genre'] = $request->genre;
            $data['language'] = $request->language;
            $data['producer'] = $request->producer;
            $data['runtime'] = $request->runtime;
            $data['director'] = $request->director;
            $data['distributor'] = $request->distributor;
            $data['year'] = $request->year;
            $data['rating'] = $request->rating;
            $data['casts'] = $request->casts;
            $data['synopsisshort'] = $request->synopsisshort;
            $data['synopsisline1'] = $request->synopsisline1;
            $data['videourl'] = $request->videourl;
            $data['scores'] = 0;

        if ($request->file('files')) {
            $data['img'] = $request->file('files')->store('Film', 'public');
        }
        Film::create($data);
        return redirect()->route('dashboard')->with('success', 'Data berhasil di masukan');
    }

    public function update(Request $request){

        $request->validate([
            'title' => 'required|string',
            'genre' => 'required|string',
            'language' => 'required|string',
            'producer' => 'required|string',
            'runtime' => 'required|string',
            'director' => 'required|string',
            'distributor' => 'required|string',
            'year' => 'required|size:4',
            'rating' => 'required|string',
            'casts' => 'required|string',
            'synopsisshort' => 'required|string',
            'synopsisline1' => 'required|string',
            'videourl' => 'required|string',
        ]);
            $data['title'] = $request->title;
            $data['slug'] = Str::slug($request->title);
            $data['genre'] = $request->genre;
            $data['language'] = $request->language;
            $data['producer'] = $request->producer;
            $data['runtime'] = $request->runtime;
            $data['director'] = $request->director;
            $data['distributor'] = $request->distributor;
            $data['year'] = $request->year;
            $data['rating'] = $request->rating;
            $data['casts'] = $request->casts;
            $data['synopsisshort'] = $request->synopsisshort;
            $data['synopsisline1'] = $request->synopsisline1;
            $data['videourl'] = $request->videourl;

        if ($request->file('files')) {
            $img = Film::select('img')->where('id', $request->id)->first();
            if (File::exists(public_path('/storage/' . $img->img))) {
                File::delete(public_path('/storage/' . $img->img));
            }
            $data['img'] = $request->file('files')->store('Film', 'public');
        }
        Film::where('id', $request->id)->update($data);
        return redirect()->route('dashboard')->with('success', 'Data berhasil diupdate');
    }

    public function remove(Request $request)
    {
        $img = Film::select('img')->where('id', $request->mid)->first();
            if (File::exists(public_path('/storage/' . $img->img))) {
                File::delete(public_path('/storage/' . $img->img));
            }
        Film::where('id', $request->mid)->delete();
        return redirect()->back();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFilmRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug, Request $request)
    {
        $id = optional(Auth::user())->id;
        $movie = Film::select('*')->where('slug', $slug)->with('fav')->first();
        $movie->setRelation('review', $movie->review()->where('rates','REGEXP', $request->rate)->orderBy('created_at', 'desc')->whereNot('user_id', $id)->paginate(5));
        $like= Like::select('*')->where('user_id', $id)->get();
        //     $fav= Fav::select('*')->where('movie_id', $slug)->where('user_id', $id)->first();
        $myreview= Review::select('*')->where('movie_id', $movie->id)->where('user_id', $id)->with('akun')->first();

        $title= "$movie->title";
        return view('Detail', compact('movie', 'title','myreview','like'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        //
    }
}
