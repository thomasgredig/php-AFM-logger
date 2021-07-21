# php-AFM-logger

**Purpose:** Simple time logging script for multi-user atomic force microscope (AFM). This tool can be installed to record the total amount of instrument usage, sample logging, and cantilever tip management.

**Requirements:** MySQL database, and PHP webserver.


## Install

Create a `db.php` file from the template `db-template.php` by entering the MySQL database information.

## Language support

For language support, we use gettext, so the [extension](https://lingohub.com/blog/2013/07/php-internationalization-with-gettext-tutorial) `gettext` must be enabled. You can find the `php.ini` file using `locate php.ini` with the terminal. Restart with `sudo apachectl restart`.


## To Do

Add nonces for added security.
