<?php


namespace App\Classes;

use App\Companie;
use App\Http\Requests\CompanieRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class CompanieClass
{

    public function getCompanie()
    {
        return Companie::latest()->paginate(5);
    }

    public function getSelect2Data(Request $request)
    {
        if ($request->ajax()) {

            $term = trim($request->term);
            $companie = DB::table('companies')->select('id','name as text')
                ->where('name', 'LIKE',  '%' . $term. '%')
                ->simplePaginate(5);
            $morePages = true;
            if (empty($companie->nextPageUrl())) {
                $morePages = false;
            }
            $results = array(
                "results" => $companie->items(),
                "pagination" => array(
                    "more" => $morePages
                )
            );

            return $results;
        }
    }


    public function store(CompanieRequest $request)
    {
        Companie::create([
            'name' => $request->name,
            'logo' => $request->file('logo')->store('app/company'),
            'email' => $request->email,
            'website' => $request->website,
        ]);
    }


    public function update(CompanieRequest $request, Companie $companie)
    {

        if ($request->logo){
            Storage::delete($companie->logo);
                 
        $logo= $request->file('logo')->store('images/companie'); 

        }else{
            $logo= $companie->logo;
        }
   
        $companie->update([
            'name' => $request->name,
            'logo' => $logo,
            'email'=>$request->email,
            'website'=>$request->website
        ]);
    }

    public function destroy(Companie $companie)
    {    Storage::delete($companie->logo);
       
        $companie->delete();
    }
}
