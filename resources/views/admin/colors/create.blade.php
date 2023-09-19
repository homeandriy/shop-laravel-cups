<?php
/**
 *
 */
?>
<x-admin-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light"><a href="{{ route('admin.dashboard') }}">Головна</a></span>/
            <span class="text-muted fw-light"><a href="{{ route('admin.colors.index') }}">Кольори</a></span>/
            Створення Бренду
        </h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">
                        Виберіть новий колір
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('admin.colors.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div>
                                <label class="form-label" for="color-name">Назва Кольору</label>
                                <input type="text" class="form-control form-control-lg" id="color-name" placeholder="name" name="name" aria-describedby="color-name-helper">
                                <div id="color-name-helper" class="form-text">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>
                            <div>
                                <label class="form-label" for="color-slug">Slug</label>
                                <input type="text" class="form-control form-control-lg" id="color-slug" placeholder="slug" name="slug" aria-describedby="color-slug-helper">
                                <div id="color-slug-helper" class="form-text">
                                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                                </div>
                            </div>
                            <div>
                                <label class="form-label" for="color-hex">Color</label>
                                <input type="color" class="form-control form-control-lg" id="color-hex" placeholder="hex" name="hex" aria-describedby="color-hex-helper">
                                <div id="color-hex-helper" class="form-text">
                                    <x-input-error :messages="$errors->get('hex')" class="mt-2" />
                                </div>
                            </div>
                            <button type="submit" class="btn rounded-pill btn-primary">Створити</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
