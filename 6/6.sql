SELECT posts.id, title, username, content FROM posts LEFT JOIN users ON createdBy = users.id WHERE posts.id = 1;
SELECT comment FROM comments WHERE comments.postId=1