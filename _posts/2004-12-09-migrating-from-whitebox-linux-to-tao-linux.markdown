--- 
layout: post
title: Migrating from Whitebox Linux to Tao Linux
---
Looks like the author has given us a link to an updated guide. Check out this link: [http://www.owlriver.com./tips/centos-31-ex-rhl-9](http://www.owlriver.com./tips/centos-31-ex-rhl-9)


Here is what i found:

# RH9 to TAO 1.0 Upgrade Instructions: http://mailman.taolinux.org/pipermail/tao-discuss/2004-April/000185.html:

Step by step upgrade from RH9 to TAO 1.0

(From a post by Russ Herrold)
0. Take a backup, especially of /etc/, /root/ /home/ and 
volatile parts in /var/


(I simply backed up all of /var/)

1. Make a note of the installed packages:
rpm -qa | sort > /root/pre-upgrade-manifest.txt

2. Remove any unused packages using the rpm -e method - 
note that all content on my hosts is packaged in rpm, and I 
almost NEVER use: rpm  --nodeps or --force variants

3. Being sure that no other rpm affecting process is 
running (yum counts here), rebuild the rpm database 'just in 

case'
rpm -vv --rebuilddb


4. Clean out 3-400  Meg of space below /var/cache/yum/
(if not possible, edit /etc/yum.conf to point at a 
properly sized partition to hold the updates).  

If, like me you used RH update to keep your machine up then you may have several kernels and selections for them in the boot up. I had LILO on this machine. When I did this upgrade it broke it. Yum added another kernel to the /etc/lilo.conf file and caused it to exceed the allowed limit. To prevent this, edit you /etc/lilo.conf and remove some of the old listings. I had to boot with an install disc, run linux rescue, edit the file and then do a /sbin/lilo -c . Afterwards I was able to boot.

Install yum from Duke

`rpm -Uvh --quiet http://linux.duke.edu/projects/yum/download/2.0/yum-2.0.6-1.noarch.rpm`
(I actually used an installer from http://pages.cpsc.ucalgary.ca/~erik/HOWTO/yum-installation-HOWTO.html)

`rpm --import http://dist.taolinux.org/tao-1.0-i386/dist/RPM-GPG-KEY-tao`

Remove existing update and dependencies.

`rpm -e rhn-applet-2.0.9-0.9.0.1`
`rpm -e up2date-gnome-3.1.23.2-1`
`rpm -e up2date-3.1.23.2-1`
`rpm -e firstboot-1.0.5-11`
`rpm -e up2date-3.1.23.2-1`

Create yum.conf in /etc with the following contents.
(The installer created one for it's mirror pointing to RH files so I used the below version, which is modified from a virgin TAO install)

#BEGIN FILE
>\[main\]
>cachedir=/var/cache/yum
>debuglevel=2
>logfile=/var/log/yum.log
>pkgpolicy=newest
>distroverpkg=tao-release
>tolerant=1
>exactarch=1

# Original, base distribution
>\[base\]
>name=Tao Linux 1.0-i386 - Base
>baseurl=http://dist.taolinux.org/tao-1.0-i386/dist
>gpgcheck=1

# Updates made from official SRPMs released for RHEL3 by RH, or Tao-specific
# updates and fixes
>\[updates\]
>name=Tao Linux 1.0 - i386 - Updates
>baseurl=http://dist.taolinux.org/tao-1.0-i386/updates
>gpgcheck=1
#END FILE

NOTE: This is an install on a i386 machine. You will need to point to the appropriate directories for your processor IE replace i386. These can be found at http://dist.taolinux.org/

# yum upgrade

It will take a while and you may have some issues to resolve if you missed any packages in the beginning. If you do it will not have to download the headers again so it will go a little faster. 

When it is finished retrieving all the packages it will display 
"Running test transaction:"

This will take a little while.

Then it will display 
"Test transaction complete, Success!"

Then it will set there for a while longer several minutes in my case.

Then you will see the processing of each package (814 for mine).

Don't know how long this part took because I went to sleep at this point.

Reboot and enjoy. (I am now after fixing LILO.)

If you removed any apps in the beginning, you can now reinstall them if needed. Of course You do not need to reinstall up2date as this is for RedHat only.

This is as close to a step by step I can provide at this point. As noted above, I did not follow these steps exactly, but wrote them in the order that I would follow if I had to repeat this process. The was performed on a Dell 4300 Poweredge with dual PII350 and with software raid (Some scum swiped the controller card before I got the machine).

Use these instructions at your own risk.

#Upgrade from older Red Hat versions?: http://mailman.taolinux.org/pipermail/tao-discuss/2004-March/000144.html:

I am sorry at the delay in responding; I was travelling, and 
have been wadeing through a lot of built up email.

As another has reported, a simple install is easier to upgrade 
than a complex one.  Something like this has worked for me:

0.	Take a backup, espectially of /etc/, /root/ /home/ and 
volatle parts in /var/

1.	Make a note of the installed packages:
	rpm -qa | sort > /root/pre-upgrade-manifest.txt

2.	Remove any unused packages using the rpm -e method - 
note that all content on my hosts is packaged in rpm, and I 
almost NEVER use: rpm  --nodeps or --force variants

3.	Being sure that no other rpm affecting process is 
running (yum counts here), rebuild the rpm database 'just in 
case'
	rpm -vv --rebuilddb
Repeat this process after each pass.

4.	Clean out 3-400  Meg of space below /var/cache/yum/
(if not possible, edit /etc/yum.conf to point at a 
properly sized partition to hold the updates).  Clean after 
each pass as appropiate

5. 	Point the /etc/yum.conf at an appropiate archive, and its
updates tree; note that is moving from a much older RHL
release, it is wise to go in 'point' steps -- RHL 7.3 to RHL 
8.0 to RHL 9.0, one at a time
	yum upgrade

6.	Crossing from RHL 7.3 to RHL 8 will require getting 
and configuring a new yum; ditto the step from RHL 8.0 to RHL 
9.0.  Use the recommended packages at the Duke yum prime site.

7.	Reboot between each update series, to get old glibc 
versions out of play, and to get a later kernel in place.  
Return to step 2 or 3, and repeat until you are at RHL 9.0

8.      Point the /etc/yum.conf at an appropiate Tao archive 
mirror, and its updates tree.  Stems 3, and 7 at the end of 
the process, of course.

9.	Adjustment of configuration files, and re-installation 
of packages removed at step 2 as appropiate.

10.	Report experiences to the mailing list.

ymmv -- remember step 0 is quite important.

-- Russ Herrold



**Some additional info you may need from doing the above:**


One thing the above doesn't mention is installing the tao specific RPMs like:

rpmdb-tao-1.3E.1-0.20031219
tao-logos-1.1.14.4-TL3
tao-artwork-1.0-TL1
tao-release-1.0-TL15

When you attempt to install them, it will tell you that they conflict with another package. Just remove the conflicting packages and proceed. It worked for me :)
