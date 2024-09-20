### date 19/9/2024

Hi this is just a log of the things i did today and some issues that came along with it. today i tried to add image file handling to the backend controller inventory.patch, after using the same logic that was used in the store function. i came across an error that i had to debug when calling this function through a web route via an ajax function. The error was present because i didnt specift the ajax function to not process data that was being passed to the function. to be specific these are the lines that were needed to be added to the ajax function.

``` 
    processData: false, // Important for sending FormData
    contentType: false, // Important for sending FormData
```

processData determines whether the data pass to the data parameter is to be processed, this means by default withouth processData parameter declared it will process the data into string format.

### date 20/9/2024

for today's update on the software, i wasnt sure what else to implement on this app as i was running out of ideas. I decided finally to implement a basic search engine for looking up certain items in the database. ill be using a mixture of ajax query and vanilla javascript with the assistance of a function from the backend(inventoryController) in order to achieve this functionality.

now that ive finally impleneted the inventory search, i ended up just categorizing the search query as a filter in my script. i gave the search query a default value of an empty string "", and in the backend controller, i simply took the request and retrieved its filter key of the search query and used that value to look for item by name.