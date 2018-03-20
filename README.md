# ILO Platform Feedback Platform
Group 2's submission for the SPAT Bootcamp 2017/18 can be viewed live at: [http://ilo.gearhostpreview.com/register.php](http://ilo.gearhostpreview.com/register.php)

## Team
 - [Stephen Agius](https://github.com/Stevieag)
 - [Sam Jones](https://github.com/SamJones01)
 - [Chris Lewis](https://github.com/ChrisLewisX)
 - [Bilyana Neshkova](https://github.com/Rilliswen)
 - [Henry Senior](https://github.com/Delphboy)

## Task
Develop a worker feedback system wherein workers can basically express their concerns with regard to the nature of work,
wage payments, working conditions, etc. which could then be utilised to put pressure on the employers/platforms/clients 
to improve their working conditions. 


## Deployment of the product
### Prerequisites
 - An apache web server running PHP 5.5 or higher
 - MySQL Database
 
### Deployment
 
 - Extract the zip file into the root directory of the server
 - Set up a MySQL database, making a note of the host, database name, the user 
 account, and the user password
 - Create the required MySQL database tables:
   ```
   CREATE TABLE review 
   (
       idno INT(11) AUTO_INCREMENT,
       platform VARCHAR(30),
       wage DECIMAL(5,2),
       currency VARCHAR(3),
       hours_spent_working INT(11),
       hours_spent_looking INT(11), 
       gender VARCHAR(3),
       age INT(2), 
       rating INT(1), 
       country VARCHAR(45),
       rating_pay INT(11),
       rating_conditions INT(11), 
       rating_description INT(11), 
       comment VARCHAR(300), 
       rejection int(11), 
       PRIMARY KEY(idno)
   );
   
   
   CREATE TABLE user 
      (
          idno INT(11) AUTO_INCREMENT,
          password VARCHAR(100),
          email VARCHAR(40),
          isAdministrator TINYINT(1), 
          PRIMARY KEY(idno)
      );
   ``` 
  - Connect the database.php model to the database
    - Navigate to Models/database.php and open it in a text editor
    - On line 20 you will find the following lines:
    ```Php
    private $host = "";
    private $dbName = "";
    private $user = "";
    private $pass = "";
    ```
    - Fill in these lines to hold the information about the MySQL database 
    you plan to use between the speech marks. 
 - Make any additional changes required for your configuration
 - Start the server
 - Navigate to your server in a web browser and test that the survey page loads