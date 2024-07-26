<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Newsletter</title>

    <style>

        :root{
            --primary-color: #57ee12;
    --secondary-color: #2947f5;
    --bg-color: #c9d6ff;
    --text-color: #333;
    --text-color-2: #fff;
    --box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
           }
                 
    
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    color: black;
    background: linear-gradient(180deg, var(--text-color),var(--bg-color), var(--secondary-color));
}

h1, h2 {
    font-weight: bold;
    margin-bottom: 10px;
}

p {
    margin-bottom: 20px;
}

ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

li {
    margin-bottom: 20px;
}

i {
    font-size: 18px;
    margin-right: 10px;
}

button {
    background-color: #0047AB;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #003366;
}

header{
    text-align: center;
    margin-top: 30px;
}

.navbar{
    display: flex;
    justify-content: center;
    align-items: center;
}

.navbar a{
    text-decoration: none;
    font-weight: bolder;
    color: var(--bg-color);
    padding: auto 16px;
    margin-right: 40px;
    /* margin-bottom: 20px; */
}

.navbar a:last-child{
    margin-right: 0;
}

.navbar a:hover{
    border-radius: 30px;
    background-color: var(--secondary-color);
    padding: 10px 30px 10px 30px;
}


/* Main Styles */
main {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
}

.about-us {
    background-color: transparent;
    padding: 20px;
    border: 1px solid #ddd;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

#benefits {
    margin-top: 20px;
}

#benefits ul {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

#benefits li {
    width: 30%;
    margin: 20px;
    padding: 20px;
    border: 1px solid #ddd;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

#benefits button {
    margin-top: 20px;
    margin: 0 auto;
    display: block;
}

img{
    width: 30px;
    height: 30px;
}

footer{
    text-align: center;
    padding: 10px 0;
    width: 100%;
    bottom: 0;
}

    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="profile.php">YOUR PROFILE</a>
            <a href="settings.php">SETTINGS</a>            
            <a href="view.php">VIEW IMAGES</a>
            <a href="contact.php">CONTACT US</a>
           </nav>
    </header>
<main>
        <section class="about-us">
            <h1>SETTINGS</h1>
            <p>This is the settings and about page where all the features of the website will be explained you can call this the help page.</p>
        </section>
        <section id="benefits">
            <h2>Icons and Functions</h2>
            <ul>
                <li>
                    <i class="fas fa-newspaper"></i>
                    <a href="upload.php"><img src="images/addimg.png" alt=""></a>
                    <p>When you login to your profile if you click on this icon you are prompt to add an image to your profile .</p>
                </li>
                <li>
                    <i class="fas fa-lock"></i>
                    <a href="delete.php"><img src="images/delete.png" alt=""></a>
                    <p>When you login to your profile if you click on this icon you are prompt to delete your profile .</p>
                </li>
                <li>
                    <i class="fas fa-tag"></i>
                    <a href="update.php"><img src="images/edit.png" alt=""></a>
                    <p>When you login to your profile if you click on this icon you are prompt to edit your name or gender on your profile .</p>
                </li>
                <li>
                    <i class="fas fa-users"></i>
                    <a href="settings.php"><img src="images/settings.png" alt=""></a>
                    <p>When you login to your profile if you click on this icon you are prompt to this page where you are educated about the website features .</p>
                </li>
                <li>
                    <i class="fas fa-rocket"></i>
                    <button>Logout</button>
                    <p>This button will log you out of the website but won't delete your profile.</p>
                </li>
            </ul>
        </section>
    </main>

    <?php require "./inc/footer.php"; ?>