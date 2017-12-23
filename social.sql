CREATE TABLE profile(ProfileID INT AUTO_INCREMENT NOT NULL,
    				Fname VARCHAR(20) NOT NULL,
    				Lname VARCHAR(20) NOT NULL,
                    Nick  VARCHAR(20),
                    Email VARCHAR(30) UNIQUE NOT NULL,
                    Pass  VARCHAR(60) NOT NULL,
                    Gender int(1) NOT NULL,
                    BirthDate DATE NOT NULL,
                    ProfilePic LONGBLOB,
                    Hometown VARCHAR(20),
                    Marital INT,
                    AboutMe VARCHAR(100),
                    PRIMARY KEY(ProfileID)
                    );

CREATE TABLE post (
  Caption varchar(120) NOT NULL,
  Image LONGBLOB,
  PostTime timestamp,
  IsPublic int(1) NOT NULL,
  ProfileID int(11) NOT NULL,
  PostID int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (PostID),
  FOREIGN KEY (ProfileID) REFERENCES Profile(ProfileID)
);

CREATE TABLE friend (
  ProfileID_1 int(11) NOT NULL,
  ProfileID_2 int(11) NOT NULL,
  PRIMARY KEY(ProfileID_1, ProfileID_2),
  FOREIGN KEY(ProfileID_1) REFERENCES Profile(ProfileID),
  FOREIGN KEY(ProfileID_2) REFERENCES Profile(ProfileID)
);

CREATE TABLE phone (
    ProfileID int NOT NULL,
    Phone varchar(15) NOT NULL,
    FOREIGN KEY (ProfileID) REFERENCES profile(ProfileID),
    PRIMARY KEY (ProfileID, Phone)
  );
