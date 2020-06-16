<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Bookmark;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tags = Tag::orderBy('id', 'desc')->paginate(20);
        return view('tags.index', compact('tags'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * @param TagRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TagRequest $request)
    {
        Tag::create($request->all());
        return redirect()
            ->route('tags.index')
            ->with('status', 'タグを登録しました。');
    }

    /**
     * @param Tag $tag
     * @return \Illuminate\View\View
     */
    public function show(Tag $tag)
    {
        $bookmarks = $tag->bookmarks()->paginate(20);
        return view('tags.show', compact('tag', 'bookmarks'));
    }

    /**
     * @param Tag $tag
     * @return \Illuminate\View\View
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    /**
     * @param TagRequest $request
     * @param Tag $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->all());
        return redirect()
            ->route('tags.edit', $tag)
            ->with('status', 'タグを更新しました。');
    }

    /**
     * @param Tag $tag
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        $tag->bookmarks()->detach();

        return redirect()
            ->route('tags.index')
            ->with('status', 'タグを削除しました。');
    }
}