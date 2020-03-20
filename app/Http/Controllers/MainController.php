<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

    public function index()
    {

        $articles = DB::table('articles')
            ->leftJoin('category_articles', 'articles.id', '=', 'category_articles.article_id')
            ->leftJoin('categories', 'category_articles.category_id', '=', 'categories.id')
            //  ->leftJoin('tags', 'tags.id', '=', 'article_tags.tags_id')
            ->select('articles.*', 'categories.title as title_categories')
            ->paginate(10);

        $articlesTag = [];
        foreach ($articles->items() as $key => $article) {

            $tags = DB::table('article_tags')
                ->leftJoin('tags', 'tags.id', '=', 'article_tags.tags_id')
                ->select('tags.*')
                ->where('article_tags.article_id', '=', $article->id)->get();

            if (!empty($tags->all())) {
                $tags = $tags->all();

                $articlesTag[$article->id] = (array)$tags;
            }
        }

        return view('menu.index', ['articles' => $articles, 'articlesTag' => $articlesTag]);
    }

    public function search()
    {

        $result = [];
        if (!empty($_POST['search'])) {
            $search = trim(htmlspecialchars($_POST['search']));
            $article = DB::table('articles')
                ->select('articles.title', 'articles.id')
                ->where('articles.title', 'LIKE', "%" . $search . "%")->get();

            $answer = $article->all();

            if (!empty($answer)) {
                foreach ($answer as $key => $item) {
                    $key = route("articles.read", ["id" => $item->id]);
                    $result[$key] = $item->title;
                }
            }
        }

        if (!empty($result)) {
            echo json_encode($result);
        } else {
            echo 'false';
        }
    }
}
