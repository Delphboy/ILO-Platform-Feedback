# ILO Platform Feedback Platform
Group 2's submission for the SPAT Bootcamp 2017/18

## Task
Develop a worker feedback system wherein workers can basically express their concerns with regard to the nature of work,
wage payments, working conditions, etc. which could then be utilised to put pressure on the employers/platforms/clients 
to improve their working conditions. 

## What the project does

This project was created to allow workers, who have had experiance with online working platforms, to write their views about a particualr platform.

These results are then stored ready to be used to make infographics or to find anomalies in the data, and allowing trends to be devised from the data in order to check if employees using a particular platform are being treated fairly.

**In detail**

The project allows employees to express any concerns with a particular platform,
The data from the survey to be collected in a secure and organised way,
Provide flexible and customizable infographics to present real time data,
Provide individual rankings of the platforms,
To allow customization of fields and columns like excel,
A basic Login for the administrators,
To prevent spam bots to make up fake results,
To identify results that don't fit a trend (may be fake),
And to keep the data collected secure.

## Why the project is useful

Using this system you can identify trends with platforms, detect descrimination, and keep a record of people being tricked or under-paid to do a job.
With these results recorded, you can create enough evidence to question an employeer/company/platform about their methods and convince them to create a more just working environment for current and future employees. 

## Deployment of the product
##### Preliminary 

You will need to have a table prepared for the data to be entered into, make sure it is titled identically to the one within the project or be willing to edit more than one class model.
You will also need to have an Apache Server ready for the project to be accessible from, to do this you will need to:
- Download the Apache HTTP server
* On windows
You can do that here.. [http://httpd.apache.org/download.cgi]

* On linux/unix

`tar -xzvf ftpserver-1.0.0.tar.gz` or by entering this in the command line for linux/unix

- Run the server:

* On linux/unix

`bin/ftpd.sh`

* On windows

`bin/ftpd.bat`

- Configure server:

* On linux/unix

`bin/ftpd.sh res/conf/ftpd-typical.xml`

* On windows

`bin/ftpd.bat res/conf/ftpd-typical.xml`

you can learn more about how to do this here [https://httpd.apache.org/docs/]

##### On download 

After downloading the product, you will need to go to the database model and enter your database details in order to create a connection to the database (This is commented for your convenience).

##### User

To get started you simply need to take the survey  [http://delphboy-dev.gearhostpreview.com/]

##### Admin

To get started you need to log into your account  [http://delphboy-dev.gearhostpreview.com/login.php]
