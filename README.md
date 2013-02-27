## Laravel 4 master.blade.php (with view composer & unit tests)

Uses HTML5BoilerPlate (modified to remove IE classes) and Twitter Bootstrap's base HTML, but you'll have to add and organize JS & CSS as you desire.
The purpose of this is create a solid, well-tested view composer and master.blade.php for Laravel projects. 


#### Features

- Allows you to easily set your page title, meta description, meta robots, & custom body classes for any given view
- Automatically sets the HTML language attribute
- Automatically sets the HTML language direction attribute based on the current  language (e.g. `ltr` for English, Spanish, etc.; `rtl` for Arabic, Hebrew, etc)
- Automatically adds body classes for:
  - the two-letter, ISO 639-1 language code (e.g. en, es)
	- the locale (e.g. en-us, es-mx)
	- the homepage ('home')
- Provides a solid HTML5BP base for your master template (You can alter this HTML easily if you prefer to use Zurb Foundation instead of Bootstrap.)


#### How to install

1. Save master.blade.php to `app/views/layouts/master.blade.php`
2. Save MasterComposer.php to `app/composers/MasterComposer.php` (create the 'composers' directory), add `"app/composers",` to your composer.json's autoload block, and then run `composer dump-autoload`.
3. Save MasterComposerTest.php to `app/tests/viewcomposers/MasterComposerTest.php` (create the 'viewcomposers' directory).
4. Add `View::composer('layouts.master', 'MasterComposer');` somewhere within your app/routes.php so that Laravel will use the view composer whenever the master template is used.
5. Update "Site Name" (in the page title), "http://www.domain.com" (within the canonical url), "Company Name" (in the copyright notice) with your own names on the master.blade.php template.
6. Add a favicon.ico to your web root (16px x 16px)
7. Add all touch icons to your image directory and update the paths to them on the master.blade.php template.
8. Download JQuery and update the path to your local fallback copy of JQuery.
9. Add all CSS or JS assets that you need and add their link paths to master.blade.php (e.g. Bootstrap CSS & JS, HTML5Shiv.js or modernizr, and add you app.css & app.js)
10. Add your analytics JS snippet.

#### How to use


- Set a custom body classes:  

	`return View::make('hello')->with('body_class', 'aaa');`  

	or set multiple body classes:

	`return View::make('hello')->with('body_class', ['aaa', 'bbb']);`
	
- Set a custom page title:  

	`return View::make('hello')->with('page_title', 'An Example Page Title');`  

	 and your page title will be added to your site name with a pipe separator:  

	 `An Example Page Title | My Awesome Site`  

	 If you don't set the page title, your site name will be used:  

	 `My Awesome Site`
	 
- Set a meta description:  

	`return View::make('hello')->with('meta_description', 'This is an example meta description.');` 

- Set meta robots to not index certain pages in search engines (this defaults to 'index,follow' unless you override it here):

	`return View::make('hello')->with('meta_robots', 'noindex,nofollow');`

Because all items that Laravel passes to a view are actually elements on the `$view[]` array (e.g. `$view['page_title']`, `$view['meta_description']`), you should be able to easily store this content in your database, if needed, and easily pass this data to your master template. Just remember to use preditable column names in your database--e.g. `page_title` and `meta_description`.

#### Contribute

- Know of any RTL (right to left) languages that I missed? Please let me know.
I currently have:  
`'ar', 'dv', 'fa', 'ha', 'he', 'ps', 'ur', 'yi'`

#### Security note

This is safe against XSS attacks, so rest assured. Laravel 4 escapes all data output using its blade echo tags `{{ $foo }}` and uses htmlentities's ENT_QUOTES parameter to escape both double and single quotes. Consequently, this is safe against XSS attacks even if your page title and meta description are user-provided data retrieved from a database.
