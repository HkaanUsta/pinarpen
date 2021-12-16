<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class portfoliosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::orderBy("updated_at","DESC")->get();
        return view("management_panel.portfolios.index",compact("portfolios"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management_panel.portfolios.create')->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title_image"=>"required",
            "title"=>"required",
            "content"=>"required",
        ]);

        $portfolio = new Portfolio();
        $portfolio->title = $request->title;
        $portfolio->slug = Str::slug($request->title);
        $portfolio->content = $request->content;

        if($request->hasFile('title_image')){
            $path = Storage::putFile("public/portfolios",new File($request->file("title_image")),"public");
            $path = Str::replace("public","storage",$path);
            $portfolio->title_image = $path;
        }

        if($request->hasFile('images')){
            $images = [];
            foreach ($request->file("images") as $image){
                $path = Storage::putFile("public/portfolios",new File($image),"public");
                $path = Str::replace("public","storage",$path);
                array_push($images, $path);
            }
            $portfolio->images = json_encode($images);
        }else{
            $portfolio->images = NULL;
        }

        $portfolio->save();

        return redirect("/admin/portfolios")->with("success","Portfolio created successful");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolio = Portfolio::where("id",$id)->firstOrFail();

        return view("management_panel.portfolios.edit",compact("portfolio"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio, $id)
    {
        $request->validate([
            "title"=>"required",
            "content"=>"required",
        ]);

        $portfolio = Portfolio::findOrFail($id);
        $portfolio->title = $request->title;
        $portfolio->slug = Str::slug($request->title);
        $portfolio->content = $request->content;

        if($request->hasFile('title_image')){
            if(Storage::exists(Str::replace("storage","public",$portfolio->title_image))){
                Storage::delete(Str::replace("storage","public",$portfolio->title_image));
            }
            
        }

        if($request->hasFile('title_image')){
            $path = Storage::putFile("public/portfolios",new File($request->file("title_image")),"public");
            $path = Str::replace("public","storage",$path);
            $portfolio->title_image = $path;
        }






        if($request->hasFile('images')){
            if($portfolio->images !== NULL){
                $images = json_decode($portfolio->images);
            
                foreach($images as $image){
                    if(Storage::exists(Str::replace("storage","public",$image))){
                        Storage::delete(Str::replace("storage","public",$image));
                    }
                }
            }
        }

        if($request->hasFile('images')){
            $images = [];
            foreach ($request->file("images") as $image){
                $path = Storage::putFile("public/portfolios",new File($image),"public");
                $path = Str::replace("public","storage",$path);
                array_push($images, $path);
            }
            $portfolio->images = json_encode($images);
        }else{
            $portfolio->images = NULL;
        }

        $portfolio->save();

        return redirect("/admin/portfolios")->with("success","Portfolio created successful");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $request->validate(["id"=>"required"]);
        $portfolio = Portfolio::findOrFail($request->id);

        if(Storage::exists(Str::replace("storage","public",$portfolio->title_image))){
            Storage::delete(Str::replace("storage","public",$portfolio->title_image));
        }

        if($portfolio->images !== NULL){
            $images = json_decode($portfolio->images);
        
            foreach($images as $image){
                if(Storage::exists(Str::replace("storage","public",$image))){
                    Storage::delete(Str::replace("storage","public",$image));
                }
            }
        }

        $portfolio->delete();
        return redirect()->back()->with("success","Portfolio deleted successful");
    }
}
