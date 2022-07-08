CREATE TABLE IF NOT EXISTS comments (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL,
    comment TEXT NOT NULL,
     reply TEXT NOT NULL,
    post_id INTEGER NOT NULL,
    created_at DATETIME NOT NULL,
    reply_of INTEGER NOT NULL,
    CONSTRAINT fk_comments_post_id FOREIGN KEY (post_id) REFERENCES posts(id)
)