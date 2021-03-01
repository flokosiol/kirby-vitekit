import liveReload from 'vite-plugin-live-reload'
const { resolve } = require('path')

export default {
  plugins: [
    liveReload(__dirname+'/site/**/*.php')
  ],
  root: 'src',
  base: process.env.APP_ENV === 'development' ? '/' : '/dist/',
  build: {
    outDir: resolve(__dirname, 'public/dist'),
    emptyOutDir: true,
    manifest: true,
    target: 'es2018',
    rollupOptions: {
      input: '/index.js'
    },
    server: {
      cors: true,
      strictPort: true,
      port: 3000
    },
  }
}

