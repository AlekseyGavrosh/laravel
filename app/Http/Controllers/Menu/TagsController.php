<?php

namespace App\Http\Controllers\Menu;

use App\Entities\Tags;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagsRequest;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagsController extends Controller
{
    public function index()
    {

        // тут надо посчитать количесвто записей в таблице article_tags

        $tags = DB::table('tags')
            ->select('tags.*')
            ->paginate(10);

        foreach ($tags->all() as &$item) {

            $item->count_articles = DB::table('article_tags')
<<<<<<< HEAD
                ->join('articles', 'article_tags.article_id', '=', 'articles.id')
=======
>>>>>>> origin/feature_blog_laravel_1
                ->where('tags_id', '=', $item->id)
                ->count();

        }

        return view('menu.tags.index', ['tags' => $tags]);
    }

    public function addTags()
    {
        return view('menu.tags.add');
    }


    /**
     * @param TagsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addRequestTags(TagsRequest $request)
    {

        try {
//            $this->validate($request, [
//                'title' => 'required|string|min:4|max:130'
//            ]);

            $objTags = new Tags();
            $objTags = $objTags->create([
                'name' => $request->input('title'),
            ]);
            if ($objTags) {
                return redirect()->route('tags')->with('success', 'Tag успешно добавлен');
            }
            return back()->with('errors', 'Tag не добавлен');
        } catch (ValidationException $e) {
            \Log::error($e->getMessage());
            return back()->with('errors', $e->getMessage());
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function editTags(int $id)
    {

        $tag = Tags::find($id);
        if (!$tag) {
            return abort(404);
        }

        return view('menu.tags.edit', ['tag' => $tag]);
    }

    /**
     * @param TagsRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editRequestTags(TagsRequest $request, int $id)
    {

        try {


            $tag = Tags::find($id);

            if (!$tag) {
                return abort(403);
            }

            $tag->name = $request->input('title');

            if ($tag->save()) {
                return redirect()->route('tags')->with('success', 'Тег  сохранен');
            }

            return back()->with('success', 'Тег не изменен');

        } catch (ValidationException $e) {
            \Log::error($e->getMessage());
            return back()->with('errors', $e->getMessage());
        }

    }

    public function deleteTags(Request $request)
    {

        if ($request->ajax()) {
            $id = (int)$request->input('id');
            $objTags = new Tags();

            $objTags->where('id', $id)->delete();
            echo 'success';

        }
    }

}
