# Create a database and connect to it
# NOTE: You don't need to do this if you are using a DB at heroku
CREATE DATABASE scripture_ta;
\c scripture_ta

# Create a table for the scriptures
CREATE TABLE scripture (
  id SERIAL PRIMARY KEY NOT NULL,
  book VARCHAR(80) NOT NULL,
  chapter INT NOT NULL,
  verse INT NOT NULL,
  content VARCHAR(4000) NOT NULL
  );

# Insert data into the new table
INSERT INTO scripture (book, chapter, verse, content)
  VALUES ('John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');

INSERT INTO scripture (book, chapter, verse, content)
  VALUES ('Doctrine and Covenants', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');

INSERT INTO scripture (book, chapter, verse, content)
  VALUES ('Doctrine and Covenants', 93, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');

INSERT INTO scripture (book, chapter, verse, content)
  VALUES ('Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');

CREATE TABLE topic
(
    id SERIAL PRIMARY KEY NOT NULL,
    topic VARCHAR(255) NOT NULL
);

INSERT INTO topic (topic) VALUES ('Faith');
INSERT INTO topic (topic) VALUES ('Sacrifice');
INSERT INTO topic (topic) VALUES ('Charity');

CREATE TABLE scripture_topic 
(
    id SERIAL PRIMARY KEY NOT NULL,
    scripture_id INT NOT NULL,
    topic_id INT NOT NULL,
    CONSTRAINT fk_scripture FOREIGN KEY (scripture_id) REFERENCES scripture(id) ON DELETE CASCADE,
    CONSTRAINT fk_topic FOREIGN KEY (topic_id) REFERENCES topic(id) ON DELETE CASCADE
);

INSERT INTO scripture_topic (scripture_id, topic_id) VALUES (1, 2);
INSERT INTO scripture_topic (scripture_id, topic_id) VALUES (2, 3);
INSERT INTO scripture_topic (scripture_id, topic_id) VALUES (3, 1);
INSERT INTO scripture_topic (scripture_id, topic_id) VALUES (1, 2);