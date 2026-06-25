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
                'resources/js/general.js',
                'resources/css/menu.css',
                'resources/js/menu.js',
                'resources/css/principal.css',
                'resources/js/principal.js',
                'resources/css/area.css',
                'resources/js/area.js',
                'resources/css/empresa.css',
                'resources/js/empresa.js',
                'resources/css/empleado.css',
                'resources/js/empleado.js',
                'resources/css/usuario.css',
                'resources/js/usuario.js'
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
