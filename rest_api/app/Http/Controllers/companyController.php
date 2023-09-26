<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Carbon\Carbon;

class companyController extends Controller
{
    function date(Request $request)
    {  
        $company = Company::find(1);
        $company->date = $request->date;
        $company->image = $request->file('image')->store('apiDocs');
        $result = $company->save();
        if ($result) {
            return "Data formate update.";
        } else {
            return "Data is formate not update.";
        }
    }

    function data()
    {
        $company = Company::all();
        return $company;
    }
}
