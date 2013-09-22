#ify (Hashify)
=======

\#ify is a way of finding links that people are talking about. Search engines are good for finding information relating to a string of words that articles have included in them. #ify is for finding articles that people are talking about on the topic. Instead of any website that uses the word "iPhone" in it; we look for what people are linking to with the hashtag "#iPhone". This means you see the articles that people are talking about.

###How to setup hashify
Before you can use hashify you will need to get API keys from Google and Facebook. You can do this from their developer websites. You will then need to change the $url variables (located in search.php) that contain "https://www.googleapis.com/plus/v1/activities?query=${hashtag}&maxResults=20&orderBy=best&key=XXXXXXXXXXXXXXXXXXXXX" and "https://graph.facebook.com/search?q=%23${hashtag}&type=post&locale=en_US&access_token=XXXXXXXXXXXXXXXX|XXXXXXXXXXXXXXXXXXXXX" and put your keys in them.

###Can I see a live demo?
Sure! Go to http://hashify.tk (running v0.1.1) or http://pi.nick.geek.nz/hashify (running whatever is the latest, stable or not).

###Changelog
v0.1.1

* Modified README.md
* Updated index.html to link to the GitHub page

v0.1

* First commit! Hello GitHub!