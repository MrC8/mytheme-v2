A simple responsive template for wordpress. 
=================================

### Code your site in local with sass and automatic deploy files on server

Base on http://underscores.me/, it include gulp and sass. It also include Bootstrap 4, FontAwesome 4.6.3 and a slide from left responsive menu.

With this template you can code your style with sass in the local folder "src". A task create two local css files, one style.css which is a classic css file and a style.min.css file that is deploy on the server by vinyl-ftp. Only style.min.css is used by the theme. 

So you can code your site with sass in local and see in live on the server.

You just have to put your FTP param in the local gulpfile.js

### Uses

* [Underscore.me starter theme](http://underscores.me/),
* [Bootstrap v4](https://v4-alpha.getbootstrap.com/),
* [FontAwesome 4.6.3](https://fortawesome.github.io/Font-Awesome/),
* [Responsive off canvas menu by David Bushell] (https://github.com/dbushell/Responsive-Off-Canvas-Menu),
* [gulp](http://gulpjs.com/)

### Includes

* Distinct **src** and **css** folders
* Gulp Dependencies:

	```shell
	gulp
	gulp-sass
	gulp-csscomb
	gulp-cssbeautify
	gulp-autoprefixer
	gulp-rename
	gulp-csso
	gulp-cssimport
	gulp-watch
	gulp-livereload
	vinyl-ftp
	gulp-notify
	gulp-uglify
	gulp-concat
	```
### How to use

* Install node.js
* In terminal tape "cd /mypath-to-my-local-folder"
* Then tape npm install

1. Install [node.js](http://nodejs.org/)
2. In **terminal** install Gulp dependencies in your local folder

	```shell
	cd /my_local_folder/website
	npm install
	```

3. Edit the gulpfile.js and change the FTP access to your server

4. Launch the default tasks

	```shell
	gulp
	```
5. Launch the tasks to compile all js file in gulpfile.js

	```shell
	gulp scripts
	```	

6. Code your scss and gulp will minify and create two files that will be deploy on server. Refresh your brother and that's good :)
