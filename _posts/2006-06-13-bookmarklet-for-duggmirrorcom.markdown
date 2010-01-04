--- 
layout: post
title: Bookmarklet for DuggMirror.com
---
Just drag the following link into your bookmarks bar:

<a href="javascript:var url = self.location.toString(); url = url.replace( 'http://', '' ); url = url.substring( url.indexOf( '/' ) ); var finalUrl = 'http://www.duggmirror.com' + url; self.location=finalUrl;">dugg</a>

Then just goto a digg article, click dugg, and it will take to you the cache version
