CREATE TABLE Profile(ProfileID INT AUTO_INCREMENT NOT NULL,
    				Fname VARCHAR(20) NOT NULL,
    				Lname VARCHAR(20) NOT NULL,
                    Nick  VARCHAR(20),
                    Email VARCHAR(30) UNIQUE NOT NULL,
                    Pass  VARCHAR(60) NOT NULL,
                    Gender BIT NOT NULL,
                    BirthDate DATE NOT NULL,
                    ProfilePic BLOB,
                    Hometown VARCHAR(20),
                    Marital INT,
                    AboutMe VARCHAR(100),
                    PRIMARY KEY(ProfileID)
                    );

CREATE TABLE POST (
  Caption varchar(120) NOT NULL,
  Image BLOB,
  PostTime timestamp,
  IsPublic bit(1) NOT NULL,
  ProfileID int(11) NOT NULL,
  PostID int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (PostID),
  FOREIGN KEY (ProfileID) REFERENCES Profile(ProfileID)
);

CREATE TABLE Friend (
  ProfileID_1 int(11) NOT NULL,
  ProfileID_2 int(11) NOT NULL,
  PRIMARY KEY(ProfileID_1, ProfileID_2),
  FOREIGN KEY(ProfileID_1) REFERENCES Profile(ProfileID),
  FOREIGN KEY(ProfileID_2) REFERENCES Profile(ProfileID)
);

CREATE TABLE FriendRequest (
  ProfileID_1 int(11) NOT NULL,
  ProfileID_2 int(11) NOT NULL,
  State int(2) NOT NULL DEFAULT 0,
  PRIMARY KEY(ProfileID_1, ProfileID_2),
  FOREIGN KEY(ProfileID_1) REFERENCES Profile(ProfileID),
  FOREIGN KEY(ProfileID_2) REFERENCES Profile(ProfileID)
);
