
CREATE TABLE IF NOT EXISTS lists (
  id serial PRIMARY KEY,
  name varchar(30) NOT NULL UNIQUE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS todos (
	id serial PRIMARY KEY,
	name varchar(30) NOT NULL,
	completed boolean NOT NULL DEFAULT FALSE,
	list_id BIGINT UNSIGNED NOT NULL REFERENCES lists(id)
) ENGINE=InnoDB;