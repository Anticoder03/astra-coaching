<?php
require_once 'config/db.php';

$courses = [];
$result = $conn->query("SELECT * FROM courses ORDER BY id");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses - Astra Coaching Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
  <?php require_once 'header.php'; ?>

    <!-- Courses Section -->
    <div class="container mx-auto px-6 py-16">
        <h1 class="text-4xl font-bold text-center mb-12 text-blue-600">Our Courses</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Web Development Course -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition duration-300">
                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&auto=format&fit=crop&w=1352&q=80" 
                     alt="Web Development" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Web Development</h3>
                    <p class="text-gray-600 mb-4">Learn modern web development with HTML, CSS, JavaScript, and popular frameworks.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-blue-600 font-semibold">Duration: 6 months</span>
                        <a href="contact.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
                            Enroll Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- Python Programming -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition duration-300">
                <img src="https://images.unsplash.com/photo-1526379879527-8559ecfcaec4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                     alt="Python Programming" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Python Programming</h3>
                    <p class="text-gray-600 mb-4">Master Python programming from basics to advanced concepts and applications.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-blue-600 font-semibold">Duration: 4 months</span>
                        <a href="contact.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
                            Enroll Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- Data Science -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition duration-300">
                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                     alt="Data Science" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Data Science</h3>
                    <p class="text-gray-600 mb-4">Learn data analysis, machine learning, and statistical methods.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-blue-600 font-semibold">Duration: 8 months</span>
                        <a href="contact.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
                            Enroll Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- Mobile App Development -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition duration-300">
                <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                     alt="Mobile App Development" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Mobile App Development</h3>
                    <p class="text-gray-600 mb-4">Create iOS and Android apps using modern development tools and frameworks.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-blue-600 font-semibold">Duration: 6 months</span>
                        <a href="contact.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
                            Enroll Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- Digital Marketing -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition duration-300">
                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                     alt="Digital Marketing" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Digital Marketing</h3>
                    <p class="text-gray-600 mb-4">Master SEO, social media marketing, and digital advertising strategies.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-blue-600 font-semibold">Duration: 3 months</span>
                        <a href="contact.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
                            Enroll Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- Cybersecurity -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition duration-300">
                <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                     alt="Cybersecurity" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Cybersecurity</h3>
                    <p class="text-gray-600 mb-4">Learn network security, ethical hacking, and security best practices.</p>
                    <div class="flex justify-between items-center">
                        <span class="text-blue-600 font-semibold">Duration: 6 months</span>
                        <a href="contact.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
                            Enroll Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'footer.php'; ?>

    <script>
        // Add animation to course cards
        $(document).ready(function() {
            $('.course-card').hover(
                function() {
                    $(this).find('img').css('transform', 'scale(1.1)');
                },
                function() {
                    $(this).find('img').css('transform', 'scale(1)');
                }
            );
        });
    </script>
</body>
</html> 