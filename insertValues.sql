INSERT INTO `category`(`categoryID`, `name`, `description`) VALUES 
(1,'Overall Geek','Someone who is a fan of movies, an avid reader, plays video games, watches television and anime and reads manga'),
(2,'Film Fanatic','Someone who is a fan of movies.'),
(3,'Reader','Someone who is an avid reader. This could be graphic novels, comics, and/or novels'),
(4,'Gamer','Someone who plays games either on a mobile device(s), video game console(s) or portable handheld device(s).'),
(5,'Watcher','Someone who is a fan of televised serie(s).'),
(6,'Otaku','Someone who is a fan of Japanese or Korean Anime(s) and/or Manga(s).'),
(7,'Noob','Someone who new to fandoms.');

INSERT INTO `genre`(`genreID`, `name`) VALUES 
(1,'Action/Adventure'),
(2,'Comedy'),
(3,'Crime'),
(4,'Doctumentry'),
(5,'Drama'),
(6,'Fanasty'),
(7,'Horror'),
(8,'Mystery'),
(9,'Science Fiction'),
(10,'Suspence/Thiller');

INSERT INTO `mediums`(`mediumID`, `name`) VALUES 
(1 ,'Anime'),
(2 ,'Cartoon'),
(3 ,'Comic/Graphic Novel/Manga'),
(4 ,'Film'),
(5 ,'Novel'),
(6 ,'Television Show'),
(7 ,'Video Game');

INSERT INTO `fandom`(`fandomID`, `title`, `genreID`) VALUES 
(1 ,'Doctor Who','9'),
(2 ,'Call of Duty','1'),
(3 ,'Hunger Games','1'),
(4 ,'Adventure Time','6'),
(5 ,'Iron Man','1'),
(6 ,'Captain America:The First Avenger','1'),
(7 ,'Attack On Titan','1'),
(8 ,'Ghost In The Shell','9'),
(9 ,'Death Note','10'),
(10 ,'Zelda: Twilight Princess','1'),
(11 ,'Zelda: Skyward Sword','1'),
(12 ,'Bleach','6'),
(13 ,'Naruto','1'),
(14 ,'Batman: The Animated Series','1'),
(15 ,'True Blood','6'),
(16 ,'American Horror Story','7'),
(17 ,'Sherlock','3'),
(18 ,'Scooby Doo','8'),
(19 ,'Once Upon A Time','6'),
(20 ,'Scandal','5'),
(21 ,'Mulan','1'),
(22 ,'Super Mario Sunshime','1'),
(23 ,'Empire','5'),
(24 ,'Harry Potter and the Chamber of Secrets','6'),
(25 ,'Harry Potter and the Goblet of Fire','6'),
(26 ,'Community','2'),
(27 ,'The Witch, The Lion and the Wardrobe','6'),
(28 ,'Law & Order','3'),
(29 ,'Hamlet','5'),
(30 ,'Romeo and Juliet','5'),
(31 ,'Gotham','1');

INSERT INTO `admin`(`username`, `password`) VALUES 
('adminAlpha', sha1('alpha') );

INSERT INTO `members`(`memberID`, `firstName`, `lastName`, `username`, `email`, `password`, `about`,`image`) VALUES 
(1 ,'Patrice','Minott','pminott','pminott@yahoo.com', sha1('patrice'),'I love anime, manga and comics. I am currently reading Attack on Titan, Bleach and Naruto.','samuraichamploo.jpg'),
(2 ,'Patty','Mott','patty','me@myself.com', sha1('patrice'),'I am currently watching Doctor Who. Ten is my favorite!!! I also watch Scandal, Empire, Sherlock and Gotham. I spend a lot of time watching television shows. Especially the Drama filled ones.','EpicHeroCake.jpg');

INSERT INTO `memberCategory`(`memberID`, `categoryID`) VALUES (1, 6),(2, 5);

INSERT INTO `memberFandom`(`memberID`, `fandomID`) VALUES 
(1 ,7),
(1 ,8),
(1 ,9),
(1 ,12),
(1 ,13),
(2, 1),
(2, 4),
(2, 17),
(2, 19),
(2, 23),
(2, 31);

INSERT INTO `fandomMedium`(`fandomID`, `mediumID`) VALUES 
(1 ,6),
(2 ,7),
(3 ,4),
(3, 5),
(4 ,6),
(5 ,2),
(5, 3),
(5, 4),
(6 ,4),
(7 ,1),
(8 ,1),
(9 ,1),
(10 ,7),
(11 ,7),
(12 ,1),
(13 ,1),
(14 ,2),
(15 ,6),
(16 ,6),
(17 ,6),
(18 ,2),
(19 ,6),
(20 ,6),
(21 ,2),
(21 ,4),
(22 ,7),
(23 ,6),
(24 ,4),
(24 ,5),
(25 ,4),
(25 ,5),
(26 ,6),
(27 ,5),
(28 ,6),
(29 ,4),
(29 ,5),
(30 ,4),
(30 ,5),
(31 ,6);

