# Practice Log

*This is a simple web application - built with HTML, CSS, JavaScript, and PHP/MySQL - that allows users to create and login to a unique account where they can track time on a given task (such as practicing a musical instrument) and view a log of past sessions. This project is in partial fulfillment of the Code Louisville JavaScript course (September - November 2021).*

## Use

To see this app in action:

1. go to http://ec2-18-118-16-220.us-east-2.compute.amazonaws.com/
2. create an account
3. log and view your sessions

## JavaScript Features

- **Use fetch() to retrieve data from an external API.** I actually built my own api (php files in /api/).
- **Create a form and save the values (on click of Submit button) to an external file.** Values from account creation and session log pages are saved to an RDS MySQL database, hosted on AWS.
- **Create and use a function that accepts two or more parameters, calculates or determines a new value based on those inputs, and returns a new value** Most of the JS functions are anonymous event listener callbacks. The stopwatch time conversion takes place a stand alone function. While technically, most/all of these functions accept only one parameter, that parameter is an object that requires operation and parsing inside the function (i.e. an event).
- **Implement a regular expression to ensure sufficient password complexity.** Regex is absolute sorcery.
- **Calculate and display data based on an external factor.** The stopwatch functionality in /js/log_session.js is a good example of this. It sets the current time and displays the time since, formatted as HH:MM:SS. One cool bit of functionality in these  functions is the ability to pause the timer.

## Other features

- **Responsive design using multiple methods** This page is mobile first and is definitely made to be used primarily on a phone or tablet. That said, there are several responsive elements, mostly using media queries and flexbox. A particularly substantial difference between mobile and desktop presentation can be seen on the /log_history.php page.
- **Hosting on AWS EC2 and RDS instances** This one I am particularly proud of. This is my first site hosted on AWS and, let me tell you, it was not the most user-friendly service I've ever used. After the dust settled though, I have an EC2 server (ubuntu - LAMP stack) that communicates securely with an RDS MySQL database.

## Planned Bonus Features

*While this app is perfectly functional in its current state, there are several features I intend to implement when I have time.*

- Click an eye icon to show password during input.
- Store session date as timestamp so ORDER BY 'date' DESC returns most recent dates at top of results table of log history page. Right now, it shows the session in the order you logged them (oldest first).
- Light/dark mode switch in header. Since I would always have it set on dark mode, I started there. This kind of goes along with...
- Assess and fix accessibility issues (form input assistance, focus indicators, etc.) I believe this meets most, if not all, AA WCAG standards, but I want to meet as many AAA standards as possible.
- Increase security with more robust password encryption.
- Utilize an AWS S3 bucket to allow users to upload a profile picture.
- Create a logo and favicon. Currently, this site is pretty boring, visually. Of course, this is on the bottom of my features list, but I do hope to get to prettying up the site at some point.

## Acknowledgements

I want to thank the Code Louisville program for the excellent instruction that led to the creation of this application. Especially to my JavaScript class mentor, Joey Mudd, who not only helped me solve problems/bugs as they arose, but also helped me determine a project that would let me hone my PHP, MySQL, and general API skills alongside my ability in JavaScript.

I also want to thank the many folks who helped me test, debug, and fix security issues in this application as well as all those angels who have built a robust repository of supplemental AWS tutorials and support. You'll probably never read this, but you have my deepest gratitude nonetheless!

Happy practicing, everyone!!