All of our sites share a common theme. This theme was created as a fork of a
theme called "The Bootstrap" by Konstantin Oberland. That theme is no longer
actively maintained, so feel free to make any changes you want to any of the
files in this repo.

We have two copies of this theme checked out, one under
`.../wp-content/themes/exploreveg` and one at
`.../wp-content/themes/exploreveg-test`.

They both point to the same repo, but the test copy is used by our test site
(test.exploreveg.org). This allows you to work on changes to theme without
breaking our live sites. Once your changes are complete, you should check them
in, push them, and then pull them in the non-test directory. Note that the
test copy of the theme has a modified copy of `style.css` which should never
be committed. This file simply contains the theme name, and we want to see a
different name for the test copy of the theme.

## Bootswatch

We use bootswatch to customize Bootstrap. We have a forked copy of the
[bootswatch repo](https://github.com/thomaspark/bootswatch) which contains our
customized exploreveg Bootstrap 3 theme. This is managed as a submodule in the
WP theme repo. You will often need to change the bootswatch files as well as
the WP theme files. Make sure to check in the bootswatch changes and push them
before commiting in the main repo.

The main files you will need to edit to change the bootswatch theme are:

* `bootswatch/exploreveg/bootswatch.less` - contains custom styles that are
  applied after base Bootstrap 3 styles.
* `bootswatch/exploreveg/variables.less` - a copy of the core BS3 variables
  file with our customizations. This is applied to base BS3 styles.

## Tools

The top level of the theme repo contains two shell scripts which are helpful
when working on the theme:

* `regen-theme.sh` - rebuilds the bootswatch theme
* `watch-and-rebuild.sh` - watches for changes to the bootswatch theme files

## Wordpress Caching

You'll want to clear the Wordpress cache after updating the theme in order to
see your changes. Just use the "Purge All Caches" option in the admin menu.
