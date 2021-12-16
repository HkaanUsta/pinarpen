<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Portfolio;

class homeController extends Controller
{
    public function index(){
        return view('homepage')->render();
    }

    public function about(){
        return view('about')->render();
    }

    public function contact(){
        return view('contact')->render();
    }

    public function portfolios(){
        $portfolios = Portfolio::orderBy("updated_at","DESC")->get();
        return view('portfolios',compact("portfolios"));
    }

    public function portfolios_detail($slug, $id){
        $portfolio = Portfolio::where("slug",$slug)->where("id",$id)->firstOrFail();
        return view('portfolio_single',compact("portfolio"));
    }

    public function services(){
        $services = Service::orderBy("updated_at","DESC")->get();
        return view('services',compact("services"));
    }
}
