import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/vendors/plugin/js/jquery.exzoom',
                'resources/css/app.css',
                'resources/css/admin/app.css',
                'resources/js/app.js',
                'resources/js/admin/app.js'

    ],
            refresh: true,
        }),
    ],
});
