<?php

namespace App\Http\Controllers\Menu;

use App\Entities\Category;
use App\Entities\Tags;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index()
    {

        $categories = DB::table('categories')
            ->select('categories.*')
            ->paginate(10);

        foreach ($categories->all() as &$item) {

            $item->count_articles = DB::table('category_articles')
                ->where('category_id', '=', $item->id)
                ->count();

            if (!empty($item->parent_id) && isset($item->parent_id)) {
                $parent = Category::find($item->parent_id);
                $item->parent_name = $parent->title;
            } else {
                $item->parent_name = 'Нет родителя';
            }

        }

        $accordionCategory = self::getCategoryBy('');

        $objTags = new Tags();
        $tags = $objTags->get();


        return view('menu.categories.index', [
            'categories' => $categories,
            'accordion' => $accordionCategory,
            'tags' => $tags
        ]);
    }

    /**
     * Строим дерево каталогов
     * @param $by
     * @param int $level
     *
     * @return array
     */

    public function getCategoryBy($by, $level = -1)
    {
        $level++;
        $categories = (array)DB::select('select * from categories where parent_id = ?', [$by]);

        if ($categories) {
            foreach ($categories as $key => &$category) {
                $category->item = $this->getCategoryBy($category->id, $level);
            }
        }
        return $categories;

    }

    public function addCategory()
    {
        $objCategory = new Category();
        $categories = $objCategory->get();

        return view('menu.categories.add', ['categories' => $categories,]);
    }

    /**
     * @param CategoriesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addRequestCategory(CategoriesRequest $request)
    {
        try {

            $objCategory = new Category();
            $objCategory = $objCategory->create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'parent_id' => $request->input('categories')
            ]);
            if ($objCategory) {
                return redirect()->route('categories')->with('success', trans('messages.category.add'));
            }
            return back()->with('errors', 'messages.category.errorAdd');
        } catch (ValidationException $e) {
            \Log::error($e->getMessage());
            return back()->with('errors', $e->getMessage());
        }
    }

    /**
     * @param int $id
     */
    public function editCategory(int $id)
    {

        $category = Category::find($id);
        if (!$category) {
            return abort(404);
        }

        $objCategory = new Category();
        $categories = $objCategory->get();


        return view('menu.categories.edit', [
            'category' => $category,
            'categories' => $categories
        ]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editRequestCategory(Request $request, int $id)
    {

        try {

            $this->validate($request, [
                'title' => 'required|string|min:4|max:130',
                'description' => 'required'
            ]);

            $objCategory = Category::find($id);

            if (!$objCategory) {
                return abort(403);
            }

            $objCategory->title = $request->input('title');
            $objCategory->description = $request->input(('description'));
            $objCategory->parent_id = $request->input('categories');

            if ($objCategory->save()) {

                return redirect()->route('categories')->with('success', 'Категория успешно   сохранена');
            }

            return back()->with('success', 'Категория не изменена');

        } catch (ValidationException $e) {
            \Log::error($e->getMessage());
            return back()->with('errors', $e->getMessage());
        }

    }

    public function deleteCategory(Request $request)
    {

        if ($request->ajax()) {
            $id = (int)$request->input('id');
            $objCategory = new Category();

            $objCategory->where('id', $id)->delete();
            echo 'success';

        }
    }

}
