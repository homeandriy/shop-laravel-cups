<?php
/**
 * @var \App\Models\Category[] $categories
 */
?>
<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light"><a href="{{ route('admin.dashboard') }}">Головна</a></span>/
            <span class="text-muted fw-light"><a href="{{ route('admin.categories.index') }}">Категорії</a></span>/
            Створення
        </h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">
                        Введіть дані категорії
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div>
                                <label class="form-label" for="category-name">Name</label>
                                <input type="text" class="form-control form-control-lg" id="category-name" placeholder="Name" name="name" aria-describedby="category-name-helper">
                                <div id="category-name-helper" class="form-text">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>

                            <div>
                                <label for="category-description" class="form-label">Description</label>
                                <textarea class="form-control" id="category-description" name="description" aria-describedby="category-description-helper" rows="3" placeholder="Description"></textarea>
                                <div id="category-description-helper" class="form-text">
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                            </div>
                            <div class="mt-2 mb-3">
                                <label for="category-parent" class="form-label">Parent category</label>
                                <select id="category-parent" class="form-select form-select-lg" name="parent_id">
                                    <option value="">Батьківська категорія</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('parent_id')" class="mt-2" />
                            </div>
                            <div class="mt-2 mb-3">
                                <label for="cat_image" class="form-label">Зображення</label>
                                <input class="form-control" type="file" name="cat_image" id="cat_image">
                                <x-input-error :messages="$errors->get('cat_image')" class="mt-2" />
                            </div>
                            <div class="mb-4">
                                <img src="#" id="thumbnail-preview">
                            </div>
                            <button type="submit" class="btn rounded-pill btn-primary">Створити</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
