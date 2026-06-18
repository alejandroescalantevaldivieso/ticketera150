import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input:[
                'resources/css/login.css', 
                'resources/js/login.js',
                'resources/css/general.css',
                'resources/css/menu.css',
                'resources/js/menu.js',
                'resources/css/principal.css',
                'resources/js/pricipal.js',
                'resources/css/area.css',
                'resources/js/area.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
