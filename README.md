# Kirby ViteKit ⚡️

## Installation

These are a few notes on how I managed to use [Vite.js](https://vitejs.dev) together with a `public` folder setup for [Kirby 3](https://getkirby.com/). Hopefully, I will find the time for some more explanations in the future.

### Vhost

First of all you need to set up local domain. Unfortunately `http://localhost:3000` won't be available (see below).

```
<Virtualhost *:80>
    DocumentRoot "/Users/path/to/project/public"
    ServerName kirby-vitekit.local
</Virtualhost>
```

Please make sure to run all the commands below from the root folder of your project.

```
cd path/to/project
```

### Composer

The Kirby related dependencies are not included in this repository. Please make sure to install them with composer.

```
composer install
```

### Symlink src assets during development

During development Kirby can't acces your static files (like font files or images linked in css) in the `src` folder. Therefore it's necessary to create a symbolic link inside of the `public` folder.

```
ln -s /Users/path/to/project/src/assets public/assets
```

### npm, yarn, package.json

[Vite.js requires](https://vitejs.dev/guide/) [Node.js](https://nodejs.org/en/) Version >= `12.0.0`. I used `14.11.0` for my tests.


```
yarn install
```


## Development

You can start the development process with:

```
yarn dev
```

Vite will run a local server on port `:3000`. Because of the unusual setup `http://localhost:3000` won't be accessible. To be honest, I don't really understand the reasons but it's no problem for use because we can use the local domain. You can [find more information here](https://github.com/andrefelipe/vite-php-setup)


## Build

If you are ready for production you yhould stop the dev server and use the following command to create your optimized assets.
```
yarn build
```

Vite will generate a hashed version of all of the `css` and `js` files including the static assets you used. All these files will be exported to `/public/dist/assets`. In addition to that, a `manifest.json` file will generated to map the latest versions of the files.

I included the `dist` folder in this repository to show the basic setup. You might want to add it to your `.gitignore`.

## Backend integration

Kirby has to switch dynamically between `development` and `production` mode and included different scripts and files. This is handled by the `vite` helper plugin included in this repository.

**MORE INFORMATION ABOUT THE PLUGIN WILL FOLLOW.**

Just one thing: during development a `.lock` file will be generated inside the `src` folder (and will be deleted when you run the build command). The `vite` plugin will use this `.lock` file to indicate whether to use the [dynamic import polyfill](https://vitejs.dev/config/#build-polyfilldynamicimport) or the generated and hased assets.

You can find more information about the Vite backend integration here: https://vitejs.dev/guide/backend-integration.html#backend-integration

## License

Feel free to use this ViteKit setup for your personal and commercial projects for free. 
Feel also free to [send me money](https://www.paypal.me/flokosiol/5) if you like.

### Kirby
You can try Kirby on your local machine or on a test server as long as you need to make sure it is the right tool for your next project … and when you’re convinced, [buy your license using this affiliate link](https://a.paddle.com/v2/click/1129/36201?link=1170).


## Links and Credits

https://github.com/tonsky/FiraCode
https://github.com/andrefelipe/vite-php-setup
https://getkirby.com/
https://vitejs.dev
