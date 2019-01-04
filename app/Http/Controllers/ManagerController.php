<?php namespace App\Http\Controllers;

use App\Article;
use App\Category;

class ManagerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $articles = Article::with('category')->orderByDesc('created_at')->paginate(5);
        $categories = Category::get();

        return view('manager.index', compact('articles', 'categories'));
    }
}
