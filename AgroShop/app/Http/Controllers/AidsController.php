<?php

namespace App\Http\Controllers;

use App\Filters\AidFilter;
use App\Models\Aids;
use App\Models\AidsUtilizationNorms;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\Cultures;
use App\Models\HazardObjects;
use App\Models\PreparativeForms;
use App\Models\Producers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class AidsController extends Controller
{
    public function Aids(Request $request, AidFilter $filter){

        $aidQuery = Aids::query();
        Paginator::useBootstrap();


        if ($request->filled('search_field')){
            $aidQuery->where('aidName', 'LIKE', '%'.$request->search_field.'%');
        }

        $aids = $aidQuery
            ->leftJoin('categories', function ($join) {
                $join->on('aids.category_id', '=', 'categories.id');
            })
            ->leftJoin('preparative_forms', function ($join) {
                $join->on('aids.preparative_forms_id', '=', 'preparative_forms.id');
            })->leftJoin('producers', function ($join) {
                $join->on('aids.producer_id', '=', 'producers.id');
            })
            ->leftJoin('brands', function ($join) {
                $join->on('aids.brand_id', '=', 'brands.id');
            })
            ->leftJoin('aid_components', function ($join) {
                $join->on('aids.aid_components_id', '=', 'aid_components.id');
            })
            ->leftJoin('aids_utilization_norms', function ($join) {
                $join->on('aids.aids_utilization_norm_id', '=', 'aids_utilization_norms.util_norm_id')

                    ->leftJoin('cultures', function ($join) {
                        $join->on('aids_utilization_norms.culture_id', '=', 'cultures.id');

                    })->leftJoin('hazard_objects', function ($join) {
                        $join->on('aids_utilization_norms.hazard_id', '=', 'hazard_objects.id');
                    });
            })
            ->filter($filter)
            ->paginate(3);


        return view('catalog', compact('aids'));
    }

    public function getAids ($aids_id){

        $aidItem = Aids::query()->where('aids_id', $aids_id)->join('categories', function ($join) {
            $join->on('aids.category_id', '=', 'categories.id');
        })
            ->join('preparative_forms', function ($join) {
                $join->on('aids.preparative_forms_id', '=', 'preparative_forms.id');
            })
            ->join('producers', function ($join) {
                $join->on('aids.producer_id', '=', 'producers.id');
            })
            ->join('brands', function ($join) {
                $join->on('aids.brand_id', '=', 'brands.id');
            })
            ->join('aid_components', function ($join) {
                $join->on('aids.aid_components_id', '=', 'aid_components.id');
            })
            ->leftJoin('aids_utilization_norms', function ($join) {
                $join->on('aids.aids_utilization_norm_id', '=', 'aids_utilization_norms.util_norm_id')
                    ->leftJoin('cultures', function ($join) {
                        $join->on('aids_utilization_norms.culture_id', '=', 'cultures.id');
                    })->leftJoin('hazard_objects', function ($join) {
                        $join->on('aids_utilization_norms.hazard_id', '=', 'hazard_objects.id');
                    });
            })
            ->first();

        return view('aids.showAids', compact( 'aidItem',));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aids  $aids
     * @return \Illuminate\Http\Response
     */
    public function show(Aids $aids)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aids  $aids
     * @return \Illuminate\Http\Response
     */
    public function edit(Aids $aids)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aids  $aids
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aids $aids)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aids  $aids
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aids $aids)
    {
        //
    }
}
