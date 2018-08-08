
# The Source Code for Bugbusters Event

![The Main page image](https://raw.githubusercontent.com/N7K5/BugBusters/master/help_icons/help_000.png "Login image")

## to use this, you need an apache http server with mysql...
###### I used xampp software [xampp download link](https://www.apachefriends.org/index.html "Get xampp here") for the same.


## To use the website as admin, you need to do the folowing:-

#### Create the database:-
###### Here Database name is `x_techfest`,  but you can change the same from the file `common/ev_details_aka.php`  [Config file link](https://github.com/N7K5/BugBusters/blob/master/common/ev_details_aka.php "Config file"). You should change database user name and password too. Defaults are: `username: n7k5` and `password:00000000`
![create db image](https://raw.githubusercontent.com/N7K5/BugBusters/master/help_icons/help_001.png "Create database")


#### now Create tables by running the script at /common/set_up_database_7602352291.php 
###### open `http://localhost/techfest/common/set_up_database_7602352291.php` from browser to set-up tables..
![create table image](https://raw.githubusercontent.com/N7K5/BugBusters/master/help_icons/help_002.png "Create tables")
###### They should look like this...
![table image](https://raw.githubusercontent.com/N7K5/BugBusters/master/help_icons/help_003.png "image of tables")



#### Now you can open the site at `http://localhost/techfest/`
###### but you need an unique id to start playing...

---

#### Login as `ADMIN`.....

###### open the /admin url `http://localhost/techfest/admin`
![admin image](https://raw.githubusercontent.com/N7K5/BugBusters/master/help_icons/help_004.png "admin login")

###### This page needs special cookies...
open javascript console and type the following:
```javascript
	document.cookie="admin_id=h67te5gcelt2015b15b19"
```
![admin cookie image](https://raw.githubusercontent.com/N7K5/BugBusters/master/help_icons/help_005.png "admin cookie login")

###### now refresh the page `f5` and click on `set uid` button at the bottom right 
![admin uid image](https://raw.githubusercontent.com/N7K5/BugBusters/master/help_icons/help_006.png "admin set uid")


###### set a new random id... it will be used to login user.... 
![admin uid new image](https://raw.githubusercontent.com/N7K5/BugBusters/master/help_icons/help_007.png "admin set new uid")

###### goto main page and start playing (enter any name and use the givven `uid`)
![admin done image](https://raw.githubusercontent.com/N7K5/BugBusters/master/help_icons/help_008.png "almost done")

###### now start playing...
![admin done image](https://raw.githubusercontent.com/N7K5/BugBusters/master/help_icons/help_009.png " done")

##### You can go to the admon page `http://localhost/techfest/admin` to track users who are playing...