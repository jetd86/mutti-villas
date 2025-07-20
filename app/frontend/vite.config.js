import {defineConfig} from 'vite'
import {resolve} from 'path'
import path from 'path';
import fs from 'fs'
import {viteStaticCopy} from 'vite-plugin-static-copy'
// import viteImagemin from 'vite-plugin-imagemin'
import {imagetools} from 'vite-imagetools'

// Автоопределение всех .js файлов в корне (например, main.js, about.js и т.п.)
const inputFiles = {}
fs.readdirSync(__dirname)
    .filter(file =>
        file.endsWith('.js') &&
        file !== 'vite.config.js' &&
        !file.startsWith('.')
    )
    .forEach(file => {
        const name = file.replace(/\.js$/, '')
        inputFiles[name] = resolve(__dirname, file)
    })

export default defineConfig({
    root: resolve(__dirname),
    base: '/local/assets/',
    assetsInclude: ['**/*.mp4'],
    build: {
        outDir: '../local/assets',
        emptyOutDir: true,
        manifest: true,
        manifestFileName: 'manifest.json',
        cssCodeSplit: true,
        rollupOptions: {
            input: inputFiles,
            external: [
                'fsevents', 'path', 'fs', 'os', 'stream', 'events', 'util', 'node:path', 'rollup'
            ],
            output: {
                entryFileNames: 'assets/[name].[hash].js',
                chunkFileNames: 'assets/[name].[hash].js',
                assetFileNames: 'assets/[name].[hash][extname]',
            }
        }
    },
    esbuild: {
        target: 'es2018',
    },
    resolve: {
        alias: {
            '@config': path.resolve(__dirname, 'config'),
            '@fonts': path.resolve(__dirname, 'fonts'),
            '@icons': path.resolve(__dirname, 'icons'),
            '@images': path.resolve(__dirname, 'images'),
            '@styles': path.resolve(__dirname, 'styles'),
            '@video': path.resolve(__dirname, 'video')
        }
    },
    plugins: [
        viteStaticCopy({
            targets: [
                {src: 'fonts/*', dest: 'assets/fonts'},
                {src: 'icons/*', dest: 'assets/icons'},
                {src: 'images/*', dest: 'assets/images'},
            ]
        }),
        imagetools()
    ]
})
