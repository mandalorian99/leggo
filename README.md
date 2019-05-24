# leggo
A MVC based framework written in php

Table of content
<ul>
  <li>About Leggo</li>
  <li>Installing Leggo</li>
  <li>Architecture of leggo framework</li>
  <li>Working of leggo</li>
  <li></li>
  <li></li>
  <li></li>
</ul>

<h2>About Leggo</h2>
<p>
Leggo is a lite MVC based framework which is written in PHP.It is comes with a CLI client to faciliate the rapid development. It is for developers who want to customize the code without worring about what undergoing the hood. Leggo provide you a simple directory hierarchy which you can work with easily. 
Unlike another heavy weight framework like Laravel, symphony, cakePHP there are not lot of files included in a a single script. A developers can easily figure out which framework file is used by the current scipt/code.The main advantage of this is customization. Now when developers know what going in background they can easily customize the code according to them self. By default a data abstraction layer is provided to intract with database and handle all the sql transactions dynamically. If a developers want to integrate ORM they can integrate ORM of there choice. 
Leggo uses the concept of template, we can define a template for particular route in templates directory. To access the template we only have to provide a $template_name variable with the the name of template .Currently it did not uses any template engine . But in later version of leggo developers can eaisly integrate template engine of there choice. 
Leggo is a pure MVC based framework in which all the data is handle by its views . It provide the power to develop a powerfull, scalable yet secure webapp without hassling with logic part. It facilitate its user to integrate ORM(object relational mapper ) like propel , doctrine etc  and template engines of there choice. It did not force user to use any particular 

</p>
<h2>Installing Leggo</h2>
<p>You can download leggo to your machine by two ways</p>

<h3>Install from github</h3>
<p>
 To install run following command into your git bash shell<br/><br/>
  <code><b> $ > git clone https://github.com/thecodestuff/leggo.git </b></code>
</p>
<h3>Install using package manager</h3>
<p>To install using composer run following command</p>
<code><b> $ > require install/leggo </b></code>

<h2>Architecture of leggo framework</h2>
<p>artictech image here</p>
<p>Leggo uses MVC design pattern under the hood.MVC stand for model view controller. In a typical MVC framework all the logic is handle by the controller, database interaction is handled by the its respective model and all the front-end code is stored in its respective template which is fetched by its respective view.</p>

<h2>Working of leggo</h2>
<p>
  In leggo all start with defining a web route in <em>vendor/app/route/web.php</em>. our <em>.htaccess</em> is configured in a such a way that every request from the client is route to the <b>index.php</b> file in root directory. Index file call the <bweb.php</b> in which all web route are written.Framework checks weather a web route/url is valid or not. 
If request is not valid a error message is shown to the user else controller is evoked by the leggo. Once controller is evoked its view and model are also evoked. View check for the template mention in <em>$template_name variable</em> in view class in <em>leggo/template</em> directory. 
</p>

<h2>Directory Hierarchy of leggo</h2>
<img src="screenshots/dh.PNG" />

<h2>Defining your web route </h2>
<p> 
 A web is a URL which evokes a particuallar controller .
  To define a web route navigate to <em><b> /vendor/route/web.php </b></em> file
  <br/>
  
  ```php
  Route::get('helloworld/' , 'HelloWorldController@index') ;
```
Route::get function accept to parameter .First parameter is the name of your route and the second parameter is the name of controller and the name of function.
</p>

<h2>Creating a controller for you web route</h2>
<p>
Leggo comes with its CLI tool, using this you can create controller file for your  route. 
To create a controller file use below command. 

```php
$ > php console make::controller HelloWorldController
```
navigate to your <em>/vendor/app/controllers</em> directory you will find that your controller created with some code already added for you to get start with .

Your typicall controller file looks like this 

```php
<?php 
class HelloWorldController extends controller{
	public $view  ;
	/**
	 * evoke repective view for this controller and uri
	 */
	public function index(){
		# initilizing view to work with view class
		$this->view = new HelloWorldView ;
		$this->view->output() ;

	}
}
?>
```
Here HelloWorldController class extends to base controller class. Base controller hava a function name view() which evokes the view of particullar route 
A typicall controller.php file look like this 

```php
<?php 
# This is a base controller 
# Its functionality can be accessed by other controllers 

class controller{
	public static function view($viewName ){
		require $_SERVER['DOCUMENT_ROOT'].'/live tracking/vendor/app/view/'.$viewName.'.php' ;
		
	}

}

?>
```
Now you have created a controller for your web route , its time to create a view for your controller 
</p>

<h2>Creating a view</h2>
<p>
  A view contain a logic which enable user to transport the data fetch by the model from the database to the template. It work in hand with templates which are nothing more than HTML file. 
To create a view using CLI tool , hit below command in  your console.

```php
$ > php console make:view HelloWorldView
```
A view class template looks like this.

```php
<?php 
/**
 * Class : HelloWorldView
 * render data with template and output html content
 */

class HelloWorldView extends View{

 	public $template_name = 'helloWorld.blade' ;
 	public $data ;

 	public function __construct(){
 		// intilizing HelloWorldModel 
 		$this->model = new HelloWorldModel ; 		
 	}

 	public function output(){
 		$this->data = $this->model->get_test_data() ;
 		$this->render($this->template_name , $this->data) ;
 	}

}

?>
```
In <em><b>$template_name</b></em> we can mention the template which we want to use for the particular view class. You have to create a template name <em><b>helloWorld.blade.html</b></em> in a <em>/templates</em> directory in your root folder . 

<h2>Creating a model</h2>
<p>
A model is script which contains the logic to interact with the database table. A single model is associate with a single table in a database.Model uses the data abstraction layer to interact with the database.
To create a model in leggo using as CLI tool, you just need to hit below command.
  
 ```php
 $ > php console make:model HelloWorldModel  -t helloWorldTable
 ```
 A typical  a model look like this 
 
 ```php
 <?php 
/**
 * Class : HelloWorldModel 
 * This class fetch data from the HelloWorldTable from database
 */

class HelloWorldModel extends Model{
	private $table_name ='HelloWorldTable' ;

	public function get_test_data(){
		// intilizing model instance 
		parent::__construct() ;
    
		$sql = 'SELECT * FROM '.$this->table_name ;
    
		$this->db->query($sql) ;
		$row = $this->db->resultset() ;
    
		return $row ;
	}
}

?>
 ```

</p>
</p>
