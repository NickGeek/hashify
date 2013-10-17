#ify (Hashify)
=======

\#ify is a way of finding links that people are talking about. Search engines are good for finding information relating to a string of words that articles have included in them. #ify is for finding articles that people are talking about on the topic. Instead of any website that uses the word "iPhone" in it; we look for what people are linking to with the hashtag "#iPhone". This means you see the articles that people are talking about.

###How to setup hashify
Before you can use hashify you will need to get API keys from Google and Facebook. You can do this from their developer websites. You will then need to change the $url variables (located in search.php) that contain "https://www.googleapis.com/plus/v1/activities?query=${hashtag}&maxResults=20&orderBy=best&key=XXXXXXXXXXXXXXXXXXXXX" and "https://graph.facebook.com/search?q=%23${hashtag}&type=post&locale=en_US&access_token=XXXXXXXXXXXXXXXX|XXXXXXXXXXXXXXXXXXXXX" and put your keys in them.

###Can I see a live demo?
Sure! Go to http://hashify.tk (currently running v0.1.4) to see this in action.

###Changelog
v0.1.4
* Shows the alpha spelling of #ify in index.html

v0.1.3
* Changed license to MIT
* Removed some unused code
* Changed some wording in index.html

v0.1.2
* Removed an unused variable in search.php

v0.1.1

* Cleaned up README.md
* Updated index.html to link to the GitHub page

v0.1

* First commit! Hello GitHub!

###To Do:
These are some features that we want to add. Feel free to help on these.

* Twitter support
* Quality control
