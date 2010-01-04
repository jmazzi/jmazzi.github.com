--- 
layout: post
title: Debian/Ubuntu SSH Key Compromise Lookup
---
I was messing around with merb the other day and wrote a quick [app](http://ssh.r00tshell.com/) to check to see if your ssh key has been compromised due to the vulnerability found in the openssl package on Debian/Ubuntu. All you due is search for your ssh key fingerprint. All you need to do is fire up a terminal/shell and type:
`ssh-keygen -l -f .ssh/id_rsa.pub # put the path to your ssh key`
It should come back with something like
`00:00:5b:35:76:4e:0b:24:01:a9:dc:bc:a5:b6:b6:b5`
Just search for that and it will let you know if your key is compromised. Link to app: [SSH Key Lookup](http://ssh.r00tshell.com/)
