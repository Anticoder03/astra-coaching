-- Create the database
CREATE DATABASE IF NOT EXISTS astra_coaching;
USE astra_coaching;

-- Create courses table
CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    duration VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create testimonials table
CREATE TABLE IF NOT EXISTS testimonials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    role VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create contact_messages table
CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create instructors table
CREATE TABLE IF NOT EXISTS instructors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    specialization VARCHAR(255) NOT NULL,
    experience_years INT NOT NULL,
    bio TEXT,
    image_url VARCHAR(255),
    email VARCHAR(255),
    linkedin_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample courses with Indian context
INSERT INTO courses (title, description, duration, price, image) VALUES
('Basic Computer Skills', 'Learn essential computer skills including MS Office, Internet usage, and basic digital literacy. Perfect for beginners and job seekers.', '3 months', 4999.00, 'basic-computer.jpg'),
('Web Development', 'Master modern web development with HTML5, CSS3, JavaScript, and PHP. Build responsive websites and web applications.', '6 months', 14999.00, 'web-dev.jpg'),
('Digital Marketing', 'Learn SEO, Social Media Marketing, Content Marketing, and Google Analytics. Start your career in digital marketing.', '4 months', 8999.00, 'digital-marketing.jpg'),
('Data Science', 'Learn Python, SQL, Data Analysis, and Machine Learning. Become a data scientist and work with big data.', '8 months', 24999.00, 'data-science.jpg'),
('Mobile App Development', 'Master Android and iOS app development using Flutter. Create cross-platform mobile applications.', '6 months', 19999.00, 'mobile-dev.jpg'),
('Cyber Security', 'Learn ethical hacking, network security, and cyber defense. Protect systems from cyber threats.', '6 months', 17999.00, 'cyber-security.jpg');

-- Insert sample testimonials with Indian context
INSERT INTO testimonials (name, role, content, image) VALUES
('Priya Sharma', 'Web Developer at TCS', 'Astra Coaching Center transformed my career. The practical approach and industry-relevant curriculum helped me land my dream job at TCS. The faculty is highly supportive and knowledgeable.', 'testimonial-1.jpg'),
('Rahul Patel', 'Digital Marketing Manager', 'The digital marketing course at Astra was comprehensive and up-to-date with industry trends. I learned practical skills that I use every day in my job. Highly recommended!', 'testimonial-2.jpg'),
('Ananya Gupta', 'Data Analyst', 'The data science program at Astra gave me a strong foundation in analytics and programming. The placement support team helped me secure a great position in a leading company.', 'testimonial-3.jpg'),
('Vikram Singh', 'Mobile App Developer', 'The mobile app development course was excellent. I learned Flutter and now I can create apps for both Android and iOS. The hands-on projects were very helpful.', 'testimonial-4.jpg'),
('Meera Joshi', 'Cyber Security Expert', 'The cyber security course at Astra is top-notch. The practical labs and real-world scenarios prepared me well for my current role. The instructors are industry experts.', 'testimonial-5.jpg'),
('Arjun Reddy', 'Software Engineer', 'Astra''s web development course helped me switch careers successfully. The curriculum is well-structured and the placement cell provides excellent support.', 'testimonial-6.jpg');

-- Insert sample instructors
INSERT INTO instructors (name, specialization, experience_years, bio, image_url, email, linkedin_url) VALUES
('Dr. Sarah Williams', 'Web Development & Full Stack', 12, 'Former Senior Developer at Google with expertise in modern web technologies and frameworks.', 'https://randomuser.me/api/portraits/women/32.jpg', 'sarah.williams@astracoaching.com', 'https://linkedin.com/in/sarahwilliams'),
('Prof. Michael Chen', 'Data Science & Machine Learning', 15, 'PhD in Computer Science with extensive experience in AI and machine learning applications.', 'https://randomuser.me/api/portraits/men/32.jpg', 'michael.chen@astracoaching.com', 'https://linkedin.com/in/michaelchen'),
('Emily Rodriguez', 'Python & Software Development', 8, 'Senior Software Engineer with expertise in Python, Django, and cloud technologies.', 'https://randomuser.me/api/portraits/women/44.jpg', 'emily.rodriguez@astracoaching.com', 'https://linkedin.com/in/emilyrodriguez'),
('David Kumar', 'Mobile App Development', 10, 'Former Lead Developer at Apple with expertise in iOS and Android development.', 'https://randomuser.me/api/portraits/men/44.jpg', 'david.kumar@astracoaching.com', 'https://linkedin.com/in/davidkumar'),
('Lisa Thompson', 'Digital Marketing & SEO', 7, 'Digital Marketing expert with proven track record in growing online businesses.', 'https://randomuser.me/api/portraits/women/68.jpg', 'lisa.thompson@astracoaching.com', 'https://linkedin.com/in/lisathompson'),
('James Wilson', 'Cybersecurity & Network Security', 14, 'Certified Ethical Hacker with extensive experience in network security and penetration testing.', 'https://randomuser.me/api/portraits/men/68.jpg', 'james.wilson@astracoaching.com', 'https://linkedin.com/in/jameswilson'); 