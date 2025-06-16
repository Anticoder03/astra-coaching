<?php
require_once 'config/db.php';

// Fetch instructors from database
$instructors = [];
$result = $conn->query("SELECT * FROM instructors ORDER BY experience_years DESC LIMIT 6");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $instructors[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astra Coaching Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
   <?php require_once 'header.php'; ?>
    <!-- Hero Section -->
    <div class="relative bg-blue-600 h-[600px]">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" 
                 class="w-full h-full object-cover opacity-50" alt="Computer Education">
        </div>
        <div class="relative container mx-auto px-6 py-32">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-8 animate-fade-in">
                    Welcome to Astra Coaching Center
                </h1>
                <p class="text-xl text-white mb-12 animate-slide-up">
                    Empowering minds through quality computer education
                </p>
                <a href="courses.php" 
                   class="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-blue-50 transition duration-300 animate-bounce">
                    Explore Courses
                </a>
            </div>
        </div>
    </div>

    <!-- Vision & Mission Section -->
    <div class="bg-white py-16">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="bg-blue-50 p-8 rounded-lg shadow-lg">
                    <h2 class="text-3xl font-bold text-blue-600 mb-6">Our Vision</h2>
                    <p class="text-gray-700 leading-relaxed">
                        To be the leading computer education center that transforms students into industry-ready professionals, 
                        fostering innovation and excellence in technology education. We envision a future where every student 
                        has access to quality computer education and the skills needed to succeed in the digital world.
                    </p>
                </div>
                <div class="bg-blue-50 p-8 rounded-lg shadow-lg">
                    <h2 class="text-3xl font-bold text-blue-600 mb-6">Our Mission</h2>
                    <p class="text-gray-700 leading-relaxed">
                        To provide comprehensive, practical-oriented computer education that equips students with the latest 
                        technical skills and industry knowledge. We are committed to creating an inclusive learning environment 
                        that nurtures creativity, critical thinking, and professional growth.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <i class="fas fa-laptop-code text-4xl text-blue-600 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Expert Instructors</h3>
                <p class="text-gray-600">Learn from industry professionals with years of experience.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <i class="fas fa-book text-4xl text-blue-600 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Comprehensive Curriculum</h3>
                <p class="text-gray-600">Well-structured courses covering all essential topics.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <i class="fas fa-users text-4xl text-blue-600 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Small Batch Size</h3>
                <p class="text-gray-600">Personal attention and better learning experience.</p>
            </div>
        </div>
    </div>

    <!-- Instructors Section -->
    <div class="bg-gray-100 py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-blue-600 mb-12">Meet Our Expert Instructors</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($instructors as $instructor): ?>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition duration-300">
                    <div class="relative">
                        <img src="<?php echo htmlspecialchars($instructor['image_url']); ?>" 
                             alt="<?php echo htmlspecialchars($instructor['name']); ?>" 
                             class="w-full h-64 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                            <h3 class="text-xl font-semibold text-white"><?php echo htmlspecialchars($instructor['name']); ?></h3>
                            <p class="text-blue-200"><?php echo htmlspecialchars($instructor['specialization']); ?></p>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm">
                                <?php echo htmlspecialchars($instructor['experience_years']); ?> Years Experience
                            </span>
                        </div>
                        <p class="text-gray-600 mb-4"><?php echo htmlspecialchars($instructor['bio']); ?></p>
                        <div class="flex space-x-4">
                            <a href="mailto:<?php echo htmlspecialchars($instructor['email']); ?>" 
                               class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-envelope"></i>
                            </a>
                            <a href="<?php echo htmlspecialchars($instructor['linkedin_url']); ?>" 
                               target="_blank" 
                               class="text-blue-600 hover:text-blue-800">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="bg-gray-100 py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-blue-600 mb-12">What Our Students Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/1.jpg" alt="Student" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Sarah Johnson</h4>
                            <p class="text-gray-600">Web Development Graduate</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"The web development course at Astra Coaching transformed my career. The practical approach and industry-relevant projects helped me land my dream job."</p>
                    <div class="mt-4 text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Student" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Michael Chen</h4>
                            <p class="text-gray-600">Data Science Graduate</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"The data science program provided me with a strong foundation in machine learning and analytics. The instructors were incredibly supportive throughout my journey."</p>
                    <div class="mt-4 text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/2.jpg" alt="Student" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Emily Rodriguez</h4>
                            <p class="text-gray-600">Python Programming Graduate</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"The Python course was comprehensive and well-structured. I appreciated the hands-on projects and the career guidance provided by the placement team."</p>
                    <div class="mt-4 text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-blue-600 text-white py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-8">Ready to Start Your Journey?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Join hundreds of successful graduates who have transformed their careers with our industry-leading courses.
            </p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <a href="courses.php" class="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-blue-50 transition duration-300">
                    View Courses
                </a>
                <a href="contact.php" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-blue-600 transition duration-300">
                    Contact Us
                </a>
            </div>
        </div>
    </div>

   <?php require_once 'footer.php'; ?>
    <script>
        // Add some animations
        $(document).ready(function() {
            // Fade in elements on scroll
            $(window).scroll(function() {
                $('.animate-fade-in').each(function() {
                    var elementTop = $(this).offset().top;
                    var elementVisible = 150;
                    var windowHeight = $(window).height();
                    var windowTop = $(window).scrollTop();
                    
                    if (elementTop < windowTop + windowHeight - elementVisible) {
                        $(this).addClass('opacity-100');
                    }
                });
            });

            // Testimonial carousel animation
            $('.testimonial-card').hover(
                function() {
                    $(this).find('img').addClass('scale-110');
                },
                function() {
                    $(this).find('img').removeClass('scale-110');
                }
            );
        });
    </script>
</body>
</html> 