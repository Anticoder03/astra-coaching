<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Astra Coaching Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <?php require_once 'header.php'; ?>
 

    <!-- Hero Section -->
    <div class="relative bg-blue-600 h-[400px]">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" 
                 class="w-full h-full object-cover opacity-50" alt="About Us">
        </div>
        <div class="relative container mx-auto px-6 py-32">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">About Astra Coaching</h1>
                <p class="text-xl text-white">Empowering minds through quality education since 2010</p>
            </div>
        </div>
    </div>

    <!-- Our Story Section -->
    <div class="container mx-auto px-6 py-16">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-center text-blue-600 mb-12">Our Story</h2>
            <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div>
                        <p class="text-gray-700 leading-relaxed mb-6">
                            Founded in 2010, Astra Coaching Center began with a simple mission: to make quality computer education accessible to everyone. What started as a small classroom with just 20 students has now grown into a premier institution with over 10,000 successful graduates.
                        </p>
                        <p class="text-gray-700 leading-relaxed">
                            Our journey has been marked by continuous innovation, adapting to the ever-evolving tech landscape, and maintaining the highest standards of education. Today, we stand proud as a center of excellence in computer education, recognized for our practical approach and industry-aligned curriculum.
                        </p>
                    </div>
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                             alt="Our Story" class="rounded-lg shadow-lg">
                        <div class="absolute -bottom-4 -right-4 bg-blue-600 text-white p-4 rounded-lg">
                            <p class="text-2xl font-bold">10+</p>
                            <p class="text-sm">Years of Excellence</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Leadership Section -->
    <div class="bg-gray-100 py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-blue-600 mb-12">Our Leadership</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                         alt="Director" class="w-full h-64 object-contain">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Dr. Robert Anderson</h3>
                        <p class="text-blue-600 mb-2">Founder & Director</p>
                        <p class="text-gray-600">PhD in Computer Science with 20+ years of industry experience. Former CTO at TechCorp.</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                         alt="Academic Head" class="w-full h-64 object-contain">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Dr. Sarah Mitchell</h3>
                        <p class="text-blue-600 mb-2">Academic Head</p>
                        <p class="text-gray-600">15+ years of teaching experience. Expert in curriculum development and educational technology.</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                         alt="Technical Director" class="w-full h-64 object-contain">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">James Wilson</h3>
                        <p class="text-blue-600 mb-2">Technical Director</p>
                        <p class="text-gray-600">Former Senior Engineer at Google. Specializes in emerging technologies and innovation.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Stories Section -->
    <div class="container mx-auto px-6 py-16">
        <h2 class="text-3xl font-bold text-center text-blue-600 mb-12">Success Stories</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="flex items-center mb-6">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" 
                         alt="Success Story" class="w-20 h-20 rounded-full mr-4">
                    <div>
                        <h3 class="text-xl font-semibold">Emily's Journey</h3>
                        <p class="text-blue-600">Web Development Graduate, 2020</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4">
                    "After completing the web development course at Astra, I landed a job at a leading tech company. The practical skills and industry exposure I gained were invaluable."
                </p>
                <div class="flex items-center">
                    <span class="text-yellow-400 mr-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </span>
                    <span class="text-gray-600">Current Position: Senior Frontend Developer</span>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-8">
                <div class="flex items-center mb-6">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" 
                         alt="Success Story" class="w-20 h-20 rounded-full mr-4">
                    <div>
                        <h3 class="text-xl font-semibold">Michael's Achievement</h3>
                        <p class="text-blue-600">Data Science Graduate, 2021</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-4">
                    "The data science program at Astra gave me the perfect foundation to start my career. I'm now working on cutting-edge AI projects at a Fortune 500 company."
                </p>
                <div class="flex items-center">
                    <span class="text-yellow-400 mr-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </span>
                    <span class="text-gray-600">Current Position: Data Scientist</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Certifications Section -->
    <div class="bg-gray-100 py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-blue-600 mb-12">Our Certifications & Accreditations</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <img src="./iso-logo.jpeg" 
                         alt="ISO Certification" class="w-24 h-24 mx-auto mb-4">
                    <h3 class="font-semibold mb-2">ISO 9001:2015</h3>
                    <p class="text-gray-600">Quality Management System</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <img src="https://neoris.com/documents/20126/0/microsoft-partner.png/2a24c120-4d74-ae8b-1503-50e891d4371f?version=1.0&t=1635541712252&imagePreview=1" 
                         alt="Microsoft Partner" class="w-auto h-24 mx-auto mb-4">
                    <h3 class="font-semibold mb-2">Microsoft Partner</h3>
                    <p class="text-gray-600">Authorized Training Center</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <img src="https://www.awsacademy.com/webruntime/org-asset/f9492bf158/resource/0814N0000019OPK/images/logo.png" 
                         alt="AWS Academy" class="w-auto h-24 mx-auto mb-4">
                    <h3 class="font-semibold mb-2">AWS Academy</h3>
                    <p class="text-gray-600">Cloud Computing Education</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <img src="https://j2i8z3j6.delivery.rocketcdn.me/wp-content/uploads/sites/3/2022/08/google-partner-logo-1.png.webp" 
                         alt="Google Partner" class="w-24 h-24 mx-auto mb-4">
                    <h3 class="font-semibold mb-2">Google Partner</h3>
                    <p class="text-gray-600">Digital Skills Training</p>
                </div>
            </div>
        </div>
    </div>

   <?php require_once 'footer.php'; ?>

    <script>
        // Add animations
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

            // Add hover effect to certification cards
            $('.certification-card').hover(
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