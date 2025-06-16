<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Database connection
require_once '../config/db.php';

// Handle instructor deletion
if(isset($_POST['delete_instructor'])) {
    $id = (int)$_POST['instructor_id'];
    $stmt = $conn->prepare("DELETE FROM instructors WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header('Location: dashboard.php?message=Instructor deleted successfully');
    exit;
}

// Fetch all instructors
$instructors = $conn->query("SELECT * FROM instructors ORDER BY name");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - Astra Coaching Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="bg-indigo-800 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
            <a href="index.php" class="text-white flex items-center space-x-2 px-4">
                <i class="fas fa-graduation-cap text-2xl"></i>
                <span class="text-2xl font-extrabold">Astra</span>
            </a>
            <nav>
                <a href="dashboard.php" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-indigo-700 text-white">
                    <i class="fas fa-home mr-2"></i>Dashboard
                </a>
                <a href="instructors.php" class="block py-2.5 px-4 rounded transition duration-200 bg-indigo-900 hover:bg-indigo-900 text-white">
                    <i class="fas fa-chalkboard-teacher mr-2"></i>Instructors
                </a>
                <a href="courses.php" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-indigo-700 text-white">
                    <i class="fas fa-book mr-2"></i>Courses
                </a>
                <a href="messege.php" class="block py-2.5 px-4 rounded transition duration-200  text-white">
                    <i class="fas fa-envelope mr-2"></i>Messages
                </a>
               
                <a href="logout.php" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-indigo-700 text-white">
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
                            <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
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
                <?php if(isset($_GET['message'])): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline"><?php echo htmlspecialchars($_GET['message']); ?></span>
                    </div>
                <?php endif; ?>

                <!-- Instructors Section -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-800">Manage Instructors</h2>
                        <a href="add_instructor.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-200">
                            <i class="fas fa-plus mr-2"></i>Add New Instructor
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Specialization</th>
                                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">phone</th>
                                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Experience</th>
                                    <th class="px-6 py-3 border-b border-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <?php while($instructor = $instructors->fetch_assoc()): ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img class="h-10 w-10 rounded-full object-cover" src="<?php echo htmlspecialchars($instructor['image_url']); ?>" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm leading-5 font-medium text-gray-900">
                                                    <?php echo htmlspecialchars($instructor['name']); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900">
                                            <?php echo htmlspecialchars($instructor['specialization']); ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900">
                                            <?php echo htmlspecialchars($instructor['phone']); ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900">
                                            <?php echo htmlspecialchars($instructor['experience_years']); ?> years
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                        <a href="edit_instructor.php?id=<?php echo $instructor['id']; ?>" class="text-blue-600 hover:text-blue-900 mr-3">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this instructor?');">
                                            <input type="hidden" name="instructor_id" value="<?php echo $instructor['id']; ?>">
                                            <button type="submit" name="delete_instructor" class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Message View Modal -->
    <div id="messageModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900" id="modalTitle"></h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500" id="modalContent"></p>
                </div>
                <div class="items-center px-4 py-3">
                    <button id="closeModal" class="px-4 py-2 bg-indigo-600 text-white text-base font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        document.querySelector('.md\\:hidden').addEventListener('click', function() {
            document.querySelector('.bg-indigo-800').classList.toggle('-translate-x-full');
        });

        // Search functionality
        document.getElementById('search').addEventListener('keyup', function() {
            const searchText = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchText) ? '' : 'none';
            });
        });

        // View message modal
        function viewMessage(id, name, message) {
            document.getElementById('modalTitle').textContent = `Message from ${name}`;
            document.getElementById('modalContent').textContent = message;
            document.getElementById('messageModal').classList.remove('hidden');
        }

        // Close modal
        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('messageModal').classList.add('hidden');
        });
    </script>
</body>
</html>