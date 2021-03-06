<?php

namespace App\Http\Controllers;

use App\Bookmark;
use App\Models\Tag;
use App\BookmarkTag;
use \ArrayObject;
use App\Http\Requests\BookmarkRequest;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $bookmarks = Bookmark::with('tags')->orderBy('id', 'desc')->paginate(20); // ページネーション（idの降順）
        // $bookmarks = Bookmark::with('tags')->orderBy('id', 'desc')->paginate(20);
        $bookmarks = Bookmark::with('tags')->orderBy('id', 'desc')->get();
        // return $bookmarks;
        return view('bookmarks.index', compact('bookmarks')); // viewに渡す変数名と引数名が同じ場合は、compactメソッドが便利
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // 画面を用意
    {
        $tags = Tag::pluck('title', 'id')->toArray();
        return view('bookmarks.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookmarkRequest $request) // テーブルに登録する
    {
        $bookmark = Bookmark::create($request->all());
        $bookmark->tags()->sync($request->tags); // 中間テーブルの情報を更新する

        return redirect()->route('bookmarks.index')
        ->with('status', 'ブックマークを登録しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function show(Bookmark $bookmark)
    {
        return view('bookmarks.show', compact('bookmark'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookmark $bookmark)
    {
        $tags = Tag::pluck('title', 'id')->toArray();
        return view('bookmarks.edit', compact('bookmark', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function update(BookmarkRequest $request, Bookmark $bookmark)
    {
        $bookmark->update($request->all());
        $bookmark->tags()->sync($request->tags); // 中間テーブルの情報を更新する

        return redirect()->route('bookmarks.edit', $bookmark)
        ->with('status', 'ブックマークを更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookmark $bookmark)
    {
        $bookmark->delete();
        $bookmark->tags()->detach(); // 中間テーブルの情報を削除する

        return redirect()->route('bookmarks.index')
        ->with('status', 'ブックマークを削除しました。');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Htt p\Response
     */

    // 指定されたタグに紐づくブックマークの一覧表示
    public function tagToBookmarks($tag_id)
    {
        // クリックされたタグIDを持つブックマークIDを抽出する。
        $bookmarkIDs = BookmarkTag::select('bookmark_id')->where('tag_id', $tag_id)->get();
        $bookmarks = new ArrayObject();

        foreach ($bookmarkIDs as $bookmarkId) {
            // 対象のブックマークIDをもつブックマーク情報を抽出
            $bookmarkInfo = Bookmark::with('tags')->where('id', $bookmarkId["bookmark_id"])->get();
            $bookmarks->append($bookmarkInfo);
            // return $bookmarkInfo;
        }

        $bookmarks = $bookmarks[0];
        // foreach ($bookmarks as $bookmark){
        //     return $bookmark;
        // }

        return view('bookmarks.index', compact('bookmarks')); // viewに渡す変数名と引数名が同じ場合は、compactメソッドが便利
    }
}