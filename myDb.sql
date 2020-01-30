#create tables--------------------------------------------------------------

CREATE TABLE students (
student_id  	serial	  NOT NULL	  PRIMARY KEY, 
student_name  	varchar(80)  	NOT NULL  	UNIQUE 
);

CREATE TABLE courses (
course_id  	serial  	NOT NULL  	PRIMARY KEY, 
course_name  	varchar  	NOT NULL  	UNIQUE 
);

CREATE TABLE assignments (
assignment_id  	serial  	NOT NULL  	PRIMARY KEY, 
course_id  	int  	NOT NULL  	REFERENCES courses(course_id),  
assignment  	text  	NOT NULL,
due_date  	date  	NOT NULL  
);

CREATE TABLE student_assignment (
student_id  	int  	NOT NULL   	REFERENCES students(student_id), 
assignment_id 	int 	NOT NULL 	REFERENCES assignments(assignment_id) 
);

#insert data into tables---------------------------------------------------------
#table students---------------------------Key(1=Seth, 2=Catherine, 3=Dixie)--
INSERT INTO students(student_name)
VALUES ('Seth Cravens');
INSERT INTO students(student_name)
VALUES ('Catherine Cravens');
INSERT INTO students(student_name)
VALUES ('Dixie Cravens');

#table courses -------------------------Key(1=Pre-Algebra, 2=Epsilon, 3=LA-11, 4=LA-5,
 #---------------------------6=Spanish,7=World History, 8=Piano, 9=Anatomy, 10=CS313)-- 
INSERT INTO courses(course_name)
VALUES ('Pre-Algebra');
INSERT INTO courses(course_name)
VALUES ('Epsilon Math');
INSERT INTO courses(course_name)
VALUES ('Language Arts-11');
INSERT INTO courses(course_name)
VALUES ('Language Arts-5');
INSERT INTO courses(course_name)
VALUES ('Physics');
INSERT INTO courses(course_name)
VALUES ('Spanish');
INSERT INTO courses(course_name)
VALUES ('World History');
INSERT INTO courses(course_name)
VALUES ('Piano');
INSERT INTO courses(course_name)
VALUES ('Anatomy');
INSERT INTO courses(course_name)
VALUES ('CS131');

#table assignments --------------------------------------------------------
INSERT INTO assignments(assignment, due_date, course_id)
VALUES ('Epsilon chapter 14 Exercises A-E', '2020-02-03',
(SELECT course_id FROM courses WHERE course_id = '2'));

INSERT INTO assignments(assignment, due_date, course_id)
VALUES ('Epsilon chapter 14 Test', '2020-02-04',
(SELECT course_id FROM courses WHERE course_id = '2'));

INSERT INTO assignments(assignment, due_date, course_id)
VALUES ('Pre_algebra chapter 17 Exercises A-E', '2020-02-03',
(SELECT course_id FROM courses WHERE course_id = '2'));

#table student_assignment --------------------------------------------------
INSERT INTO student_assignment(student_id, assignment_id)
VALUES (
(SELECT student_id FROM students WHERE student_id = '2'),
(SELECT assignment_id FROM assignments WHERE assignment_id = '1'));

INSERT INTO student_assignment(student_id, assignment_id)
VALUES (
(SELECT student_id FROM students WHERE student_id = '2'),
(SELECT assignment_id FROM assignments WHERE assignment_id = '2'));

INSERT INTO student_assignment(student_id, assignment_id)
VALUES (
(SELECT student_id FROM students WHERE student_id = '1'),
(SELECT assignment_id FROM assignments WHERE assignment_id = '3'));

       