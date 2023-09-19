<?php
/**
 * @var \App\Models\Attributes\Color $color
 */

?>
<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light"><a href="{{ route('admin.dashboard') }}">Головна</a></span>/
            <span class="text-muted fw-light"><a href="{{ route('admin.colors.index') }}">Кольори</a></span>/
            Редагування
        </h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">
                        {{ $color->hex }}
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('admin.colors.update', $color) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <label class="form-label" for="name">Назва кольору</label>
                                <input type="text" class="form-control form-control-lg" id="name"
                                       placeholder="name" name="name" aria-describedby="category-name-helper"
                                       value="{{ $color->name }}">
                                <div id="category-name-helper" class="form-text">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                </div>
                            </div>
                            <div>
                                <label class="form-label" for="slug">Slug</label>
                                <input type="text" class="form-control form-control-lg" id="slug"
                                       placeholder="hex" name="slug" aria-describedby="category-slug-helper"
                                       value="{{ $color->slug }}">
                                <div id="category-slug-helper" class="form-text">
                                    <x-input-error :messages="$errors->get('slug')" class="mt-2"/>
                                </div>
                            </div>
                            <div>
                                <label class="form-label" for="hex">Name</label>
                                <input type="color" class="form-control form-control-lg" id="hex"
                                       placeholder="hex" name="hex" aria-describedby="category-hex-helper"
                                       value="{{ $color->hex }}">
                                <div id="category-hex-helper" class="form-text">
                                    <x-input-error :messages="$errors->get('hex')" class="mt-2"/>
                                </div>
                            </div>
                            <button type="submit" class="btn rounded-pill btn-primary">Оновити</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
