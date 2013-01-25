# The Movie Table
CREATE TABLE Movie(id int, title varchar(100), year int, 
		   rating varchar(10), company varchar(50));

# The Actor Table
CREATE TABLE Actor(id int, last varchar(20), first varchar(20), 
		   sex varchar(6), dob date, dod date);

# The Director Table
CREATE TABLE Director(id int, last varchar(20), first varchar(20), 
		      dob date, dod date);

# The MovieGenre Table
CREATE TABLE MovieGenre(mid int, genre varchar(20));

# The MovieDirector Table
CREATE TABLE MovieDirector(mid int, did int);

# The MovieActor Table
CREATE TABLE MovieActor(mid int, aid int, role varchar(50));

# The Review Table
CREATE TABLE Review(name varchar(20), time timestamp, mid int, 
		    rating int, comment varchar(500));

# The MaxPersonID and MaxMovie ID Tables
CREATE TABLE MaxPersonID(id int);
CREATE TABLE MaxMovieID(id int);
