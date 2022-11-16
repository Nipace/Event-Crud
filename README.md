### Environment

- **[Laravel v9](https://laravel.com/docs/9.x)**
- **[phpv8.1] (https://www.php.net/releases/8.1/en.php)**
- **[Composer v2](https://getcomposer.org/)**
- **[Mysql v8](https://www.mysql.com/)**
- **[Node v 16](https://nodejs.org/en/)**

### Installation Steps

- **Clone Repository** ```git clone <GIT_URL>```
- **Copy .env.example as .env**
- **Configure database**
- **Install composer dependencies** ```composer install```
- **Generate Key** ```php artisan key:generate```
- **Run migration** ```php artisan migrate``` 
- **Install Npm** ```npm install```
- **Generate Assets** ```npm run dev``` **In one terminal**
- **Server the Project** ```php artisan serve``` **In another terminal**

**NOTE: Run ```npm run dev``` & ```php artisan serve``` simutaneously to keep on complining vite else gives error for vite mainfest**


### Description And Project Consist of
- **MVC Architecture**
- **Repositories as layer of abstraction**
- **Traits for both Controller and Repository for simple crud for code reusabilty**
- **Backend Validation**
- **Client Side Validation**
- **Unit Test for event lisiting and single event**

### Event Crud
- **Have a event listing page to visit go to ```\events``` or click on laravel event crud icon in center**
- **Consist of event creating by clciking on create button in events listing page which opens create form**
- **Consist of event edit functionality too**
- **Delete event using ajax**
- **Consist Filters in index page**
