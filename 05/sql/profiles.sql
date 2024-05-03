CREATE TABLE profiles (
  id INT NOT NULL AUTO_INCREMENT,
  about TEXT NOT NULL,
  introtitle TEXT NOT NULL,
  introtext TEXT NOT NULL,
  users_id INT,
  PRIMARY KEY (id),
  Foreign Key (users_id) REFERENCES users(id)
);