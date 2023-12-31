<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\ImageRepository;
use App\Services\FileStorageService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $categories = Category::orderByDesc( 'id' )->paginate( 5 );

        return view(
            'admin.categories.index',
            compact( 'categories' )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $categories = Category::all();

        return view( 'admin.categories.create', compact( 'categories' ) );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( CreateCategoryRequest $request, ImageRepository $imageRepository ) {
        $fields         = $request->validated();
        $fields['slug'] = Str::of( $fields['name'] )->slug( '-' );
//        dd($request);
        if ( isset( $fields['cat_image'] ) ) {
            $image = $fields['cat_image'];
        }
        unset( $fields['cat_image'] );
        $category = Category::create( $fields );
        if ( isset($image) ) {
            $imageRepository->attach( $category, 'image', [$image], 'category/' . $category->slug );
        }

        return redirect()->route( 'admin.categories.index' );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Category $category ) {
        $categories = Category::all();

        return view( 'admin.categories.edit', compact( 'category', 'categories' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( UpdateCategoryRequest $request, Category $category, ImageRepository $imageRepository ) {
        $fields = $request->validated();
//        dd($fields);
        $image = $fields['cat_image'] ?? null;
        unset($fields['cat_image']);


        if ( isset( $image ) && $category->image()->count()) {
            FileStorageService::remove($category->image()->get()->first()->path);
            $category->image()->delete();
        }

        $category->updateOrFail( $fields );
        $imageRepository->attach( $category, 'image', [$image], 'category/' . $category->slug );
        return redirect()->route( 'admin.categories.edit', $category );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Category $category ) {
        $this->middleware( 'permission:' . config( 'permission.access.categories.delete' ) );

        if ( $category->childs()->exists() ) {
            $category->childs()->update( [ 'parent_id' => null ] );
        }

        $category->deleteOrFail();

        return redirect()->route( 'admin.categories.index' );
    }
}
