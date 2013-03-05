## Laravel 4 Master Composer, Unit Tests, & master.blade.php

Uses HTML5 Boiler Plate (modified to remove IE classes) and Twitter Bootstrap's base HTML. Just add assets & asset handling as you desire.
The purpose of this is create a solid, well-tested view composer & master.blade.php for Laravel projects. 


### Features

- Allows you to easily pass the page title, meta description, meta robots, & custom body classes to your master template
- Automatically sets the HTML language attribute
- Automatically sets the HTML language direction attribute based on the current language (e.g. `ltr` for English, Spanish, etc.; `rtl` for Arabic, Hebrew, etc)
- Automatically adds body classes for:
  	- the two-letter, ISO 639-1 language code (e.g. en, es)
	- the locale (e.g. en-us, es-mx)
	- the homepage ('home')
- Provides a solid HTML5BP base for your master template

_Note: Laravel 4 Beta 4 currently returns an incorrect value for `Lang::get('app.language');` so the current locale is simply harded as `en-us`. This will be changed after Laravel 4 is fixed._

### How to Install

1. Save master.blade.php to `app/views/layouts/master.blade.php`
2. Save MasterComposer.php to `app/composers/MasterComposer.php` (create the 'composers' directory), add `"app/composers",` to your composer.json's autoload block, and then run `composer dump-autoload`.
3. Save MasterComposerTest.php to `app/tests/viewcomposers/MasterComposerTest.php` (create the 'viewcomposers' directory).
4. Add `View::composer('layouts.master', 'MasterComposer');` somewhere within your app/routes.php so that Laravel will call the view composer whenever the master template is used.
5. Add `$_SERVER['REQUEST_URI'] = '/';` to app/start/artisan.php to prevent an undefined variable error when phpunit functional tests are run using the command line.
6. Update "Site Name" (in the page title), "http://www.domain.com" (within the canonical url), "Company Name" (in the copyright notice) with your own names on the master.blade.php template.
7. Add a favicon.ico to your web root (16px x 16px)
8. Add all touch icons to your image directory and update the paths to them on the master.blade.php template.
9. Download JQuery and update the path to your local fallback copy of JQuery.
10. Add all CSS or JS assets that you need and add their link paths to master.blade.php (e.g. Bootstrap CSS & JS, HTML5Shiv.js or modernizr, and add you app.css & app.js)
11. Add your analytics JS snippet.

### How to Use

	
- Set a custom page title:  

	`return View::make('hello')->with('page_title', 'An Example Page Title');`  

	 and your page title will be added to your site name with a pipe separator:  

	 `An Example Page Title | My Awesome Site`  

	 If you don't set the page title, your site name will be used:  

	 `My Awesome Site`
	 
- Set a meta description:  

	`return View::make('hello')->with('meta_description', 'This is an example meta description.');` 

- Set meta robots not to index certain pages in search engines (the default is 'index,follow' if unspecified):

	`return View::make('hello')->with('meta_robots', 'noindex,nofollow');`

- Set a body classes:  

	`return View::make('hello')->with('body_class', 'aaa');`  

	or set multiple body classes:

	`return View::make('hello')->with('body_class', ['aaa', 'bbb']);`

Snake case variable names were chosen with the thought that this may ease passing data retrieved from the database (which Laravel's convention is to uses snake case column names such as page_title and meta_description) to the views. This may change later. Time will tell.

### Contribute

- Know of any RTL (right to left) languages that I missed? Please let me know. I currently have:  
`'ar', 'dv', 'fa', 'ha', 'he', 'ps', 'ur', 'yi'`

### Security Note

This is safe against XSS attacks, so rest assured. Laravel 4 escapes all data output using its blade echo tags `{{ $foo }}` and uses htmlentities's ENT_QUOTES parameter. Consequently, this is safe against XSS attacks even if your page title and meta description are user-provided data retrieved from a database.
