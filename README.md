# flatcomments

- Receive (blog) comments via AJAX and save them inside JSON-files.
- Display these comments via AJAX.

## Why another commenting-tool?

I've been looking at dozens of commenting tools and none had everything that I was looking for:

- being lightweight
- saving data as JSON inside flat files
- indipendent from a CMS or framework
- saving comments via AJAX
- loading comments via AJAX
- plain JS, no jQuery
- trying to reduce spam via
    - a blacklist
    - a look at the number of links inside a comment (max. 2)
    - closing a comment section for new entries after 90 days

## Installation

Just download the folder and unzip it to the www-directory of your webserver.
Everything you need to know is inside the `index.php`. You can alter all the code there.
The only thing that's really necessary is to place the article/page ID somewhere,
e.g.: `<span id="article-id" data-id="1"></span>`.
This is needed so **flatcomments** knows in which JSON-file to save the comments.  

The params you can send are:

- `$articleId` - An ID of the article/page where you want to display the comments.
    **flatcomments** will name the JSON-file(s) after this.
- `$userName` - The name of the person who wrote the comment.
- `$userEmailAddress` - The email address of the person who wrote the comment.
- `$comment` - The comment. Who would have thought?

## Work in progress

- [ ] Add better error handling/output/logging
- [ ] Add options (path where files will be saved, max number of postings, etc.)

## Maybe someday if needed

- Add paging
- Add email notification

Inspired by [KirbyComments](https://github.com/Addpixel/KirbyComments).  
Using [Bulma](https://github.com/jgthms/bulma) and [Comment Blacklist for WordPress](https://github.com/splorp/wordpress-comment-blacklist).
