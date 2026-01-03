-- Car Rental Database Schema

-- Drop tables if they exist (in reverse order of dependencies)
DROP TABLE IF EXISTS car_image;

DROP TABLE IF EXISTS car;

DROP TABLE IF EXISTS galery;

DROP TABLE IF EXISTS site_setting;

DROP TABLE IF EXISTS user;

-- User table
CREATE TABLE user (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Car table
CREATE TABLE car (
    car_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    is_featured BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Car Image table
CREATE TABLE car_image (
    car_image_id INT AUTO_INCREMENT PRIMARY KEY,
    car_id INT NOT NULL,
    path VARCHAR(500),
    is_galery BOOLEAN DEFAULT FALSE,
    is_featured BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (car_id) REFERENCES car (car_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Galery table
CREATE TABLE galery (
    galery_id INT AUTO_INCREMENT PRIMARY KEY,
    path VARCHAR(500),
    is_featured BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Site Setting table (key-value pairs)
CREATE TABLE site_setting (
    setting_id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(100) NOT NULL UNIQUE,
    setting_value TEXT,
    type VARCHAR(20) DEFAULT 'string' COMMENT 'Data type: string, integer, boolean, json, text',
    category VARCHAR(50) DEFAULT 'general' COMMENT 'Setting category for grouping',
    description VARCHAR(255),
    is_sensitive BOOLEAN DEFAULT FALSE COMMENT 'Flag for sensitive data like API keys',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Index for better performance
CREATE INDEX idx_car_image_car_id ON car_image (car_id);

CREATE INDEX idx_car_image_featured ON car_image (is_featured);

CREATE INDEX idx_car_featured ON car (is_featured);

CREATE INDEX idx_galery_featured ON galery (is_featured);

CREATE INDEX idx_site_setting_key ON site_setting (setting_key);

-- Insert default site settings
INSERT INTO site_setting (setting_key, setting_value, type, category, description, is_sensitive) VALUES
('site_name', 'Car Rental', 'string', 'general', 'Website name', FALSE),
('phone_number', '', 'string', 'contact', 'Contact phone number', FALSE),
('whatsapp_number', '', 'string', 'contact', 'WhatsApp contact number', FALSE),
('google_maps_embed', '', 'text', 'contact', 'Google Maps embed code', FALSE),
('address', '', 'text', 'contact', 'Business address', FALSE),
('email', '', 'string', 'contact', 'Contact email address', FALSE),
('facebook_url', '', 'string', 'social_media', 'Facebook page URL', FALSE),
('instagram_url', '', 'string', 'social_media', 'Instagram profile URL', FALSE),
('twitter_url', '', 'string', 'social_media', 'Twitter profile URL', FALSE),
('business_hours', '', 'text', 'general', 'Business operating hours', FALSE),
('allow_registration', 'true', 'boolean', 'general', 'Allow new user registration', FALSE);