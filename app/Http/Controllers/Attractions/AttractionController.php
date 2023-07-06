<?php

namespace App\Http\Controllers\Attractions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Attractions\StoreRequest;
use App\Http\Requests\Attractions\UpdateRequest;

use App\Models\Attraction;
use Auth;

use App\Traits\PriceTrait;

class AttractionController extends Controller
{
    use PriceTrait;
    public function index()
    {
        $attractions = Attraction::whereParkId(Auth::user()->Parks->first()->id)->get();
        
        return view('attractions.index', ['attractions'=>$attractions]);
    }

    public function store(StoreRequest $request)
    {
        $attraction = Attraction::create($request->all());
        if( $request->is_free_time ){
            $this->storePrice($attraction, 0, $request->price);
        }else{
            $this->storePrice($attraction, 15, $request->price15);
            $this->storePrice($attraction, 30, $request->price30);
            $this->storePrice($attraction, 60, $request->price60);
        }
        return redirect()->route('attractions');
    }

    public function update(Attraction $attraction, UpdateRequest $request)
    {
        if(!isset($request->is_free_time)) { $request['is_free_time'] = false; }
        $attraction->update($request->all());
        if( $request->is_free_time ){
            $this->updatePrice($attraction, 0, $request->price);
        }else{
            $this->updatePrice($attraction, 15, $request->price15);
            $this->updatePrice($attraction, 30, $request->price30);
            $this->updatePrice($attraction, 60, $request->price60);
        }
        return redirect()->route('attractions');
    }

    public function show(Attraction $attraction) 
    {
        return view('attractions.update',['attraction'=>$attraction]);
    }

    public function destroy(Attraction $attraction) 
    {
        return $attraction;
        $attraction->delete();
        return redirect()->route('attractions');
    }
}
