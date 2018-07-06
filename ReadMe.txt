************************************************
Food Delivery Website
************************************************
Automation Challenge I project
Department of Computer Science & Engineering
University Of Moratuwa
************************************************
Team Ghost
Members : Kalana Dananjaya 
          Bhanuka Dissanayake
          Lahiru Gunathilake
************************************************

>>Website Functionality
-----------------------

The website contains 5 main pages.First 4 pages belong to customer side and 5th page belongs to Chef's side
    1.Home Page
    2.Order Page
    3.Wait Page
    4.Billing Page
    5.Cook Page

1.Home Page
-----------

This page shows the food items available.The customer can select the food from here.Selecting any food item will lead the customer to "../order-page/order.php"

2.Order Page
------------

This page asks the customer to fill some basic information.This page will post the filled information to the database using and prompting the next page "../wait_page/process.php"
As soon as the data is sent to the database,the necessary food items will be shown in 'Cook Page'

3.Wait Page
-----------

This page shows the time left until the arrival of selected food item,play/pause music or allow the user to prompt to billing page after finishing the meal

4.Billing Page
--------------

This page shows the basic billing information to the customer

5.Cook Page
-----------

The cook page will have 2 lists.The lists will be refreshing every 30 seconds.
Food to be prepared queue and food to be delivered queue.Once the chef finish preparing food he can send those to the food to be delivered queue.
While being sent to that list,the shortest path to deliver the meal should be calculated using a seperate function and store in an array to be send to the robot upon request


>>Robot Functionality
---------------------

The autonomous robot will be hitting GET requests to the server regularly through WiFi.Once food gets into the food to be delivered queue,the GET request will send the data to the robot where it will start the delivery process