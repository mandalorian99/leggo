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
<p>

</p>
