<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Database connection
require_once '../config/db.php';

$message = '';
$error = '';
$instructor = null;

// Get instructor ID from URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    $stmt = $conn->prepare("SELECT * FROM instructors WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $instructor = $result->fetch_assoc();

    if (!$instructor) {
        header('Location: dashboard.php?error=Instructor not found');
        exit;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $specialization = $_POST['specialization'] ?? '';
    $experience_years = (int)($_POST['experience_years'] ?? 0);
    $bio = $_POST['bio'] ?? '';
    $email = $_POST['email'] ?? '';
    $image_url = $_POST['image_url'] ?? '';

    if (empty($error)) {
        $stmt = $conn->prepare("UPDATE instructors SET name = ?, specialization = ?, experience_years = ?, bio = ?, email = ?, image_url = ? WHERE id = ?");
        $stmt->bind_param("ssisssi", $name, $specialization, $experience_years, $bio, $email, $image_url, $id);

        if ($stmt->execute()) {
            header('Location: dashboard.php?message=Instructor updated successfully');
            exit;
        } else {
            $error = "Failed to update instructor.";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Instructor - Astra Coaching</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="bg-blue-800 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
            <div class="flex items-center space-x-2 px-4">
                <i class="fas fa-graduation-cap text-2xl"></i>
                <span class="text-2xl font-extrabold">Admin Panel</span>
            </div>
            <nav>
                <a href="dashboard.php" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                    <i class="fas fa-home mr-2"></i>Dashboard
                </a>
                <a href="instructors.php" class="block py-2.5 px-4 rounded transition duration-200 bg-blue-900 text-white">
                    <i class="fas fa-chalkboard-teacher mr-2"></i>Instructors
                </a>
                <a href="courses.php" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                    <i class="fas fa-book mr-2"></i>Courses
                </a>
                <a href="logout.php" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Navigation -->
            <div class="bg-white shadow-lg">
                <div class="container mx-auto px-6 py-3">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">Edit Instructor</h1>
                        </div>
                        <div class="flex items-center">
                            <span class="text-gray-600 mr-4">Welcome, Admin</span>
                            <a href="logout.php" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="container mx-auto px-6 py-8">
                <?php if($error): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline"><?php echo htmlspecialchars($error); ?></span>
                    </div>
                <?php endif; ?>

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <form method="POST" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="name" required value="<?php echo htmlspecialchars($instructor['name']); ?>"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Specialization</label>
                                <input type="text" name="specialization" required value="<?php echo htmlspecialchars($instructor['specialization']); ?>"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Experience (years)</label>
                                <input type="number" name="experience_years" required min="0" value="<?php echo htmlspecialchars($instructor['experience_years']); ?>"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" required value="<?php echo htmlspecialchars($instructor['email']); ?>"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Profile Image URL</label>
                                <div class="mt-2 flex items-center space-x-4">
                                    <img src="<?php echo htmlspecialchars($instructor['image_url']); ?>" alt="Current profile" class="h-20 w-20 rounded-full object-cover">
                                    <input type="url" name="image_url" required value="<?php echo htmlspecialchars($instructor['image_url']); ?>"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                        placeholder="https://example.com/image.jpg">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Bio</label>
                            <textarea name="bio" rows="4" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"><?php echo htmlspecialchars($instructor['bio']); ?></textarea>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <a href="dashboard.php" 
                                class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Cancel
                            </a>
                            <button type="submit"
                                class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Update Instructor
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
