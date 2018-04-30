To login:
Administrator
username = jess_yeoh
pw = qwerty

Employee
username = test_employee
pw = Qwerty123


index.php is the login page
imageURL located in book table
only the admin can register new users as "employees"

Password is hashed on submit_register.php
Password is decrypted on login_process.php
Username must be unique - it is checked via checkdata.php
