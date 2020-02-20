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

CREATE TABLE student_course (
student_id  	int  	NOT NULL   	REFERENCES students(student_id), 
course_id 	int 	NOT NULL 	REFERENCES courses(course_id) 
);


#insert data into tables---------------------------------------------------------
#table students---------------------------Key(1=Seth, 2=Catherine, 3=Dixie)--
INSERT INTO students(student_name)
VALUES ('Seth Cravens');
INSERT INTO students(student_name)
VALUES ('Catherine Cravens');
INSERT INTO students(student_name)
VALUES ('Dixie Cravens');

#2/4/20 could have done:
#INSERT INTO students(student_name)
#VALUES 
#('Seth Cravens'),
#('Catherine Cravens'),
#('Dixie Cravens');

#table courses -------------------Key(1=Pre-Algebra, 2=Epsilon, 3=LA-11, 4=LA-5, 5=Physics,
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

INSERT INTO assignments(assignment, due_date, course_id)
VALUES ('Pre_algebra chapter 17 Exercises A-C', '2020-02-03',
(SELECT course_id FROM courses WHERE course_id = '1')),
('Spanish book chapter 10 Pages 67-77', '2020-02-10',
(SELECT course_id FROM courses WHERE course_id = '6'));

INSERT INTO assignments(assignment, due_date, course_id)
VALUES ('LA Lesson 45-46', '2020-12-03',
(SELECT course_id FROM courses WHERE course_id = '3')),
('Spanish book chapter 9 Pages 56-66', '2020-02-10',
(SELECT course_id FROM courses WHERE course_id = '6')),
('Piano Pages 12-14', '2020-02-10',
(SELECT course_id FROM courses WHERE course_id = '8')),
('LA Lesson 44 Pages 120-128', '2020-02-10',
(SELECT course_id FROM courses WHERE course_id = '4')),
('Physics Lesson 15', '2020-02-10',
(SELECT course_id FROM courses WHERE course_id = '5')),
('World History chapter 32 Pages 200-203', '2020-02-10',
(SELECT course_id FROM courses WHERE course_id = '7')),
('Module 5 Read', '2020-02-10',
(SELECT course_id FROM courses WHERE course_id = '10')),
('Module 5 Prove', '2020-02-10',
(SELECT course_id FROM courses WHERE course_id = '6'));



#table student_course --------------------------------------------------
INSERT INTO student_course(student_id, course_id)
VALUES (
(SELECT student_id FROM students WHERE student_id = '2'),
(SELECT course_id FROM courses WHERE course_id = '2'));

INSERT INTO student_course(student_id, course_id)
VALUES (
(SELECT student_id FROM students WHERE student_id = '2'),
(SELECT course_id FROM courses WHERE course_id = '8'));

INSERT INTO student_course(student_id, course_id)
VALUES (
(SELECT student_id FROM students WHERE student_id = '2'),
(SELECT course_id FROM courses WHERE course_id = '9'));

INSERT INTO student_course(student_id, course_id)
VALUES (
(SELECT student_id FROM students WHERE student_id = '2'),
(SELECT course_id FROM courses WHERE course_id = '4'));

INSERT INTO student_course(student_id, course_id)
VALUES (
(SELECT student_id FROM students WHERE student_id = '2'),
(SELECT course_id FROM courses WHERE course_id = '6'));

INSERT INTO student_course(student_id, course_id)
VALUES (
(SELECT student_id FROM students WHERE student_id = '2'),
(SELECT course_id FROM courses WHERE course_id = '7'));

INSERT INTO student_course(student_id, course_id)
VALUES (
(SELECT student_id FROM students WHERE student_id = '1'),
(SELECT course_id FROM courses WHERE course_id = '3'));

INSERT INTO student_course(student_id, course_id)
VALUES (
(SELECT student_id FROM students WHERE student_id = '1'),
(SELECT course_id FROM courses WHERE course_id = '5'));

INSERT INTO student_course(student_id, course_id)
VALUES (
(SELECT student_id FROM students WHERE student_id = '1'),
(SELECT course_id FROM courses WHERE course_id = '7'));

INSERT INTO student_course(student_id, course_id)
VALUES (
(SELECT student_id FROM students WHERE student_id = '1'),
(SELECT course_id FROM courses WHERE course_id = '1'));

INSERT INTO student_course(student_id, course_id)
VALUES (
(SELECT student_id FROM students WHERE student_id = '3'),
(SELECT course_id FROM courses WHERE course_id = '10'));


#queries for class assignments, week 05------------------------------------------------
 SELECT c. course_name, a.assignment, a.due_date 
 FROM assignments AS a
 JOIN courses AS c
 ON a.course_id = c.course_id;
 
 #for assignment listing on course pge
 SELECT c. course_name, a.assignment, a.due_date 
 FROM assignments AS a 
 JOIN courses AS c
 ON a.course_id = c.course_id
 WHERE c.course_id='2';
 #ORDER BY a.due_date;
 

 #gives me assignment_id and student_name using student_id 
 SELECT c.student_name, s.assignment_id   
 FROM student_assignment AS s 
 JOIN students AS c
 ON s.student_id = c.student_id
 WHERE c.student_id='2';
 

#student_id passed in with $_GET
#using on student_page
SELECT 
students.student_name, 
courses.course_name, 
assignments.assignment, 
assignments.due_date    
FROM students
INNER JOIN student_assignment ON student_assignment.student_id = students.student_id
INNER JOIN assignments ON student_assignment.assignment_id = assignments.assignment_id
INNER JOIN courses ON assignments.course_id = courses.course_id
WHERE students.student_id='2'#(:id)
ORDER BY courses.course_name;

#course_id passed in with $_GET
#using on course_page
#----needs more data in student_asignment table--------
SELECT 
students.student_name, 
courses.course_name, 
assignments.assignment, 
assignments.due_date    
FROM students
INNER JOIN student_assignment ON student_assignment.student_id = students.student_id
INNER JOIN assignments ON student_assignment.assignment_id = assignments.assignment_id
INNER JOIN courses ON assignments.course_id = courses.course_id
WHERE courses.course_id='';#(:id)
 
 #Week 06 add on to project----------------------------------------
#insertStudent Page------------------
 #insert new student into students table:
INSERT INTO students(student_name) VALUES(:studentName);
 #bind :studentName to $studentName which comes from form
 
 #for each courseId coming from form checklist as an array, get related assignments in format of assignment_id.
# May return 1 or more ids in an array.

SELECT assignment_id FROM assignments
WHERE course_id = :course_id;
#bind :course_id to $course_id--comes from foreach loop of above array

INSERT INTO student_assignment(student_id, assignment_id)
VALUES (:student_id, :assignment_id);
#bind :student_id to $studentId which comes from INSERT into students(lastInsertId)
#bind :assignment_id to $assig_id which comes from froeach loop of assignment_id array

#DELETE FROM students:
DELETE FROM students WHERE student_id = 25;

#connectCourse page------------------
#use course_id to SELECT assignment(s) as assignment_id from assignments table
SELECT assignment_id FROM assignments
WHERE course_id = :course_id;
#bind :course_id to $courseId--comes from $_GET

# use assignment_id and $student_id to INSERT into student_assignment tab
INSERT INTO student_assignment(student_id, assignment_id)
VALUES (:student_id, :assignment_id);
#bind :student_id to $studentId($_GET) 
#bind :assignment_id to $assig_id which comes from above SELECT query

 
#insertCourse page---------------------
#inserts a new course_name into courses table
INSERT INTO courses(course_name) VALUES(:courseName);
#bind :courseName to $courseName($_POST)
#will generate a new course_id (lastInsertId)

#insertAssignment page------------------
#inserts a new assignment into assignments table
INSERT INTO assignments(course_id, assignment, due_date) VALUES(:courseId, :assignment, :dueDate);
#bind :courseId to $courseId ($_POST)
#bind :assignment to $assignment($_POST)
#bind :dueDate to $dueDate ($_POST)
#will generate a new assignment_id (lastInsertId)

INSERT INTO assignments(course_id, assignment, due_date) 
VALUES('5', 'Read everything on page 100', '2020-02-17'); 

update_assignment page--------------------
SELECT a.assignment, a.course_id, a.due_date, c.course_name 
FROM assignments a
INNER JOIN courses c ON c.course_id = a.course_id
WHERE a.assignment_id = :assignment_id;
#bind :assignment_id to $assignmentId ($_GET)

UPDATE assignments
SET course_id = '2',
due_date = '2020-02-21',
assignment = 'AAAA'
WHERE assignment_id = '3';

#on couse_page
SELECT 
students.student_name, 
courses.course_name, 
assignments.assignment, 
assignments.due_date,
assignments.assignment_id    
FROM students
INNER JOIN student_assignment ON student_assignment.student_id = students.student_id
INNER JOIN assignments ON student_assignment.assignment_id = assignments.assignment_id
INNER JOIN courses ON assignments.course_id = courses.course_id
WHERE courses.course_id= '2';

SELECT 
students.student_name, 
courses.course_name, 
assignments.assignment, 
assignments.due_date,
assignments.assignment_id    
FROM students
INNER JOIN student_assignment ON student_assignment.student_id = students.student_id
INNER JOIN assignments ON student_assignment.assignment_id = assignments.assignment_id
INNER JOIN courses ON assignments.course_id = courses.course_id
WHERE courses.course_id=:id

SELECT
students.student_name, 
courses.course_name, 
assignments.assignment, 
assignments.due_date,
assignments.assignment_id

#DELETE student_assignment table
DELETE FROM student_assignment;
DROP TABLE student_assignment CASCADE;

#new query for course_page to get course assignments
SELECT  
c.course_name, 
a.assignment, 
a.due_date,
a.assignment_id   
FROM courses c
LEFT JOIN assignments a 
ON a.course_id = c.course_id
WHERE c.course_id= '17';

#new query for course_page to get student names in a course
SELECT  
s.student_name  
FROM students s
JOIN student_course c 
ON s.student_id = c.student_id
WHERE c.course_id='7';

#query on student_page to select all assignments
SELECT 
c.course_name,
a.assignment,
a.due_date
FROM courses c 
INNER JOIN assignments a ON a.course_id = c.course_id
INNER JOIN student_course t ON t.course_id = c.course_id
INNER JOIN students s ON s.student_id = t.student_id
WHERE s.student_id = :id AND due_date BETWEEN NOW()::date AND NOW()::date + 7
ORDER BY c.course_name;

#student _page---disconnect_course page
DELETE FROM student_course
WHERE student_id = '2' AND course_id = '9';

DELETE FROM student_course
WHERE student_id = :student_id AND course_id = :course_id;


 
#//student_id from query as an array
#$studentIds = array();
#$_SESSION['students'] = $studentIds;

#//$_SESSION['students'][] = $assignment['student_id'];
 
 
 
 
 
 