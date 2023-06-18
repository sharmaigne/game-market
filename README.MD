# E&S Game Market Admin Version
*by: Tyrael Lada and Sharmaigne Mabano*

## Description
Admin-side view of a Game Market website designed to implement queries for MySQL using PHP. Allows for searching, inserting, editing, and deleting data.

This project was made in partial fulfillment to the course requirements of CMSC 126 in UP Mindanao, submitted to Asst. Prof. Vicente B. Calag in June 2023.

## Code Structure
The codebase follows a modular and organized structure to enhance maintainability and readability. Below is an overview of the main files and their functions:

* `index.php`: Entry point of the admin version, integrates the other components.

* `config.php`: Configuration settings - database credentials and connection initialization.

* `functions.php`: Defines functions used in other pages such as insertGame() and buyGame().

* `navbar.php`: Navigation bar and search functionality

* `autocomplete.php`: inserted in search bars to add a datalist of game names with game IDs. used in `delete.php` and `update.php`.

* `carousel.php`: Implements the banner hero carousel through JS and fetching the images of popular games from the database.

* `gallery.php`: Handles the game gallery. 

* `filters.php`: Handles the filters, connected to `gallery.php`.

* `popup.php`: Modals that expand to show detail of clicked games. Handles inserting, updating, and delete.

* `assets/`: Directory for CSS, JS, and image files.

##### Admin Side
* `insert.php`

* `update.php`

* `delete.php`

##### User Side
* `user.php`: version of `index.php` for users. Does not have access to admin side files.
* `library.php`: only showcases owned games

