# TranslationApi

#Info
Demo Project  

Original project / assignment description located in root directory under the name: PHP-Back-end.pdf

Built using 
- Laravel 8
- PHP 8.1

#Installation:

To get started, create a MySQL database on localhost matching the .env settings shown below (the .env file would not normally be included in the git repo but for ease of setup and demonstration purposes has been included)


DB_DATABASE=translator  
DB_USERNAME=user_translator   
DB_PASSWORD=GozEg6liBAPa

Navigate to a suitable directory and run the following commands:

- git clone https://github.com/JPCrounse/TranslationApi.git
- cd ./TranslationApi
- composer install 
- php artisan key:gen
- php artisan migrate
- php artisan db:seed


#Testing:

To create a virtual host for testing on localhost run:
- php artisan serve
Then the included TranslationApi.postman_collection.json in the root directory can be imported into postman for testing.


#Current status: WIP
TODO:
- Split translation endpoint into detection and non-detection version for cleaner controller code
- Add basic Vue frontend for even easier testing
- Modify ApiController and corresponding routes to ResourceController / Routes structure
- Implement locale option in API endpoints?
- Upgrade to Laravel 9 (Oversight during initial setup)
- Go through and handle remaining //TODO comments in code 
- Clarify definition and scope of text parsing 
  - What defines a line
  - How to handle multiple line ending chars e.g. !?!
  - How to handle multiple spaces when splitting lines in to words
  - Is translation output expected to preserve punctuation such as "," "?" "!" etc.
