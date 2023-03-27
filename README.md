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

* The formulas were relatively straightforward. Each additional option added onto the car was a steady $75. So if the user added 2 additional packages, he would pay $150 on top of whatever price was offered after markups and markdowns. The quality formulas had less return on money as the car deteriorated, with every bump down in quality reducing its price by 5%. Mileage had the same effect, where after 10,000 miles, the cars price would be reduced by 5%, and after 40,000, the price would reduce 10%, finally over 70,000 miles reduced price 15%. The final price of the car would then be distributed onto either dealer owned, certified pre owned, privately owned, and trade in value. Private owner would sell at its evaluated price, dealer would boost 15%, CPO would boost 10%, and trade in would drop to 80% value. Finally we added the price depreciation per year, which is a steady -$750 per year. All of these specifications got us to our final prices we could display to the user.

PHP FILES

For the php side of the project, we had a different php file for the many aspects of the project. These php files ranged from the car output and selection, changing 
the password either manually or by clicking the forgot password button, the config file, the dblogin file, the header and footer, the home (index) page, user logout 
when the button was pressed, the mysql_connect file, adding users to the database (regPulling), and returning the pulling from the registration form. Each of these 
php files did its respective job, and we approached these by pulling information from the sql tables that we created, specially with the car selection, password 
changing, and registration pulling (or login). In terms of challenges, we struggled with the registration and pulling the data from it. Once we got the 
registration.html file working properly, we had issues with the returningUser.html file, leading us to further issues. We have those fixed now, but that was the area 
that gave us the most issue for the coding side.

* We believe we met all the requirements that were in the guidelines, we added a history section, an appraisal with all the proper calculations, dropdown boxes and checkboxes for different types of cars, and the required 20 different cars. We have all tables including an extra one for the history. If given more time there would be an option to select previous cars and display their prices as well. 

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
