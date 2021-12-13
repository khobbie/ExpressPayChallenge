# ExpressPay Technical Challenge

* Clone project `git clone  https://github.com/khobbie/ExpressPayChallenge.git`
* Open project using `visual code` or `Sublime`
* Run `composer install` (Make sure you composer installed already)
* Add database connection to `env` file DB name `excel_sheet_count`
* Run `php artisan serve`
* In your postman, POST with with body as `form-data` key => `color_sheet` & value => `csv file`
* Endpoint URL should be `http://127.0.0.1:8000/api/upload`
*  
* Postman Collection `https://documenter.getpostman.com/view/1937580/UVR5s9RP`