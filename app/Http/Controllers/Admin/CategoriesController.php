<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Category;
use App\Http\Controllers\Controller;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $objCategory = new Category();
        $categories = $objCategory->get();

        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function addCategory()
    {
        return view('admin.categories.add');

    }

    public function  addRequestCategory(Request $request) {

        try {

            $this->validate($request, [
                'title' => 'required|string|min:4|max:130'
            ]);

            $objCategory = new Category();
            $objCategory = $objCategory->create([
                'title' => $request->input('title'),
                'description' => $request->input('description')
            ]);
            if ($objCategory) {
                return back()->with('success', 'категория успешно добавлена');
            }

            return back()->with('error', 'категория не добавлена');
        }
        catch (ValidationException $e) {
            \Log::error($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
        // dd($request->all());
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

        return view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function  editRequestCategory(Request $request, int $id) {

        try {

            $this->validate($request, [
                'title' => 'required|string|min:4|max:130'
            ]);

            $objCategory = Category::find($id);

            if (!$objCategory) {
                return abort(403);
            }

            $objCategory->title = $request->input('title');
            $objCategory->description = $request->input(('description'));

            if ($objCategory->save()) {

               return self::index();

              //  return  back()->with('success', 'Категория успешно изменена');
            }

            return  back()->with('success', 'Категория не изменена');

        }
        catch (ValidationException $e) {
            \Log::error($e->getMessage());
            return back()->with('error', $e->getMessage());
        }

    }

    public function deleteCategory( Request $request)
    {

        if ($request->ajax()) {

        }
    }

}
