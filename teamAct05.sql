#Team Activity week 05
#https://morning-wildwood-68647.herokuapp.com/assignmentsPage.php

CREATE TABLE scriptures (
id SERIAL NOT NULL PRIMARY KEY,
book VARCHAR(50) NOT NULL,
chapter INT NOT NULL,
verse INT NOT NULL,
content TEXT NOT NULL
);

INSERT INTO scriptures(book, chapter, verse, content)
VALUES 
('John', '1','5', 'And the light shineth in darkness; 
and the darkness comprehended it not.'),
('Doctrine and Covenants', '88', '49', 'The light shineth in darkness,
 and the darkness comprehendeth it not; nevertheless, the day shall
 come when you shall comprehend even God, being quickened in him 
and by him.'),
('Doctrine and Covenants', '93', '28', 'He that keepeth his commandments 
receiveth truth and light, until he is glorified in truth and 
knoweth all things.'),
('Mosiah', '16', '9', 'He is the light and the life of the world; yea, 
a light that is endless, that can never be darkened; yea, and also a
 life which is endless, that there can be no more death.');


#week 06 ads on to week 05:

CREATE TABLE topic (
id SERIAL NOT NULL PRIMARY KEY,
name VARCHAR (50) NOT NULL
);

INSERT INTO topic (name)
VALUES 'Faith', 'Sacrifice', 'Charity';

CREATE TABLE scripture_link (
id SERIAL NOT NULL PRIMARY KEY,
scripture_id INT NOT NULL REFERENCES scriptures(id),
topic_id INT NOT NULL REFERENCES topic(id)
);
