<?php
require_once 'config/db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $message_text = $_POST['message'] ?? '';

    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, phone, message) VALUES (?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("ssss", $name, $email, $phone, $message_text);
        if ($stmt->execute()) {
            $message = "Thank you for your message! We'll get back to you soon.";
        } else {
            $message = "Sorry, there was an error sending your message. Please try again later.";
        }
    } else {
        $message = "Sorry, there was an error preparing your message. Please try again later.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Astra Coaching Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
   <?php require_once 'header.php'; ?>

    <!-- Contact Section -->
    <div class="container mx-auto px-6 py-16">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl font-bold text-center mb-12 text-blue-600">Contact Us</h1>
            
            <?php if ($message): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-8" role="alert">
                <span class="block sm:inline"><?php echo htmlspecialchars($message); ?></span>
            </div>
            <?php endif; ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Contact Form -->
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h2 class="text-2xl font-semibold mb-6">Send us a Message</h2>
                    <form action="contact.php" method="POST" class="space-y-6">
                        <div>
                            <label for="name" class="block text-gray-700 mb-2">Full Name</label>
                            <input type="text" id="name" name="name" required
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 mb-2">Email Address</label>
                            <input type="email" id="email" name="email" required
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label for="phone" class="block text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" id="phone" name="phone" required
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                        <div>
                            <label for="message" class="block text-gray-700 mb-2">Message</label>
                            <textarea id="message" name="message" rows="4" required
                                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"></textarea>
                        </div>
                        <button type="submit" 
                                class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">
                            Send Message
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h2 class="text-2xl font-semibold mb-6">Contact Information</h2>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-blue-600 mt-1 mr-4"></i>
                            <div>
                                <h3 class="font-semibold">Address</h3>
                                <p class="text-gray-600">123 Education Street, Tech City, TC 12345</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-phone text-blue-600 mt-1 mr-4"></i>
                            <div>
                                <h3 class="font-semibold">Phone</h3>
                                <p class="text-gray-600">+1 (555) 123-4567</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-envelope text-blue-600 mt-1 mr-4"></i>
                            <div>
                                <h3 class="font-semibold">Email</h3>
                                <p class="text-gray-600">info@astracoaching.com</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-clock text-blue-600 mt-1 mr-4"></i>
                            <div>
                                <h3 class="font-semibold">Working Hours</h3>
                                <p class="text-gray-600">Monday - Friday: 9:00 AM - 6:00 PM</p>
                                <p class="text-gray-600">Saturday: 9:00 AM - 1:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <?php require_once 'footer.php'; ?>

    <script>
        // Form validation and animation
        $(document).ready(function() {
            $('form').on('submit', function(e) {
                const name = $('#name').val();
                const email = $('#email').val();
                const phone = $('#phone').val();
                const message = $('#message').val();

                if (!name || !email || !phone || !message) {
                    e.preventDefault();
                    alert('Please fill in all fields');
                }
            });

            // Add animation to form inputs
            $('input, textarea').focus(function() {
                $(this).parent().addClass('transform scale-105 transition-transform duration-300');
            }).blur(function() {
                $(this).parent().removeClass('transform scale-105');
            });
        });
    </script>
</body>
</html> 