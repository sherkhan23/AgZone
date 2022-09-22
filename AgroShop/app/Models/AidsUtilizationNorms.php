<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AidsUtilizationNorms extends Model
{
    public function AidsUtilizationNorms(Request $request){
        $aidsUtilizationNorms = AidsUtilizationNorms::query();
        $aidsUtilNorms = $aidsUtilizationNorms->join('aids', function ($join) {
            $join->on('aids_utilization_norms.aids_id', '=', 'aids.aids_id');
        })->paginate();


    }



}
