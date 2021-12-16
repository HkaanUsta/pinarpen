<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class servicesController extends Controller
{

    public function index()
    {
        $services = Service::orderBy("updated_at","DESC")->get();
        return view("management_panel.services.index",compact("services"));
    }


   public function create()
   {
       return view('management_panel.services.create')->render();
   }

   public function store(Request $request)
   {
        $request->validate([
            "name"=>"required",
            "image"=>"required",
            "spec"=>"required",
        ]);

        $service = new Service();
        $service->name = $request->name;
        $service->slug = Str::slug($request->name);
        $service->spec = $request->spec;

        if($request->hasFile('image')){
            $path = Storage::putFile("public/services",new File($request->file("image")),"public");
            $path = Str::replace("public","storage",$path);
            $service->image = $path;
        }

        $service->save();

        return redirect("/admin/services")->with("success","Service created successful");

    }

    public function edit($id){
        $service = Service::where("id",$id)->firstOrFail();

        return view("management_panel.services.edit",compact("service"));
    }

    public function update($id, Request $request){
        $request->validate([
            "name"=>"required",
            "spec"=>"required",
        ]);

        $service = Service::findOrFail($id);
        $service->name = $request->name;
        $service->slug = Str::slug($request->name);
        $service->spec = $request->spec;


        $service->slug = Str::slug($request->name);

        if($request->hasFile('image')){
            if(Storage::exists(Str::replace("storage","public",$service->image))){
                Storage::delete(Str::replace("storage","public",$service->image));
            }
            $path = Storage::putFile("public/services",new File($request->file("image")),"public");
            $path = Str::replace("public","storage",$path);
            $service->image = $path;
        }

        $service->save();

        return redirect()->back()->with("success","Service updated successful");
    }

    public function delete(Request $request)
    {
        $request->validate(["id"=>"required"]);
        $service = Service::findOrFail($request->id);
        if(Storage::exists(Str::replace("storage","public",$service->image))){
            Storage::delete(Str::replace("storage","public",$service->image));
        }

        $service->delete();
        return redirect()->back()->with("success","Service deleted successful");
    }

}
