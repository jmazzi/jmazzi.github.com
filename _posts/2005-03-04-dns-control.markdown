--- 
layout: post
title: DNS Control
---
DNS Control is a web based dns management tool for [BIND 9](http://www.isc.org/index.pl?/sw/bind/) name server. You can completely manage a domain from a web interface. It supports adding/modifying/removing A, MX, and CNAME records. All information is stored in a [MySQL](http://mysql.com) database. The interface(frontend) and command scripts(backend) are written completely in [PHP](http://php.net)(smarty for the templates). There is a separate interface for admins and users. The admin interface is for adding/removing/updating passwords for domains in the system. The user interface is for managing a domain.


Changes:

*Session Security Fix
*Updated to Smarty-2.6.9
*Added Search Feature to backend
*WWW A record created by default now

Upgrade Instructions:

*Just upload the new files*.

Here are a few screenshots:

Admin:
[List Domains](/assets/dnscontrol/admindomains.png)
[Add Domain](/assets/dnscontrol/adminadddomain.png)


User:
[Login](/assets/dnscontrol/userlogin.png)
[Show Records](/assets/dnscontrol/userrecords.png)
[List Record](/assets/dnscontrol/usereditrecord.png)
[Add Record](/assets/dnscontrol/useraddrecord.png)

Download Below:

[dnscontrol-1.0.2.tar.gz](/assets/dnscontrol/releases/dnscontrol-1.0.2.tar.gz)

Bug Tracker:

[http://r00tshell.com/defects/index.php?tasks=all&project=1](/defects/index.php?tasks=all&project=1)
<!--break-->
