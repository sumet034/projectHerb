/* Create database herb */
CREATE TABLE herbname(
  herbID int (11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nameShow varchar(100) DEFAULT '',
  herbImg varchar(255) DEFAULT '',
  scienceName varchar(255) DEFAULT '',
  familyHerb varchar(255) DEFAULT '',
  commonName varchar(255) DEFAULT '',
  localName varchar(255) DEFAULT '',
  created_at timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE detail(
  herbID int (11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  leaves text DEFAULT '',
  flower text DEFAULT '',
  fruit text DEFAULT '',
  haulm text DEFAULT '',
  rootHerb text DEFAULT '',
  propagating text DEFAULT '',
  feature text DEFAULT ''
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE statuss(
  herbID int (11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  feature_leaves BOOLEAN DEFAULT TRUE,
  feature_flower BOOLEAN DEFAULT TRUE,
  feature_fruit BOOLEAN DEFAULT TRUE,
  feature_haulm BOOLEAN DEFAULT TRUE,
  feature_rootHerb BOOLEAN DEFAULT TRUE
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE imgfeature(
  herbID int (11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  leavesx varchar(255) DEFAULT '',
  flowerx varchar(255) DEFAULT '',
  fruitx varchar(255) DEFAULT '',
  haulmx varchar(255) DEFAULT '',
  rootHerbx varchar(255) DEFAULT ''
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

/* truncate table herbname;
truncate table detail;
truncate table statuss;
truncate table imgfeature; */
ALTER TABLE
  herbname AUTO_INCREMENT = 10500;

ALTER TABLE
  detail AUTO_INCREMENT = 10500;

ALTER TABLE
  statuss AUTO_INCREMENT = 10500;

ALTER TABLE
  imgfeature AUTO_INCREMENT = 10500;

CREATE TABLE accountPm(
  addminID int (11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Email varchar(50) NOT NULL DEFAULT '',
  pass varchar(20) NOT NULL DEFAULT '',
  nameStd varchar(255) DEFAULT NULL,
  surnameStd varchar(255) DEFAULT NULL,
  idStd varchar(14) DEFAULT NULL,
  role varchar(10) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE feedHerb(
  feedID int (11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  feedTxt text DEFAULT NULL,
  feedImg varchar(255) DEFAULT NULL,
  feedStar int (6) DEFAULT NULL,
  time_at timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE rateStar(
  ratefive int (6) NOT NULL DEFAULT 0,
  ratefour int (6) NOT NULL DEFAULT 0,
  ratethree int (6) NOT NULL DEFAULT 0,
  ratetwo int (6) NOT NULL DEFAULT 0,
  rateone int (6) NOT NULL DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

ALTER TABLE
  accountPm AUTO_INCREMENT = 62500;

ALTER TABLE
  feedHerb AUTO_INCREMENT = 30500;

/* วิธีรีเซ็ต AUTO_INCREMENT 
 truncate table herbname; */