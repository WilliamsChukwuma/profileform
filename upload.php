<?php
require './inc/header.php';
require './inc/database.php';
session_start();

$uploadSuccess = false; 
$valid_file = true;

if (!isset($_SESSION['Email'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_SESSION['Email'];
    $countfiles = count($_FILES['files']['name']);
    $query = "INSERT INTO uploadImages (email, name, image) VALUES (?, ?, ?)";
    $statement = $conn->prepare($query);

    for ($i = 0; $i < $countfiles; $i++) {
        $filename = $_FILES['files']['name'][$i];
        $target_file = './uploads/' . $filename;
        $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $valid_extension = array("png", "jpeg", "jpg", "webp");

        if (in_array($file_extension, $valid_extension)) {
            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_file)) {
                // Delete old profile picture if exists
                $deleteQuery = "DELETE FROM uploadImages WHERE email = ?";
                $deleteStatement = $conn->prepare($deleteQuery);
                $deleteStatement->execute([$email]);

                // Insert new profile picture
                $statement->execute([$email, $filename, $target_file]);
                $uploadSuccess = true;
            }  
        } else {
            $valid_file = false;
        }
    }

    if ($uploadSuccess) {
        header("Location: profile.php");
        exit();
    }
}
?>

    <style>
        .masthead{
        color: #fff;
    }
        .form-row {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            margin-top: 30px;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        input[type="file"] {
            margin: 10px 0;
        }

        .btn {
            background-color: #003366;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0066cc;
        }

        .message {
            text-align: center;
            margin: 20px 0;
        }

        footer {
            text-align: center;
            color: #fff;
            padding: 30px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <section class="masthead">
        <div>
            <h1>Uploading Image ...</h1>
        </div>
    </section>
    <section class="form-row">
        <form method='post' action='' enctype='multipart/form-data'>
            <p><input type='file' name='files[]' multiple /></p>
            <p><input class="btn" type='submit' value='Submit' name='submit'/></p>
        </form>
        <?php 
        if (!$valid_file) {
            echo "<p>Upload png, jpeg, jpg, webp files only</p>";
        }
        ?>
    </section>
    <?php require './inc/footer.php'; ?>

