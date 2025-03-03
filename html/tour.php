<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Dating Signup</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Atkinson+Hyperlegible+Next:ital,wght@0,200..800;1,200..800&family=Dancing+Script:wght@400..700&display=swap"
        rel="stylesheet">
    <style>
        .button.is-style-premium {
            text-decoration: none;
        }

        .t-header {
            font-family: Arial, sans-serif;
            background-image: url('../images/tour1.jpg');
            background-size: cover;
            padding: 50px;
            width: 100%;
            box-sizing: border-box;
            max-height: 600px;
            display: flex;
            justify-content: flex-start;
        }

        .container {
            background: #32825a;
            color: white;
            padding: 20px;
            width: 350px;
            border-radius: 10px;
        }

        #formSection input {
            width: 90% !important;
        }

        #formSection button {
            width: 97% !important;
            background: linear-gradient(90deg, #ef6054, #f89637);
            color: black;
            border: none;
            font-size: 28px;
            cursor: pointer;
            font-family: "Dancing Script", serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;

        }


        .container h2 {
            font-family: "Dancing Script", serif;
            font-optical-sizing: auto;
            font-weight: bolder;
            font-style: normal;
            font-size: 42px;
            text-align: center
        }

        .first {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .left,
        .right {
            width: 48%;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            padding: 10px;
            background: white;
            color: black;
            border-radius: 5px;
            margin-bottom: 5px;
            cursor: pointer;
        }

        input,
        button {
            /* width: 90%; */
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
        }

        .hidden {
            display: none;
        }

        .first label {
            margin-top: 10px;
            margin-bottom: 10px;
            display: flex;
        }

        .second-main {
            /* background-color: red; */
            display: flex;
            justify-content: center;
            background: #fdf9f6;
        }

        .t-second {
            width: 80%;
            margin-bottom: 50px;
        }

        .t-second h1 {
            font-size: 56px;
            margin-top: 50px;
            margin-bottom: 20px;
        }

        .t-second p {
            line-height: 1.2;
            margin: 0 0 1.2em;
            padding: 0 !important;
            font-size: 20px;
        }

        .t-secondp ul li {
            cursor: default;
            background-color: #b3d9c6;
        }

        .t-secondp ul li:first-child {
            font-size: 32px;
            margin-bottom: 8px;
            font-weight: bolder;

        }

        .t-secondp ul li a {
            color: rgb(44, 69, 56);
            display: block;
            font-style: 28px !important;
            text-decoration: none;
            /* font-size: 24px; */
            /* line-height: 1;
            overflow: hidden;
            padding: 8px 0 8px 24px;
            position: relative;
            text-decoration: none; */


        }

        .t-secondp ul li a:hover {
            text-decoration: underline;


        }

        .t-secondp ul li ::before {
            content: ">";
            margin-right: 10px;

        }

        /*******---------------------- */
        .t-hird {
            width: 100%;
            display: flex;
            justify-content: center;
            display: flex;
        }

        .t-thirdd h1 {
            /* background-color:  red; */
            text-align: center;
            padding: 30px;
        }

        .t-thirdd {
            background: #fdf9f6;

        }

        .t-thirdMain {
            width: 80%;
            display: flex;
            flex-wrap: wrap;
            gap: 46px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .t-thirdMain section {
            flex: 1 1 30%;
            box-sizing: border-box;
            border-radius: 10px;

            margin-bottom: 20px;
            height: auto;
        }

        .t-thirdMain section h2 {
            margin-top: 20px;
            font-size: 22px;
            font-weight: bold;
            text-align: center;
        }

        .t-thirdMain section p {
            font-size: 18px;
            line-height: 1.6;
            text-align: center;
            margin-top: 10px;
        }

        #image-third {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
            border: 5px solid #b3d9c6;
        }

        #t-thirdH1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
        }

        @media (max-width: 768px) {
            .t-thirdMain {
                flex-direction: column;
                width: 100%;
                gap: 20px;
            }

            .t-thirdMain section {
                width: 100%;
                height: auto;
            }

            #t-thirdH1 {
                font-size: 24px;
            }

            .t-thirdMain section p {
                font-size: 16px;
            }
        }

        /****************** */
        .hero-section {
            display: flex;
            background-color: #2D7A4D;
            color: white;
            padding: 20px;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .video-container {
            flex: 1;
            min-width: 300px;
        }

        .video-container iframe {
            border-radius: 10px;
        }

        .cta-container {
            flex: 1;
            padding: 20px;
            min-width: 300px;
        }

        .join-btn {
            background: linear-gradient(90deg, #ef6054, #f89637);
            box-shadow: 0 2px 10px rgba(0, 0, 0, .25);
            border-radius: 7px;
            color: white;
            padding: 15px;
            font-size: 22px;
            margin-top: 20px;
            font-weight: bolder;
            border: none;
            cursor: pointer;
            font-family: "Dancing Script", serif;

        }

        .info-section {
            background: linear-gradient(90deg, #FF6B6B, #FF9052);
            color: white;
            padding: 40px;
            display: flex;
        }

        .info-first {
            width: 50%;
        }

        .info-first img {
            width: 90%;
            height: 100%;
        }

        .premium-btn {
            padding: 10px 20px;
            border: none;

            border-radius: 5px;
            cursor: pointer;
            background: linear-gradient(90deg, #ef6054, #f89637);
            box-shadow: 0 2px 10px rgba(0, 0, 0, .25);
            color: #fffaf5;
            border-radius: 7px;
            font-family: "Dancing Script", serif;
            font-size: 22px;
            margin-top: 20px;
            font-weight: bolder;
            border: none;
        }

        .info-second p {
            line-height: 25px;
        }

        /*****************chhose your memeber ship plan************************* */

        .membership-section h2 {
            color: #2d7a4d;
        }

        .membership-section p {
            max-width: 800px;
            margin: 0 auto 20px;
            .membership
        }

        .membership-section a {
            color: #ff6b6b;
            text-decoration: none;
        }

        .membership-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
        }

        .membership-section h2 {
            padding: 20px;
            font-size: 33px;
        }

        .membership-card {
            border: 2px solid;
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .basic {
            border-color: #2d7a4d;
        }

        .premium {
            border-color: #ff6b6b;
        }

        h3 {
            margin: 0 0 10px;
            padding: 10px 0;
        }

        .basic h3 {
            background: #2d7a4d;
            color: white;
            border-radius: 5px;
        }

        .premium h3 {
            background: #ff6b6b;
            color: white;
            border-radius: 5px;
        }

        ul {
            list-style: none;
            padding: 0;
            text-align: left;
        }

        li {
            padding: 5px 0;
        }

        .start-btn {
            background: #ff6b6b;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .start-btn:hover {
            background: #ff9052;
        }

        .t-foue {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fdf9f6;
            text-align: center;
            padding: 20px;
        }

        .navbar {
            position: absolute;
            top: 0;
            width: 100%;
            display: flex;
            justify-content: flex-end;
            padding: 20px 50px;
            /* background: rgba(0, 0, 0, 0.5); */
            color: #fff;
            font-size: 18px;
            z-index: 2;
            margin-top: 30px;
            left: -109px;
        }

        .navbar a {
            margin-left: 30px;
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
            font-weight: bolder;
            font-size: 22px;
        }

        .navbar a:hover {
            color: #ffa500;
        }
    </style>
</head>

<body>
    <!-- header are here-->
    <?php
    include("header.php");
    ?>
    <div class="t-header">
        <div class="container">
            <h2>Start <span style="color: red;">Free</span> Today</h2>

            <div class="first">
                <div class="left">
                    <label>I am:</label>
                    <ul>
                        <li> <input type="radio" name="identity" value="a woman"> A Woman</li>
                        <li> <input type="radio" name="identity" value="a man"> A Man</li>
                    </ul>
                </div>
                <div class="right">
                    <label>Looking for:</label>
                    <ul>
                        <li> <input type="radio" name="preference" value="a woman"> A Woman</li>
                        <li> <input type="radio" name="preference" value="a man"> A Man</li>
                    </ul>
                </div>
            </div>

            <div id="formSection" class="hidden">
                <input type="email" id="email" placeholder="Enter your email ID" required><br>
                <input type="password" id="password" placeholder="Create password" required><br>
                <button id="joinBtn">Join Now</button>
            </div>
        </div>
        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="datingAdvance.php">Dating Advice</a>
            <a href="#">Singles Near Me</a>
            <a href="#">Log in</a>l
        </div>
    </div>

    <script>
        document.querySelectorAll('input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', () => {
                const identity = document.querySelector('input[name="identity"]:checked');
                const preference = document.querySelector('input[name="preference"]:checked');

                if (identity && preference) {
                    document.getElementById('formSection').classList.remove('hidden');
                }
            });
        });

        document.getElementById('joinBtn').addEventListener('click', () => {
            const identity = document.querySelector('input[name="identity"]:checked').value;
            const preference = document.querySelector('input[name="preference"]:checked').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (email && password) {
                fetch('insert.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `identity=${identity}&preference=${preference}&email=${email}&password=${password}`
                })
                    .then(response => response.text())
                    .then(data => alert(data))
                    .catch(error => console.error('Error:', error));
            } else {
                alert('Please enter email and password.');
            }
        });
    </script>
    <!-----Get who gets you, on Movie Dating--------->
    <div class="second-main">
        <div class="t-second">
            <h1>Get who gets you, on Movie Dating</h1>
            <p>With Movie Dating, you’re more than just a profile picture. You’re more than a list of what you like and
                what
                you don’t. Our personality matching takes a deep dive into what makes you unique – then finds someone
                who just gets you.</p>
            <div class="t-secondp">
                <ul>
                    <li>Let’s get started</li>
                    <li><a href="">How Movie Dating works</a></li>
                    <li><a href="">What makes Movie dating different? How we help you find real love</a></li>
                    <li><a href="">Check out our Movie dating love stories</a></li>
                    <li><a href="">Reasons to choose MOvie Dating</a></li>
                    <li><a href="">why you choose your membership</a></li>
                </ul>
            </div>
        </div>
    </div>


    <!-----Get who gets you, on Movie Dating--------->

    <div class="t-thirdd">
        <h1>How Movie Dating works</h1>
        <div class="t-hird">
            <div class="t-thirdMain">
                <section><img
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTEPKb_-spfz5_n_ck1WtiXQaktJUbY3Z5dw&s"
                        alt="" id="image-third">
                    <h2>1. Discover
                        the real you</h2>
                    <p>Take our Compatibility Quiz and find out what matters most to you in a relationship – your
                        values,
                        your needs and how you communicate. Your answers help us find the members you’re most likely to
                        hit
                        it off with.</p>
                </section>
                <section><img
                        src="https://c8.alamy.com/comp/HGTP09/side-view-of-young-romantic-wedding-couple-holding-face-to-face-outdoors-HGTP09.jpg"
                        alt="" id="image-third">
                    <h2>2. See who’s on Movie Dating Website</h2>
                    <p>In your Discover list, you’ll find all the Movie Dating members who fit your search criteria.
                        Each
                        member
                        you see will display a Compatibility Score based on how likely you are to hit it off. Your
                        Discover
                        list will be updated whenever new members join, so good you’ll never miss a chance to connect.
                    </p>
                </section>
                <section><img
                        src="https://img.freepik.com/free-photo/man-holds-tender-beautiful-woman-standing-with-her-green-field-with-red-poppies_8353-7578.jpg?semt=ais_hybrid"
                        alt="" id="image-third">
                    <h2>3. Connect with someone new</h2>
                    <p>Not sure where to start? We’ve made it easy: just find someone you like and make the first move
                        with
                        our quick and easy communication features. Send a message to get the conversation started. </p>
                </section>
            </div>

        </div>
    </div>

    <!-----------Tusted dating app------------------>
    <div class="hero-section">
        <div class="video-container">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/video-id" frameborder="0"
                allowfullscreen></iframe>
        </div>
        <div class="cta-container">
            <h2>Experience Movie Dating</h2>
            <p>Find out how we explore the key dimensions of your personality and use those to help you meet people
                you’ll connect more authentically with.</p>
            <button class="join-btn">Join Now</button>
        </div>
    </div>
    <!------------------------------Experience Movie Dating--------------------->
    <div class="info-section">
        <div class="info-first">
            <img src="../images/real-Love.jpg" alt="">
        </div>

        <div class="info-second">
            <h2>What makes Movie Dating different?<br>How we help you find real love</h2>
            <p>On Movie Dating, you’re more than just a profile picture. Here’s how our unique Compatibility Matching
                System
                takes a deep dive into your personality to help you find authentic connections:</p>
            <ul>
                <li>Every new member takes our Compatibility Quiz to tell us what you’re looking for in a partner.</li>
                <li>Quiz answers create your unique Personality Profile, helping you learn more about yourself and what
                    you
                    want in a relationship.</li>
            </ul>
            <p>We believe love happens when two people connect based on what really matters. If you’re ready to find
                out,
                sign up today.</p>
            <button class="premium-btn">Get Premium Membership</button>
        </div>
    </div>
    <!-----------/*****************chhose your memeber ship plan************************* */-->
    <div class="t-foue">
        <div class="membership-section">
            <h2>Choose your membership</h2>
            <p>Love can happen at first sight but, let’s face it, for most of us it takes a little longer. That’s why
                our memberships are designed to give you all the time you need to get to know your matches. See which
                one fits you best and find out more about what <a href="#">Movie Dating costs</a> or each membership
                type.</p>

            <div class="membership-container">
                <div class="membership-card basic">
                    <h3>Movie Dating basic</h3>
                    <ul>
                        <li>✔ Access to millions of relationship-minded singles</li>
                        <li>✔ Unlimited matches</li>
                        <li>✔ Use all messaging tools</li>
                        <li>✔ Limited messaging</li>
                    </ul>
                </div>
                <div class="membership-card premium">
                    <h3>Movie Dating premium</h3>
                    <ul>
                        <li>✔ Access to millions of relationship-minded singles</li>
                        <li>✔ Unlimited matches</li>
                        <li>✔ Use all messaging tools</li>
                        <li>✔ Unlimited messaging</li>
                        <li>✔ See all members' photos</li>
                        <li>✔ See who’s viewed you</li>
                        <li>✔ Your unique Personality Profile</li>
                        <li>✔ Change your search settings</li>
                        <li>✔ Dedicated customer service</li>
                    </ul>
                </div>
            </div>

            <button class="start-btn">Get started now!</button>
        </div>
    </div>
    <!---------------------footer-------------------------------->
    <?php 
    include("footer.php")
    ?>
</body>

</html>