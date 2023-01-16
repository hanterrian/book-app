import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import * as path from "path";

const host = 'localhost';

export default defineConfig({
    server: {
        hmr: { host },
    },
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});
