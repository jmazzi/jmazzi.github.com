--- 
layout: post
title: Migrated to Jekyll
---
Most of my week was spent creating a custom layout and migrating to [Jekyll](http://github.com/mojombo/jekyll). It was actually a lot of fun, and I enjoyed every minute of it. The [Wordpress](http://wordpress.org) migrator that comes with jekyll got me started, but I ended up having to go in and make quite a few adjustments to the posts. I blame this mostly on Wordpress's WYSIWYG for claiming certain posts were in Markdown, when they were really stored as HTML in the database. It was interesting going through old posts to apply these fixes. After 6 years, you can find yourself forgetting you even wrote a particular blog post. 

The baisc layout of a Jekyll site looks like this:

    .
    |-- _config.yml
    |-- _layouts
    |   |-- default.html
    |   `-- post.html
    |-- _posts
    |   |-- 2005-06-22-new-dns-control-out.markdown
    |   `-- 2009-12-19-replaced-the-woot-tracker.markdown
    |-- _site
    `-- index.html

If you're interested in viewing the source code behind this site, have a [peek](http://github.com/jmazzi/jmazzi.github.com). 