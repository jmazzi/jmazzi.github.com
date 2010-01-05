--- 
layout: post
title: DNS Control
permalink: /dns-control
---
DNS Control is a web based dns management tool for BIND 9 name server. You can completely manage a domain from a web interface. It supports adding/modifying/removing A, MX, and CNAME records. All information is stored in a MySQL database. The interface(frontend) and command scripts(backend) are written completely in PHP(smarty for the templates). There is a separate interface for admins and users. The admin interface is for adding/removing/updating passwords for domains in the system. The user interface is for managing a domain.

#Changes:

>1. Added PHP5 Support
>2. Session Security Fix
>3. Updated to Smarty-2.6.9
>4. Added Search Feature to backend
>5. WWW A record created by default now



#Upgrade Instructions:

*Just upload the new files.*

Here are a few screenshots:

##Admin:
[List Domains](/assets/dnscontrol/admindomains.png)

[Add Domain](/assets/dnscontrol/adminadddomain.png)

##User:
[Login](/assets/dnscontrol/userlogin.png)

[Show Records](/assets/dnscontrol/userrecords.png)

[List Record](/assets/dnscontrol/usereditrecord.png)

[Add Record](/assets/dnscontrol/useraddrecord.png)

**If you would like to see DNS Control’s development continue, please consider donating. It take’s a lot of time and effort to create software.**

[dnscontrol-1.0.3.tar.gz](/assets/dnscontrol/dnscontrol-1.0.3.tar.gz)

[Bug Tracker](http://r00tshell.lighthouseapp.com/projects/10528-dns-control/overview)

[Github](http://github.com/jmazzi/dns-control)