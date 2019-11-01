<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Article;
use App\Entities\Category;
use App\Entities\CategoryArticle;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticaleRequest;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    //

    public function index()
    {
        $objArticle = new Article();
        $articles = $objArticle->get();


        return view('admin.articles.index',['articles' => $articles]);
    }

    public function addArticle()
    {

        $objCategory = new Category();
        $categories = $objCategory->get();

        return view('admin.articles.add', ['categories' => $categories]);
    }

    public function editArticle(int $id)
    {

    }

    public function addRequestArticle(ArticaleRequest $request)
    {
        $objArticle = new Article();
        $objCategoryArticle = new CategoryArticle();

        $fullText = $request->input('full_text') ?? null;

        $objArticle = $objArticle->create([
            'title' => $request->input('title'),
            'short_text' => $request->input('short_text'),
            'full_text' => $fullText,
            'author' => $request->input('author')
        ]);

        if ($objArticle) {
            foreach ($request->input('categories') as $category_id) {

                $category_id = (int)$category_id;
                $objCategoryArticle = $objCategoryArticle->create([
                    'category_id' => $category_id,
                    'article_id' => $objArticle->id
                ]);
            }

            return redirect()->route('articles')->with('success', 'Статья сохранилась');

        }

        return back()->with('errors', ' Не удалось добавить статью');

    }

    public function deleteArticle(Request $request)
    {

        if ($request->ajax()) {
            $id = (int)$request->input('id');
            $objArticle = new Article();

            $objArticle->where('id', $id)->delete();
            echo 'success';

        }



    }
}
