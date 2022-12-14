CREATE TABLE IF NOT EXISTS reviews (
		reviewID INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
        user INT,
        title VARCHAR(50) DEFAULT NULL,
		reviewEvent VARCHAR(100) DEFAULT NULL,
		body TEXT DEFAULT NULL,
		rating DECIMAL(5,2) DEFAULT NULL,
        FOREIGN KEY(user) REFRENCES userReviews(userID)
        
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;