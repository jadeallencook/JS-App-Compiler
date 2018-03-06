# JS App Compiler

In order to use JS App Compiler, your CSS & JS includes __must__ be formatted like this.

```css
    <link rel="stylesheet" href="name.css" />
```

```js
    <script src="name.js"></script>
```

After you've created your app, copy/paste the _compile.php_ into your project's directory. Then update the config variables at the top of the script. 

```php
    <?php
        $app = "index.html";
        $js = ["app.js"];
        $css = ["style.css"];
        $file = "index.embed.html";
    ?>
```

The __$app__ is the main HTML file that your want to compile, the __$js__ and __$css__ are arrays of all the files you want to replace/minify in your HTML, and the __$file__ is the filename of the export.

Once you've updated all of those variables, just open your terminal and run __php compile.php__ and you're done!