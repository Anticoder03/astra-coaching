<?php
require_once '../config/db.php';

// Initialize variables
$messages = [];
$error = '';

try {
    // Fetch all messages from database with proper error handling
    $sql = "SELECT * FROM contact_messages ORDER BY created_at DESC";
    $result = $conn->query($sql);
    
    if ($result) {
        while($row = $result->fetch_assoc()) {
            $messages[] = $row;
        }
    } else {
        throw new Exception("Error fetching messages: " . $conn->error);
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}

// Handle message deletion
if (isset($_POST['delete_message'])) {
    $message_id = (int)$_POST['message_id'];
    try {
        $delete_sql = "DELETE FROM contact_messages WHERE id = ?";
        $stmt = $conn->prepare($delete_sql);
        $stmt->bind_param("i", $message_id);
        
        if ($stmt->execute()) {
            header("Location: messages.php?success=Message deleted successfully");
            exit();
        } else {
            throw new Exception("Error deleting message");
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
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
                <a href="instructors.php" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-indigo-700 text-white">
                    <i class="fas fa-chalkboard-teacher mr-2"></i>Instructors
                </a>
                <a href="courses.php" class="block py-2.5 px-4 rounded transition duration-200 bg-indigo-900 hover:bg-indigo-900 text-white">
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
            <header class="bg-white shadow-lg">
                <div class="flex items-center justify-between px-8 py-4">
                    <div class="flex items-center">
                        <button class="text-gray-500 focus:outline-none md:hidden">
                            <i class="fas fa-bars"></i>
                        </button>
                        <h1 class="text-2xl font-bold text-gray-800 ml-4">Messages</h1>
                    </div>
                    <div class="flex items-center">
                        <div class="relative">
                            <button class="flex items-center text-gray-700 focus:outline-none">
                                <img class="h-8 w-8 rounded-full object-cover" src="https://ui-avatars.com/api/?name=Admin&background=6366f1&color=fff" alt="Admin">
                                <span class="mx-2 text-gray-700">Admin</span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Messages Content -->
            <main class="p-8">
                <?php if ($error): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline"><?php echo htmlspecialchars($error); ?></span>
                    </div>
                <?php endif; ?>

                <?php if (isset($_GET['success'])): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline"><?php echo htmlspecialchars($_GET['success']); ?></span>
                    </div>
                <?php endif; ?>

                <!-- Search Bar -->
                <div class="mb-6">
                    <div class="relative">
                        <input type="text" id="search" placeholder="Search messages..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-indigo-500">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>

                <!-- Messages List -->
                <div class="bg-white rounded-lg shadow-md">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php if (empty($messages)): ?>
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No messages found</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($messages as $message): ?>
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=<?php echo urlencode($message['name']); ?>&background=6366f1&color=fff" alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($message['name']); ?></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <?php echo htmlspecialchars($message['email']); ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <?php echo htmlspecialchars($message['phone']); ?>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                <div class="max-w-xs truncate"><?php echo htmlspecialchars($message['message']); ?></div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <?php echo date('M d, Y', strtotime($message['created_at'])); ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <button class="text-indigo-600 hover:text-indigo-900 mr-3" onclick="viewMessage(<?php echo $message['id']; ?>, '<?php echo htmlspecialchars($message['name']); ?>', '<?php echo htmlspecialchars($message['message']); ?>')">
                                                    View
                                                </button>
                                                <form method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                                    <input type="hidden" name="message_id" value="<?php echo $message['id']; ?>">
                                                    <button type="submit" name="delete_message" class="text-red-600 hover:text-red-900">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
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