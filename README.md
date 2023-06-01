# XSS-and-CSRF-Assignment
## Files Added here are:
1. database.php: connects to sql database and starts the session 
2. index.php:calls the database and have user signup details by inserting data to the database
3. student_output.php: prints out student details output
7. login.php : checks user if its in database to login to the system 
5. student.php:contains student form to fill up for details and has the authorization layers for user such as checking if users is authenticated before accessing student page 
6.javascript.js: validates user input.
 
 *For Implementing CSP and same origin policy there are certain policies set in this web application , CSP are implemented at the header instead of inside meta data
 * For XSS the website implemented to encode special characters and to avoid scrips to be treated as code in the browser but rather they will be presented as encoded text in browser
 * For CSRF token is used to prevent CSRF attacks 
 
