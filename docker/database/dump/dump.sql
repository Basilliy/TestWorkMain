DROP TABLE IF EXISTS `visitors`;

CREATE TABLE visitors (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ip_address char(16) NOT NULL,
    user_agent varchar(255) NOT NULL,
    view_date TIMESTAMP NOT NULL,
    page_url varchar(255) NOT NULL,
    views_count MEDIUMINT DEFAULT 1
)