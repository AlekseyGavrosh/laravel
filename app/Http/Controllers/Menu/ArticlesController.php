<?php

namespace App\Http\Controllers\Menu;

use App\Entities\Article;
use App\Entities\ArticleTags;
use App\Entities\Category;
use App\Entities\CategoryArticle;
use App\Entities\Tags;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticaleRequest;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    //

    public function __construct()
    {

        //  $path = public_path();
        //   $value = Config::get('app.timezone');
//
//        parent::__construct();
//        $css[] = 'style.articles.css';

        //    var_dump(Route::currentRouteName());
        //    return redirect()->route('articles')->with('success', 'Статья сохраниласьуцка');
    }

    public function index()
    {

        $articles = DB::table('articles')
            ->leftJoin('category_articles', 'articles.id', '=', 'category_articles.article_id')
            ->leftJoin('categories', 'category_articles.category_id', '=', 'categories.id')
            ->select('articles.*', 'categories.title as title_categories')
            ->paginate(10);

        return view('menu.articles.index', ['articles' => $articles]);
    }


    public function linkedArticlesToTag(int $id) {


//        $objTag = Tags::find($id);
//        $mainTags = $objTag->tags;


        $articles = DB::table('article_tags')
            ->join('articles', 'article_tags.article_id', '=', 'articles.id')
            ->join('category_articles', 'articles.id', '=', 'category_articles.article_id')
            ->join('categories', 'category_articles.category_id', '=', 'categories.id')
           // ->leftJoin('tags', 'article_tags.article_id', '=', 'tags.tags_id')
            ->select('articles.*','categories.title as title_categories')
            ->where('article_tags.tags_id', '=', $id)
            ->paginate(10);

        return view('menu.articles.index', ['articles' => $articles]);

        return $this->belongsToMany(Tags::class, 'article_tags', 'article_id', 'tags_id');
    }


    public function readArticle(int $id)
    {

        $objArticle = Article::find($id);

        if (!$objArticle) {
            return abort(404);
        }
        $objCategory = new Category();
        $categories = $objCategory->get();

        $mainCategories = $objArticle->categories;
        $mainCategories = $mainCategories->all();
        $objArticle->cateroryTitle = $mainCategories[0]->title;

        $mainTags = $objArticle->tags;

        return view('menu.articles.read', [
            'article' => $objArticle,
            'categories' => $categories,
            'arrTags' => $mainTags
        ]);

    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addArticle()
    {

        $objCategory = new Category();
        $categories = $objCategory->get();

        $objTags = new Tags();
        $tags = $objTags->get();

        return view('menu.articles.add', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function addRequestArticle(ArticaleRequest $request)
    {
        $objArticle = new Article();
        $objCategoryArticle = new CategoryArticle();
        $objArticleTag = new ArticleTags();

        $fullText = $request->input('full_text') ?? null;

        $objArticle = $objArticle->create([
            'title' => $request->input('title'),
            'short_text' => $request->input('short_text'),
            'full_text' => $fullText,
            'author' => $request->input('author')
        ]);

        if ($objArticle->id) {

            $objCategoryArticle->where('article_id', $objArticle->id)->delete();
            foreach ($request->input('categories') as $category_id) {

                $category_id = (int)$category_id;
                $objCategoryArticle = $objCategoryArticle->create([
                    'category_id' => $category_id,
                    'article_id' => $objArticle->id
                ]);
            }

            $objArticleTag->where('article_id', $objArticle->id)->delete();
            foreach ($request->input('tags') as $tags_name) {
                $tagsId = Tags::firstOrCreate(['name' => $tags_name]);
                $objArticleTag = $objArticleTag->create([
                    'tags_id' => $tagsId->id,
                    'article_id' => $objArticle->id
                ]);
            }


            return redirect()->route('articles')->with('success', 'Статья сохранилась');
        }
        return back()->with('errors', ' Не удалось добавить статью');

    }


    public function editArticles(int $id)
    {

        $objArticle = Article::find($id);
        if (!$objArticle) {
            return abort(404);
        }
        $objCategory = new Category();
        $categories = $objCategory->get();

        $objTags = new Tags();
        $tags = $objTags->get();

        $arrCategories = [];
        $mainCategories = $objArticle->categories;

        $arrTags = [];
        $mainTags = $objArticle->tags;

        foreach ($mainCategories as $category) {
            $arrCategories[] = $category->id;
        }

        foreach ($mainTags as $tag) {
            $arrTags[str_replace(' ', '', $tag->name)] = $tag->name;
        }

        return view('menu.articles.edit', [
            'article' => $objArticle,
            'categories' => $categories,
            'arrCategories' => $arrCategories,
            'tags' => $tags,
            'arrTags' => $arrTags
        ]);

    }

    public function editRequestArticle(ArticaleRequest $request, int $id)
    {


        try {

            $objArticle = Article::find($id);

            if (!$objArticle) {
                return abort(403);
            }

            $objArticle->title = $request->input('title');
            $objArticle->short_text = $request->input('short_text');
            $objArticle->author = $request->input('author');
            $objArticle->full_text = $request->input('full_text');

            if ($objArticle->save()) {

                $objCategoryArticle = new CategoryArticle();
                $objCategoryArticle->where('article_id', $objArticle->id)->delete();
                foreach ($request->input('categories') as $category_id) {

                    $category_id = (int)$category_id;
                    $objCategoryArticle = $objCategoryArticle->create([
                        'category_id' => $category_id,
                        'article_id' => $objArticle->id
                    ]);
                }

                $objArticleTag = new ArticleTags();
                $objArticleTag->where('article_id', $objArticle->id)->delete();

                if (!empty($request->input('tags')))
                {
                    foreach ($request->input('tags') as $tags_name) {
                        $tagsId = Tags::firstOrCreate(['name' => $tags_name]);
                        $objArticleTag = $objArticleTag->create([
                            'tags_id' => $tagsId->id,
                            'article_id' => $objArticle->id
                        ]);
                    }
                }

                return redirect()->route('articles')->with('success', 'Статья сохранилась');
            }

            return back()->with('success', 'Статья не изменена');

        } catch (ValidationException $e) {
            \Log::error($e->getMessage());
            return back()->with('errors', $e->getMessage());
        }
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
