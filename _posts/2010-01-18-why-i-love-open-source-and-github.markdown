---
layout: post
title: Why I Love Open Source and Github
---

A lot of the development work I do requires me to modify DNS entries to temporarly change where something resolves. For a while I just would edit my /etc/hosts file. This was ok for a while, but was kind of a pain. One day while making some changes to [Passenger Preference Pane](http://www.fngtps.com/passenger-preference-pane), I came across the OS X command **dscl**. The manual describes it as:
>**Directory Service command line utility**:
>
>dscl is a general-purpose utility for operating on Directory Service directory nodes.  Its
>commands allow one to create, read, and manage Directory Service data.  If invoked without any
>commands, dscl runs in an interactive mode, reading commands from standard input.  Interactive
>processing is terminated by the quit command.  Leading dashes ("-") are optional for all com-
>mands.

In other words, it allows you to add DNS entries without the need to modify your /etc/hosts file. The syntax isn't very straightforward and leaves a lot to be desired. My first instinct was to do a google search for a management utility. That's when I came across [Ghost](http://github.com/bjeanes/ghost). Ghost has very simple syntax:

{% highlight bash %}
$ ghost add mydevsite.local
  [Adding] mydevsite.local -> 127.0.0.1

$ ghost add staging-server.local 67.207.136.164
  [Adding] staging-server.local -> 67.207.136.164

$ ghost list
Listing 2 host(s):
  mydevsite.local      -> 127.0.0.1
  staging-server.local -> 67.207.136.164

$ ghost delete mydevsite.local
  [Deleting] mydevsite.local

$ ghost list
Listing 1 host(s):
  staging-server.local -> 67.207.136.164

$ ghost modify staging-server.local 64.233.167.99
  [Modifying] staging-server.local -> 64.233.167.99

$ ghost list
Listing 1 host(s):
  staging-server.local -> 64.233.167.99

$ ghost export > some_file

$ ghost empty
  [Emptying] Done.

$ ghost list
Listing 0 host(s):

$ ghost import some_file
  [Adding] staging-server.local -> 64.233.167.99

$ ghost list
Listing 1 host(s):
  staging-server.local -> 64.233.167.99
{% endhighlight %}

Perfect! This has been a utility I use at least once a week. The other day, I found myself needing to remove a bunch of DNS entries I added for testing purposes. There was no built in way to remove entries in bulk. Sure, I could just do a bash for loop and call it day, but that seemed selfish. So what did I do? I [forked it](http://github.com/jmazzi/ghost) on [github](http://github.com/), added the **delete_matching** method (with tests), and sent a pull request to [bjeanes](http://github.com/bjeanes). It was quickly accpeted, merged, and pushed to [gemcutter](http://gemcutter.org). It was almost too easy!

{% highlight bash %}
$ ghost delete_matching test
  [Deleting] test2.local
  [Deleting] test.local
{% endhighlight %}
