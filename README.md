#Php Mini Controller/View Framework
A mini php framework for routing by turning the name of controllers to a seo friendly url.
The project is composed with two parts, Controllers and Views, the views are based on the [Laravel's Blade](https://laravel.com/docs/5.7/blade) template engine.

##Usage
Once the project is downloaded, you can start working directly by making your own controllers and views.
As example, let's say you want to make an about us page with the route /user/profile :
```php
class UserController extends AbstractController{
    public function profile(){
        $this->view('profile');
    }
}
```
This function will search for the view named profile.blade.php in the views folder and render the page.

You can also pass parameters to the url, exemple :
/user/profile/john
```php
class UserController extends AbstractController{
    public function profile($name){
        $this->view('profile', ['name' => $name]);
    }
}
```
If you are familiar with the blade engine, this code will pass the parameter name to the view.
Exemple of how to show the data:
```php
<html>
    <head></head>
    <body>
        <h1>Hello {{ $name }}</h1>
    </body>
</html>
```
You can read more about the blade template in the laravel's [documentation](https://laravel.com/docs/5.7/blade).