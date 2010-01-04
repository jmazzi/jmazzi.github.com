--- 
layout: post
title: Half-Life 2 in game video recording
---
Here is how I made the [physics bug video](/wp-content/uploads/posts/half-life_2_in_game_video_recording/physics_bug.zip) posted on [Steam Forums](http://steampowered.com/forums/):

To start recored a in game, you run the following command in the console (the ~ key brings up console):

`startmovie nameofmovie`

Hit ESC to exit out of the console. When you are ready to stop recording, bring the console up again and type:

`endmovie`

You will have a bunch of files in:
<cite>
C:\Program Files\Valve\Steam\SteamApps\USERNAME\half-life 2\hl2
</cite>

They will be called nameofmovie###.tga as well as a .wav file. Where ### is a number. Take all those files and copy them into a new folder. You will then need to compile them into a movie. You can use this utility [tga2avi.zip](/wp-content/uploads/posts/half-life_2_in_game_video_recording/tga2avi.zip). You run it in a dos shell. To do this, goto Start->Run-> Type in cmd and hit \[ENTER\]. Cd to the directory you downloaded and extracted tga2avi to. 

`usage: tga2avi outfile framerate pattern start end step`
`c:\ tga2avi nameofmovie.avi 20 nameofmovie000.tga nameofmovie100.tga 1`

This will compile 0 - 100 of the movie. You will need to start with 0 through whatever is the greatest number generated (depends on the length of the movie).

Next, get a copy of [nandub](http://ndub.sourceforge.net/). 

One installed, run it and go to File->Open Video file and select the avi you made. Then goto Audio->Wav Audio and open the wav file. Then go to File->Save as avi(F7). Thats it! Let me know how it works out for you!
