<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\device;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class deviceController extends Controller
{
    // function list($id=null)
    // {
    //     $device = $id?Post::find($id):Post::all();
    //     return $device;
    // }

    function add(Request $request)
    {
        $rules = array(
            "name" => "required"
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $post = new Post;
            $post->name = $request->name;
            $post->date = Carbon::parse($request->input('date'))->format('Y-m-d');
            $result =  $post->save();
            if ($result) {
                return ["Result" => "Data has been saved."];
            } else {
                return ["Result" => "Data has not been saved."];
            }
        }
    }

    function update(Request $request)
    {
        $post = Post::find($request->id);
        $post->name = $request->name;
        $post->date = Carbon::parse($request->input('date'))->format('Y-m-d');
        $result = $post->save();
        if ($result) {
            return ["Result" => "Data is updated."];
        } else {
            return ["Result" => "Data is not updated."];
        }
    }

    function delete($id)
    {
        $post = Post::find($id);
        $result = $post->delete();
        if ($result) {
            return ['Result' => "Data is deleted." . $id];
        } else {
            return ['Result' => "Data is not deleted."];
        }
    }

    function search($name)
    {
        return Post::where('name', 'like', '%' . $name . '%')->get();
    }

    function get()
    {
        //Task 1 and 2->when get second number of data share ss hear and i'll give you another api and Add SW_  in name filed in only 2 rows
        // $posts = Post::skip(2)->take(2)->get();       
        // $posts->map(function ($post) {
        //     $post->name = 'SW ' . $post->name;
        // });
        // $posts = Post::skip(0)->take(1)->get();
        $posts=Post::all();
        $company = Company::where("id", 1)->first();
        $dateformate = ['','M-d-y', 'd-m-y', 'y-d-m'];
        $formate = $dateformate[$company->date];
        $posts->map(function ($post) use ($formate) {
            $post->date = date($formate, strtotime($post->date)); 
        });

        // $posts = Post::all();
        return $posts;
    }
}
