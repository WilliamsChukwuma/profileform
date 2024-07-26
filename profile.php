<?php
require './inc/database.php';
session_start();

if (!isset($_SESSION['Email'])) {
    header("Location: index.php");
    exit();
}

$fullname = $_SESSION['fullname'];
$email = $_SESSION['Email'];
$gender = $_SESSION['gender'];

$query = "SELECT image FROM uploadImages WHERE email = ?";
$statement = $conn->prepare($query);
$statement->execute([$email]);
$imagePath = $statement->fetchColumn();

if (!$imagePath) {
    // Default profile image if no image is uploaded
    $imagePath = "images/pp.png";
}
?>

<!DOCTYPE html>
<h lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}

.navbar {
    top: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.navbar a {
    text-decoration: none;
    font-weight: bolder;
    color: var(--text-color-2);
    padding: auto 16px;
    margin-right: 40px;
}

.navbar a:last-child {
    margin-right: 0;
}

.navbar a:hover {
    border-radius: 30px;
    background-color: #0066cc;
    padding: 10px 30px 10px 30px;
}

.header {
    background-color: #003366;
    color: white;
    padding: 20px;
    height: 50px;
    text-align: center;
}

.parent-container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding-top: 30px;
}

.profile-photo-container {
    display: inline-block;
    border-radius: 50%;
    overflow: hidden;
    width: 100px;
    height: 100px;
    border: 2px solid #003366;
}

.profile-photo {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.add-container, .delete-container, .edit-container, .setting-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.add-container img, .delete-container img, .edit-container img, .settings-container img{
     width: 35px;
    height: 35px; 
    margin: 10px 10px;
    cursor: pointer;
}

.delete-container img{
    width: 33px;
    height: 33px;
}

.edit-container img{
    width: 31px;
    height: 31px;
}

.options-container{
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h1, h2 {
    color: #003366;
    text-align: center;
}

.profile-info {
    margin-bottom: 20px;
}

.profile-info p {
    margin: 5px 0;
    text-align: center;
}

button {
    background-color: #003366;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    display: flex;
    justify-content: center;
    margin: 0 auto;
    text-align: center;
}

button:hover {
    background-color: #0066cc;
}

button a {
    color: white;
    text-decoration: none;
}

footer {
    margin-top: 50px;
    text-align: center;
    color: #fff;
    background-color: #003366;
    padding: 30px;
}

    </style>
</head>
<bo>
    <div class="header">
        <nav class="navbar">
            <a href="profile.php">MY PROFILE</a>
            <a href="settings.php">SETTINGS</a>
            <a href="view.php">VIEW IMAGES</a>
            <a href="contact.php">CONTACT US</a>
        </nav>
    </div>
    <div class="parent-container">
        <div class="profile-photo-container">
            <img src="<?php echo $imagePath; ?>" alt="Profile Photo" class="profile-photo">
        </div>
    </div>

    <div class="options-container">
    <div class="add-container">
        <a href="upload.php"><img src="images/addimg.png" alt="Upload"></a>
    </div>
        <div class="delete-container">
        <a href=""><img onclick="confirmDelete()" src="images/delete.png" alt="Delete"></a>
    </div>
    <div class="edit-container">
        <a href="update.php"><img src="images/edit.png" alt="Edit"></a> 
    </div>
    <div class="settings-container">
        <a href="settings.php"><img src="images/settings.png" alt="Edit"></a> 
    </div>
    </div>
</div>
    
    <div class="container">
        <h2>My Profile</h2>
        <div class="profile-info">
            <p><strong>Full Name:</strong> <?php echo $fullname; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Gender:</strong> <?php echo $gender; ?></p>
        </div>
    </div>
    <button><a href="logout.php">Logout</a></button>
    <script type="text/javascript">
        function confirmDelete() {
            if (confirm("Are you sure you want to delete your profile? This action cannot be undone.")) {
                window.location.href = 'delete.php';
            } else {
                window.location.href = 'profile.php';
            }
        }
    </script>

    <?php require './inc/footer.php'; ?>