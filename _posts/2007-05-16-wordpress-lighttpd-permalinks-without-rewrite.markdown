--- 
layout: post
title: Wordpress - Lighttpd - Permalinks - Without rewrite
---
Ok, I setup lighttpd on my machine and found out lighttpd can't handle some mod_rewrite directives (used with permalinks). Specifically, sending a request to index.php if a file couldn't be found. Here is an easy work around. First, you need to make sure your current theme has a 404 page. Goto Presentation->Theme Editor and see if you have a template called "404 template". If you don't, just copy wp-content/themes/default/404.php to your theme directory:

cp wp-content/themes/default/404.php wp-content/themes/YOUR_THEME

Then edit the 404 template file and add: 
	
`	< ?php header("HTTP/1.1 404 Not Found"); ?>
`
at the top of the script. This is so pages that are not found actually send 404 response headers. This is important for search engine bots like google.


After that, edit lighttpd. You just need this line in your virtual host:

`	server.error-handler-404 = "/index.php"`

Thats it. Let me know if you have any issues with this.
