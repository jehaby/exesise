PRAGMA FOREIGN_KEYS = ON;


CREATE TABLE users(
  id INTEGER PRIMARY KEY,
  name TEXT NOT NULL UNIQUE
);


CREATE TABLE exercises(
  id INTEGER PRIMARY KEY ,
  title TEXT NOT NULL ,
  description TEXT
);


CREATE TABLE workouts(
  id INTEGER PRIMARY KEY ,
  fact_start_time TIMESTAMP,
  fact_end_time TIMESTAMP,
  planned_start_time TIMESTAMP NOT NULL ,
  planned_end_time TIMESTAMP NOT NULL ,
  user_id INTEGER
);


CREATE TABLE activities(
  id INTEGER,
  activity_type TEXT CHECK(activity_type IN ('rest', 'timed', 'repetition')) NOT NULL,
  workout_id INTEGER NOT NULL REFERENCES workouts(id),
  number INTEGER,
  finished BOOLEAN,
  PRIMARY KEY (id, activity_type)
);


CREATE TABLE timed_activities(
  id INTEGER PRIMARY KEY ,
  duration INTEGER,  -- seconds
  exercise_id INTEGER REFERENCES exercises(id)
);


CREATE TABLE rest_activities(
  id INTEGER PRIMARY KEY ,
  duration INTEGER -- seconds
);


CREATE TABLE repetition_activities(
  id INTEGER PRIMARY KEY ,
  exercise_id INTEGER REFERENCES exercises(id)
);


CREATE TABLE repetition_activities_list(
  repetition_activity_id INTEGER NOT NULL REFERENCES repetition_activities(id),
  number INTEGER NOT NULL,
  planned_count INTEGER NOT NULL,
  fact_count INTEGER
);