CSC322-BookMarket
=================
In order to have this web-based application to work, you have to download <a href="https://www.apachefriends.org/index.html">xammp</a>.

After start both Apache and MySQL in XAMPP Control Panel,You need to go to browser, type "localhost/phpmyadmain" into address.
<br>

Create a new user with following info:
<br>
	name: csc322
<br>
	password: 123
<br>

	Check all of the following:
	<ul>
		<li>Create database with same name and grant all privileges.</li>
		<li>Grant all privileges on wildcard name (username\_%).</li>
		<li>Global privileges: Check All </li>
	</ul>
Then, create following tables on database: csc322,

		create table users(
			user_id int(11) primary key, -- set this to "auto increment"
			username varchar(32) not null,
			password varchar(32) not null,
			first_name varchar(32) not null,
			last_name varchar(32),
			email varchar(1024) not null,
			active int(11) not null -- set this "as define: 0"
		);

		create table books(
			book_id int(11) primary key, -- set this to "auto increment"
			title varchar(32) not null,
			author varchar(32) not null,
			genre varchar (32) not null,
			price real not null,
			book_condition varchar(32) not null,
			book_cover varchar(1024),
			rating int(11),
			description varchar(1024),
			owner int(11)
			--adding references between two tables
			--set foreign_key_checks=0;(IGNORE)
		);

		ALTER TABLE books ADD CONSTRAINT
				FOREIGN KEY (owner)
				REFERENCES users(user_id);


After that, Clone this folder under /opt/lampp/htdoc folder.
