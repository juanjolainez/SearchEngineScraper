# SearchEngineScraper
Simple Search Engine Scraper with tests


The project will present to the user with a screen where it can add search
keywords in the first text field. 
On the second input, the user needs to introduce the content to search 
in the result. It will only check the link. 

Each of the search keywords will trigger a Google or Yahoo search
(the user can choose what provider to use), it will 
pick the results and filter by the keyword specified in the second input. 

The search will be async using AJAX (from the front-end to the backend) and 
a JSON API. 
It is limited to the first 100 results, meaning that we need to do 100 
Google/Yahoo! searches, that will be done in parallel to make it faster. 
Also it has a layer of cache to prevent from doing the same searches 
more than one time in a short period of time.
It will also prevent Google to block the service

It is needed to have memcached installed and running on localhost and to 
run it, the only thing needed is to run the command 

```
php -S localhost:8000
```

To run the php tests go to ./tests/phpunit and run 

```
phpunit
```

Images of the site can be found here:

![alt text](https://github.com/juanjolainez/SearchEngineScraper/public/images/search.png "Search Page")
![alt text](https://github.com/juanjolainez/SearchEngineScraper/public/images/results1.png "Results")
![alt text](https://github.com/juanjolainez/SearchEngineScraper/public/images/results2.png "Results")
