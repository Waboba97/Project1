# Project1
Project 1 Car Valuation

PROJECT INSTRUCTIONS AND GOAL

For this group project, we were tasked with similulating a car validation mini system. We approached this by splitting different tasks into their own php files, 
allowing for clean and effective code rather than having it all merged into one or two files. 

SQL TABLES

Our first priority was to set up the three sql tables that we would be using. Those were cars, cars_owners, and users_cars. Cars was for setting up the brand, 
make, model, year, and price of the selectable cars. Cars_owners was for the user side, looking at collecting users' name, email, and account password. Finally, 
the users_cars table was to connect the other two tables together. One of the design choices that we made that differed from the project instructions was adding year 
into the users_cars table rather than in the cars table. Originally, we had it in the cars table, but we were struggling with pulling the data from the cars table, 
and it worked much better when it was changed to be apart of the users_cars table. Also, we assumed that in order to make the price more accurate to an actual car 
validation system, we added the variables mileage and quality to help with the price calculations to create extra difference based on qualities of the car. 
In the cars table, we had a base price for each of the cars, and then we used a formula that we created in order to decease the value of the cars from previous years 
based on mileage, year, and quality.

* Explaining formula

PHP FILES

For the php side of the project, we had a different php file for the many aspects of the project. These php files ranged from the car output and selection, changing 
the password either manually or by clicking the forgot password button, the config file, the dblogin file, the header and footer, the home (index) page, user logout 
when the button was pressed, the mysql_connect file, adding users to the database (regPulling), and returning the pulling from the registration form. Each of these 
php files did its respective job, and we approached these by pulling information from the sql tables that we created, specially with the car selection, password 
changing, and registration pulling (or login). In terms of challenges, we struggled with the registration and pulling the data from it. Once we got the 
registration.html file working properly, we had issues with the returningUser.html file, leading us to further issues. We have those fixed now, but that was the area 
that gave us the most issue for the coding side.

* What requirements we did for this

HTML & CSS FILES

For this project, we had two HTML files and one CSS file. The two HTML files related to the user registration. We named these Registration.html and ReturningUser.html.
The purpose of Registration.html was for the form that users would fill out when selecting register on the sidebar or vehicle appraisal when first loading up the site.
It would ask the users for the name, email, and password in order to set up an account for them and then their account would be added to the database, saying that they
didn't already have an account. ReturningUser.html was for users that already had an account set up, allowing them to put in their email and password to login in. 
Also, we originally had the header and footer be split into an HTML file and a PHP file, but we decided on going with the all-in-one style for both of them, leaving 
just header.php and footer.php. Lastly, the CSS file was for making all the pages look the same and giving a theme to the whole system. Overall, we felt that we only
needed HTML for the forms, using PHP for the rest of it.

BUGS AND TESTING

* The name does allow entries other than letters, but there were larger concerns to correct, so if there was more time we could have added a regex to ensure only valid names are allowed.
* For testing, we tried several different possible ways that invalid entries could be made. For example entering different passwords, negative mileage, too short of passwords etc...
