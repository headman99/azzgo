<?php

namespace App\Http\Controllers;

use App\Http\Resources\PublisherResource;
use App\Models\Ateco;
use App\Models\StoreCategory;
use Illuminate\Http\Request;

class LookupController extends Controller
{

    public function categoryStoreParent(){
        $atecoParents = Ateco::whereNull('parent_id')->get();
        if(count($atecoParents) == 0)
        {
            return response(null, \Illuminate\Http\Response::HTTP_NO_CONTENT);
        }
        return response([ 'atecosparent' => $atecoParents]);
    }

    public function categoryStoreNode($code){
        $atecoParents = Ateco::where('code', $code)->first();
        $atecoNodes = Ateco::descendantsAndSelf($atecoParents->id);
        return response([ 'atecosnode' => $atecoNodes]);
    }

    public function getStoreCategories(){
        $storecategoties = StoreCategory::all();
        return response(['storecategories' => $storecategoties]);
    }
}
