<!DOCTYPE html>
<ht>
<head>
    <style>
        :root{
            --primary-color: #ffd5af;
            --secondary-color: #e59a59;
            --tertiary-color: #888870;
            --final-color: #712e1e;
           }
           
           *{
               margin: 0;
               padding: 0;
           }
           
           body {
            color: black;
            padding: 20px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color), #ffd5af);
        }

           header{
               text-align: center;
               margin-top: 30px;
               /* margin-bottom: 20px; */
           }
        
           .navbar{
               display: flex;
               justify-content: center;
               align-items: center;
           }
           
           .navbar a{
               text-decoration: none;
               font-weight: bolder;
               color: var(--final-color);
               padding: auto 16px;
               margin-right: 40px;
               /* margin-bottom: 20px; */
           }
           
           .navbar a:last-child{
               margin-right: 0;
           }
           
           .navbar a:hover{
               border-radius: 30px;
               background-color: var(--tertiary-color);
               padding: 10px 30px 10px 30px;
           }

        h1 {
            color: black;
            text-align: center;
            padding-top: 30px;
        }
       
        p{
            margin-top: 20px;
            font-size: large;
            text-align: center;
            font-weight: bolder;
        }

        
footer{
    text-align: center;
    padding: 10px auto;
    width: 100%;
    bottom: 0;
    position: fixed;
}

footer small{
    text-align: center;
    margin: 10px auto;
}
    </style>
</head>
<bo>
    <header>
        <nav class="navbar">
         <a href="profile.php">YOUR PROFILE</a>
         <a href="settings.php">SETTINGS</a>            
         <a href="view.php">VIEW IMAGES</a>
         <a href="contact.php">CONTACT US</a>
        </nav>
    </header>

    <h1>Contact Us</h1>
    <p>We're here to help! If you have any questions, feedback, or need assistance, please don't hesitate to get in touch with us.</p>
    <p>You can reach us via email at <a href="mailto:chukwumawilliams20@gmail.com"> REACH OUT TO US </a>. We strive to respond to all inquiries within 24 hours.</p>
    <p>Thank you for your interest in our services!</p>

    <?php require "./inc/footer.php"; ?>