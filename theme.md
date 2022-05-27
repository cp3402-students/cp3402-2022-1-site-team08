This project incorporates a starter theme called underscores. The theme provides a solid foundation to build, customise, and style towards the required preferences. Underscores is made up of many different files but for our project only certain file should typically be necessary to utilize.

**These files include:**

`footer.php` - Added widget to display some navigation, managed as a menu within WordPress under the name _"Custom Menu"_

`header.php` - Added widget to display social media accounts, managed as a menu within WordPress under the name _"Socials"_

`functions.php` - Added code to create widgets in the header and footer

The site uses Sass to style our theme. Incorporating Sass introduced another file structure into the themes project folder. Within Sass, separate components and concepts are moved to different files which should be intuitive. All Sass code is contained within the `sass/` folder and is compiled into the `style.css`. This can be done by installing the Sass compiler and running `sass -w sass:.` from within the `underscores/` directory.

**Relevant information about what features your theme has**

We added a custom menu to the footer. We also included widgets to header to allow for social media integration.

**Design decisions**

The design of the site is based on an early mock-up design. The base underscores theme contains little in the way of design structure, so some important mixins have been created.

`white-space()` - Can be used to add white space on the sides of the lowest level elements, implemented as padding

**Colours**

The site colour palette we employed was based off an early mock-up, which we then used coolors to find a matching [palette](https://coolors.co/palette/cfdbd5-e8eddf-f5cb5c-242423-333533) for. The colour combinations included are within the sass file `abstracts/variables/_colors.scss`.
