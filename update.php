<?php
require './inc/header.php';
require './inc/navbar.php';
require './inc/database.php';
session_start();

if (!isset($_SESSION['Email'])) {
    header("Location: index.php");
    exit();
}

$email = $_SESSION['Email'];

// Fetch current user details
$query = "SELECT FullName, Email, Gender FROM user WHERE Email = ?";
$statement = $conn->prepare($query);
$statement->execute([$email]);
$user = $statement->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];

    try {
        $conn->beginTransaction();

        // Update user details (excluding email)
        $updateUserQuery = "UPDATE user SET FullName = ?, Gender = ? WHERE Email = ?";
        $updateUserStatement = $conn->prepare($updateUserQuery);
        $updateUserStatement->execute([$fullname, $gender, $email]);

        $conn->commit();

        // Update session variables
        $_SESSION['fullname'] = $fullname;
        $_SESSION['gender'] = $gender;

        header("Location: profile.php");
        exit();
    } catch (Exception $e) {
        $conn->rollBack();
        echo "Failed to update profile: " . $e->getMessage();
    }
}
?>

    <style>
        .container{
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form{
            padding: 0px auto;
        }
    </style>
</div>
    <div class="container">
        <h2 class="update-h2">Edit Profile</h2>
        <form method="post" action="">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($user['FullName']); ?>" required>
            
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male" <?php if ($user['Gender'] == 'Male') echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if ($user['Gender'] == 'Female') echo 'selected'; ?>>Female</option>
                <option value="Other" <?php if ($user['Gender'] == 'Other') echo 'selected'; ?>>Other</option>
            </select>
            
            <button type="submit">Save Changes</button>
        </form>
    </div>
    <?php require './inc/footer.php'; ?>