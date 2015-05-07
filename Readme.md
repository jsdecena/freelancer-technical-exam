##HOW TO USE

- Fork this repo and clone to your local machine
- Go to your project folder
- Download [composer](https://getcomposer.org/download)
- Run `php composer.phar install` on your terminal or cmd prompt (windows) and wait for the vendors to be downloaded
- Create your database and name it "freelancer"
- Modify the database settings in /app/config/database.php -- default "mysql"
- Run `php artisan migrate --seed`
- If you are having problem seeding the data, unzip the usernames.zip in the root project and import it into your created db.
- Add .htaccess in your public folder [.htaccess](http://laravel.com/docs/4.2/installation#pretty-urls)
- Run `php artisan serve`
- Goto http://localhost:8000