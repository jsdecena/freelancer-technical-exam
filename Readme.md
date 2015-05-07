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

####Note: This is not anymore the actual project I passed in freelancer.com. I have reviewed my past work and even it does the job, it is not an optimized work. This should be straightforward.

####Specification: 

- Write a function that, given an email address, will recommend the next available username based on the email address.
- Eg. juan@delacruz.com, recommeded username will be "juan".
- If juan is already taken, recommed a username with a number appended to it. -- juan1, juan2 etc.