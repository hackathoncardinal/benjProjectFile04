<div align="center">


  <br />
  <br />

  <h2 align="center">Benjie Tawi</h2>


</div>

<br />

### Demo Video

![Watch Video Demo](./Demo/FINAL_SYSTEM.mp4 "Demo")
<iframe src="./Demo/FINAL_SYSTEM.mp4" frameborder="0" allowfullscreen></iframe>

### Prerequisites

Before you begin, ensure you have met the following requirements:

* [Git](https://git-scm.com/downloads "Download Git") must be installed on your operating system.
* for linux Command: ("sudo apt install github").

### Instruction And Setup

Step 1 : Install XAMPP Apache + MariaDB + PHP + Perl
	•Folder
	  -Installer/xampp-windows-installer.exe
	  -website source : https://www.apachefriends.org/
-------------------------------------------------------------
Step 2 : Install POS-58 USB Drivers
	•Folder
	  -Installer/POS-58-Series.exe
	  -website source : https://oemdrivers.com/printer-pos-58-usb-drivers
-------------------------------------------------------------
Step 3 : Install Code Editor  Sublime Text 
	•Folder
	  -Code Editor/Sublime Text Build 3211 x64 Setup.exe
	  -website source : https://www.sublimetext.com/
-------------------------------------------------------------
Step 4 : Set up Database Tables
	-Start XAMPP: Launch the XAMPP control panel and start the Apache and MySQL services. 
	_____________________________________________________________
	1. •Open phpMyAdmin: Open your web browser and visit http://localhost/phpmyadmin/. This will open the phpMyAdmin interface.
	_____________________________________________________________
	2. •Login to phpMyAdmin: Enter your username and password. By default, the username is "root," and there is no password.
	_____________________________________________________________
	3. •Create a new database: Once logged in, you will see the phpMyAdmin interface. On the left side, you will find a panel displaying the existing databases. To create a new 	database, 	click on the "New" button.
	_____________________________________________________________
	4. •Enter the database details: In the "Create database" section, enter a name for your database. "PMS"  
	_____________________________________________________________
	5. •Click "Create": After entering the database details, click the "Create" button to create the database.
	_____________________________________________________________
	6. •Verify the database creation: You will see a success message indicating that the database has been created. The new database will appear in the left panel under the list of 	databases.
	_____________________________________________________________
	7. •Import the SQL file: After selecting the database, you will see various tabs at the top of the page. Click on the "Import" tab.
	_____________________________________________________________
	8. •Choose the SQL file: On the "Import" page, click on the "Choose File" button and browse your computer to select the SQL file you want to import. 
	-->" C:\Users\Profile\Desktop\PUP Payment Management System\Database Table\pms(.sql) "
	_____________________________________________________________
	9. •Configure import options: You can leave the default import options as they are, or modify them if needed. Ensure that the character set and collation match the SQL file.
	_____________________________________________________________
	10. •Execute the import: Click the "Go" button at the bottom of the page to start importing the SQL file. The import process may take some time, depending on the size of the SQL 		file.
	_____________________________________________________________
	11. •Verify the import: Once the import process is complete, you should see a success message. The SQL file's tables and data should now be imported into the selected database.
	_____________________________________________________________
-------------------------------------------------------------
Step 5 : Extract file folder named "TapAndTrack" to  C:\xampp\htdocs\ 
-------------------------------------------------------------
Step 6 : Open browser and test the system 
	 http://localhost/TapAndTrack/



Project Team Member
-Anna Añonuevo BSCPE 4-1
-Jamila Nazir Idrees BSCPE 4-1
-Benjie Tawi


Remember that our work is more than just lines of code or financial transactions—it is a catalyst for progress, a facilitator of opportunities, and a bridge between aspirations and achievements. Let us stay inspired, motivated, and committed to building a payment management system that transforms lives and shapes a brighter future.

Thank you! :)



### Run Locally

To run ** Benj System ** locally, run this command on your git bash:

Linux and macOS:

```bash
sudo git clone https://github.com/hackathoncardinal/benjProjectFile04.git
```

Windows:

```bash
git clone https://github.com/hackathoncardinal/benjProjectFile04.git
```

### Contact

If you want to contact with me you can reach me at [Facebook](https://www.facebook.com/benjie.tawi).

### License

This project is **free to use** and does not contains any license.