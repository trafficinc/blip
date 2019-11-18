# Blip: A Flat-File, Simple, Blog Engine
Blip, is a really simple, no-database, flat-file blog engine<br /><br />

To Use:<br />
1.) Upload this "blog" folder to the root of your website.<br />
2.) Go into the helper.php file and update the SITEURL with your site url including the "blog" folder, so http/\/www/\/.yoursite.com/blog/ .<br />
3.) Change `file.htaccess` file to `.htaccess` <br />
4.) Add Blog posts to the "posts" folder as .txt files, see examples.<br />
<br />

Customization: to "template" the blog to make it look like the website, just take your current site, view source, copy and paste it into the HTML templates in src/Views/Layout.php (parent template) & src/Views/Blog/Listing.php (main blog page) and Post.php (blog post page) and use the functions that are already there, no special templating kowledge.<br />

Code is easily editable to create more features or change things.<br />

Potential issues: .htaccess file settings may need to be tweaked according to your Apache web server set-up, NGINX should work with some extra adjustments.<br /><br />

Tested on <strong>PHP 7.3 +</strong> but may work down to 7.x (haven't tested), <strong>Apache</strong> Web Server, should work on <strong>shared hosting</strong>, and is low resources.

> Inspiration for this project just came as a need to get a quick blog up on a website without setting up databases, and bloat. You are welcomed to contribute or fix bugs! Thanks
 
Blog Listing
![Alt text](/screenshots/screenshot1.PNG?raw=true "Blog Listing")

Blog Post
![Alt text](/screenshots/screenshot2.PNG?raw=true "Blog Post")
