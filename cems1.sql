SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(50) NOT NULL,
  `participants` int(100) DEFAULT 0,
  `img_link` text DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `events` (`event_id`, `event_title`, `participants`, `img_link`, `type_id`) VALUES
(1, 'Inspirathon', 0, 'images/1.png', 1),
(2, 'Technomorph', 2, 'images/2.png', 1),
(3, 'Codeclash', 2, 'images/3.png', 1),
(4, 'Exquizite', 1, 'images/4.png', 1),
(5, 'Cryptoquest', 1, 'images/5.png', 1),
(6, 'Masterclass', 1, 'images/6.png\r\n', 1),
(7, 'Framed', 1, 'images/7.png', 2),
(8, 'Reel It Feel It', 0, 'images/8.png', 2),
(9, 'Meme-off', 0, 'images/9.png', 2),
(10, 'Cubix', 0, 'images/10.png', 2),
(11, 'Veil of secrets', 0, 'images/11.png', 2);


CREATE TABLE `event_info` (
  `event_id` int(10) NOT NULL,
  `Date` date DEFAULT NULL,
  `time` varchar(20) NOT NULL,
  `location` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `event_info` (`event_id`, `Date`, `time`, `location`) VALUES
(1, '2022-11-10', '10:00 am ', 'Auditorium (2nd floor)'),
(2, '2022-11-10', '10:00 am', 'C4 and C9 Lab'),
(3, '2022-11-10', ' 12:00 pm', 'C1, C2, C3 Lab'),
(4, '2022-11-10', '1:00 pm', 'C19 Lab (1st floor)'),
(5, '2022-10-11', '9:30 am', 'C1, C2, C3 Lab'),
(6, '2022-10-11', '10:00 am', 'Seminar Hall 2(First floor)'),
(7, '2022-10-10', '10:00 am', 'NA'),
(8, '2022-10-02', '11:59 pm', 'NA'),
(9, '2022-10-06', '11:59 pm', 'NA'),
(10, '2022-10-10', '11:00 am ', 'C5 and C6 Lab'),
(11, '2022-10-11', '9:30 am', 'C4,C5,C6 and FE COMP');


CREATE TABLE `event_type` (
  `type_id` int(10) NOT NULL,
  `type_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `event_type` (`type_id`, `type_title`) VALUES
(1, 'Technical Events'),
(2, 'Non-Technical Events');



CREATE TABLE `participant` (
  `usn` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `branch` varchar(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `college` varchar(20) NOT NULL,
  `password` VARCHAR(255) NOT NULL AFTER `college`
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `participant` (`usn`, `name`, `branch`, `email`, `phone`, `college`) VALUES
('Masters', 'rohit', 'CSE', 'rohit@gmail.com', '8123300011', 'GEC'),
('Seekers', 'siddi', 'cse', 'siddhi@gmail.com', '9934736623', 'PCCE'),
('Clueless', 'piyush', 'cse', 'piyush@gmail.com', '7888387323', 'GEC'),
('Mavericks', 'Mithali', 'CSE', 'mithali@dbcegoa.ac.in', '8998848488', 'DBCE'),
('night owls', 'Prajwal', 'cse', 'prajwal@gmail.com', '9858787438', 'GEC'),
('techno', 'Pratik', 'CSE', 'pratik@dbcegoa.ac.in', '7897854345', 'DBCE');



CREATE TABLE `registered` (
  `rid` int(11) NOT NULL,
  `usn` varchar(20) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `registered` (`rid`, `usn`, `event_id`) VALUES
(1, 'Masters', 2),
(2, 'Seekers', 4),
(3, 'Clueless', 2),
(4, 'Mavericks', 3),
(5, 'night owls', 3),
(6, 'techno', 5);




DELIMITER $$
CREATE TRIGGER `count` AFTER INSERT ON `registered` FOR EACH ROW update events
set events.participants=events.participants+1
WHERE events.event_id=new.event_id
$$
DELIMITER ;



CREATE TABLE `staff_coordinator` (
  `stid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `staff_coordinator` (`stid`, `name`, `phone`, `event_id`) VALUES
(1, 'Prof. Mithil Parab', '9956436610', 1),
(2, 'Dr. Vivek Jog', '9956436123', 2),
(3, 'Prof. Siya Khandeparkar', '9956436456', 3),
(4, 'Prof. Sweta Morajkar', '9956436789', 4),
(5, 'Prof. Manisha Fal Dessai', '9956436101', 5),
(6, 'Prof. Amey kerkar', '9123436610', 6),
(7, 'Dr. Norman Dias', '9456436610', 7),
(8, 'Dr. Amrita Naik', '9789436610', 8),
(9, 'Prof. Viosha Cruz', '9956412310', 9),
(10, 'Prof. Amrita Naik', '9956445610', 10),
(11, 'Prof. Janhavi Naik', '9956473510', 11);


CREATE TABLE `student_coordinator` (
  `sid` int(11) NOT NULL,
  `st_name` varchar(100) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `student_coordinator` (`sid`, `st_name`, `phone`, `event_id`) VALUES
(1, 'Sonal Gaonkar', '6956436610', 1),
(2, 'Nathania Baptista', '7956436123', 2),
(3, 'Jay Rane', '8956436456', 3),
(4, 'Eric Faleiro', '6956436789', 4),
(5, 'Jayden DSouza', '7956436101', 5),
(6, 'Griselda Fernandes', '8123436610', 6),
(7, 'Jordan Fernandes', '6456436610', 7),
(8, 'Faizan Akabani', '7789436610', 8),
(9, 'Lauren Rodrigues', '7956412310', 9),
(10, 'Sherwin Lourenco', '7956445610', 10),
(11, 'Meha Dangui', '6956473510', 11);


ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);


ALTER TABLE `event_info`
  ADD PRIMARY KEY (`event_id`);



ALTER TABLE `event_type`
  ADD PRIMARY KEY (`type_id`);


ALTER TABLE `participant`
  ADD PRIMARY KEY (`usn`);


ALTER TABLE `registered`
  ADD PRIMARY KEY (`rid`);


ALTER TABLE `staff_coordinator`
  ADD PRIMARY KEY (`stid`);


ALTER TABLE `student_coordinator`
  ADD PRIMARY KEY (`sid`);


ALTER TABLE `event_info`
  MODIFY `event_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;


ALTER TABLE `registered`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


ALTER TABLE `staff_coordinator`
  MODIFY `stid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;


ALTER TABLE `student_coordinator`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

CREATE TABLE `sponsors` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(100) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `sponsors` (`s_name`, `contact_no`) VALUES
('TechCorp', '9988776655'),
('GamingHub', '8877665544'),
('FashionFiesta', '7766554433');

CREATE TABLE `venues` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `vname` varchar(100) NOT NULL,
  `location` varchar(300) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `venues` (`vname`, `location`, `type`) VALUES
('Auditorium', 'Main Block, Ground Floor', 'On Stage'),
('Coding Lab', 'Block A, Second Floor', 'Technical'),
('Sports Arena', 'Outdoor Area', 'Gaming');

COMMIT;

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `sess_type` varchar(50) NOT NULL,
  `speaker` varchar(100) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `date` date NOT NULL,
  `event` varchar(100) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`session_id`),
  FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `sessions` (`sess_type`, `speaker`, `start_time`, `end_time`, `date`, `event`, `event_id`) VALUES
('Workshop', 'John Doe', '10:00:00', '12:00:00', '2022-11-16', 'Inspirathon', 1),
('Panel Discussion', 'Alice Smith', '14:00:00', '15:30:00', '2022-11-16', 'Codeclash', 3),
('Demo Session', 'Mark Johnson', '16:00:00', '17:30:00', '2022-11-17', 'Exquizte', 4);

CREATE TABLE `resources` (
  `req_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`req_id`),
  FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `resources` (`r_name`, `type`, `quantity`, `event_id`) VALUES
('Projector', 'Equipment', 1, 1),
('Laptops', 'Electronics', 10, 4),
('Sound System', 'Equipment', 2, 7),
('Chairs', 'Furniture', 50, 8);
COMMIT;