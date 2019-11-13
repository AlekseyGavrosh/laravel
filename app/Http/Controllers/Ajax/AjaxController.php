<?php

namespace App\Http\Controllers\Ajax;

use App\Entities\Tags;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function articlesAddTags(Request $request) {

        if ($request->ajax()) {
            $word = (string) $request->input('word');

            $tags = DB::table('tags')
                ->where('name', 'like', $word . '%')
                ->get();

            if (count($tags) > 0) {

                echo json_encode($tags);
            }

            echo 'error';
        }
    }
}
