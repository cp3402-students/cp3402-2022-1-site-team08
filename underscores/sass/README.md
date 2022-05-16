To work with the SCSS, setup Node.js with Sass using the command `npm i -g sass`. Then make sure your terminal is pointed to the `/underscores` directory, then run `sass -w sass:.`. Saving files will compile the sass, so you can view the changes locally with Ctrl+F5 (hard reload).

So that you can view the changes locally while developing, use the `mklink` command to bind the `wp-content` and local repository together. Open command prompt and edit this line to match your structure: `mklink /J "C:/Bitnami/.../wp-content/themes/underscores" "C:/Users/You/Documents/.../theme/underscores"`
