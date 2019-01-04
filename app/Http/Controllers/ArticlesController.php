<?php namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleCreateOrUpdate;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::get();
        $articles = Article::with('category')
            ->when($request->has('category'), function ($q) use ($request) {
                $q->where('category_id', $request->input('category'));
            })
            ->orderByDesc('created_at')
            ->paginate(5);

        return view('articles.index', compact('articles', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();

        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleCreateOrUpdate $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleCreateOrUpdate $request)
    {
        $article = new Article();
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->short_description = $request->input('short_description');
        $article->category_id = $request->input('category_id', null);
        $article->save();

        return redirect()->route('manager')->with('message', 'Article created!');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::get();

        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ArticleCreateOrUpdate $request
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ArticleCreateOrUpdate $request, Article $article)
    {
        $article = $this->prepareArticle($article, $request);
        $article->save();

        return redirect()->route('manager')->with('message', 'Article updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        $message = 'Article deleted!';
        try {
            $article->delete();
        } catch (\Exception $e) {
            $message = 'An error has occurred!';
        }

        return redirect()->route('home')->with('message', $message);
    }

    protected function prepareArticle(Article $article, Request $request): Article
    {
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->short_description = $request->input('short_description');
        $article->category_id = $request->input('category_id', null);

        return $article;
    }
}
