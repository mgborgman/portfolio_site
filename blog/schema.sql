CREATE TABLE IF NOT EXISTS post (
	id serial PRIMARY KEY,
    title varchar(100) NOT NULL,
	author varchar(50) NOT NULL,
	pub_date DATETIME NOT NULL DEFAULT NOW(),
    content TEXT NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS comment (
    id serial PRIMARY KEY,
    post_id BIGINT UNSIGNED,
    author varchar(50) NOT NULL,
    pub_date DATETIME NOT NULL DEFAULT NOw(),
    content TEXT NOT NULL,
    FOREIGN KEY (post_id)
        REFERENCES post(id)
        ON DELETE CASCADE
) ENGINE=InnoDB;