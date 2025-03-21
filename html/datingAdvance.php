<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dating Advice</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Atkinson+Hyperlegible+Next:ital,wght@0,200..800;1,200..800&family=Dancing+Script:wght@400..700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <style>
          .navbar {
        width: 100%;
        background-color: #333;
        padding: 20px 0;
        display: flex;
        justify-content: flex-end;
    }

    .navbar a {
        text-decoration: none;
        color: white;
        margin: 0 15px;
        font-size: 22px;

    }

    .navbar a:hover {
        color: orange;
    }

        .mm-coursel {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; */
            background-color: #fdf9f6;
        }

        .m-carousel {
            position: relative;
            width: 85%;
            /* max-width: 800px; */
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 10px;
        }

        .m-carousel-item {
            display: none;
            position: relative;
        }

        .m-carousel-item img {
            width: 100%;
            display: block;
            height: 400px;
            border-radius: 10px;
        }

        .m-carousel-item h1 {
            position: absolute;
            top: 10px;
            left: 20px;
            color: #fff;
            background: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 5px;
            right: 20px;
        }

        .m-carousel-controls {
            text-align: center;
            margin-top: 20px;
            position: absolute;
            background: #96d296;
            padding: 20px;
            border-radius: 10px;
            /* bottom: 0; */
            margin-top: 24%;
        }

        .m-carousel-controls button {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 10px;
        }

        .m-carousel-controls button:hover {
            background: #0056b3;
        }

        /*888888888888888888888*/
        .d-second {
            font-family: Arial, sans-serif;
            background-color: #fdfaf5;
            /* padding: 20px; */
        }

        .d-second h1 {
            text-align: center;
            padding: 20px;
            font-size: 33px;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            width: 85%;
            margin-left: 7.5%;
        }

        .card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 20px;
        }

        .card-content h2 {
            text-wrap: balance;
            font-size: 32px;
            /* font-weight: 500; */
            line-height: 1;
        }

        .highlight {
            background-color: #2d8267;
            color: #fff;
        }

        .highlight .card-content button {
            background-color: #fff;
            color: #2d8267;
        }

        h2 {
            margin-bottom: 10px;
        }

        p {
            font-size: 14px;
            color: #555;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #2d8267;
            color: #fff;
            cursor: pointer;
            margin-top: 10px;
        }

        .see-all {
            text-align: center;
            margin-top: 20px;
            padding-bottom: 25px;
            padding-top: 10px;
        }

        .see-all a {
            text-decoration: none;
            color: #2d8267;
            font-weight: bold;
        }

        /*88888888888888888888888888888888888888888888888888/*/
        .hero {
            background: linear-gradient(135deg, #ff7b42, #ffaf3e);
            color: #fff;
            text-align: center;
            padding: 40px 20px;
            border-radius: 10px;
            padding: 80px 20px;


        }

        .hero h1 {
            font-family: "Arima", serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
        }

        .hero i {
            font-size: 22px;
        }

        .d-four h2 {
            font-size: 2em;
            text-align: center;
            padding: 20px;
        }

        .hero button {
            padding: 10px 20px;
            background-color: #fffaf5;
            color: #ff7b42;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding: 20px;
            font-size: 22px;
            margin-top: 20px;
            font-family: "Arima", serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 20px;
        }

        .see-all {
            text-align: center;
            margin-top: 20px;
        }

        .see-all a {
            text-decoration: none;
            color: #2d8267;
            font-weight: bold;
        }
    </style>
</head>

<body>
<?php include("header.php") ?>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="tour.php">Tour</a>
        <a href="datingAdvance.php">Dating Advice</a>
        <a href="singlesNear.php">Singles Near Me</a>
        <a href="CustLogin.php">Log in</a>
    </div>
    <div class="mm-coursel">
        <div class="m-carousel">
            <div class="m-carousel-item" style="display: block;">
                <img src="https://rukminim2.flixcart.com/image/850/1000/poster/k/q/y/medium-ppr-21-couple-love-hd-poster-original-imaeru9jmn6zxphf.jpeg?q=90&crop=false/800x400?nature"
                    alt="Random Image 1">
                <h1>Online dating profile tips: make your profile work for you</h1>
            </div>
            <div class="m-carousel-item">
                <img src="https://rukminim2.flixcart.com/image/850/1000/jqmnv680/poster/n/u/z/medium-pwl-dance-love-romantic-wall-poster-13-19-inches-matte-original-imaek7n5zw4geahm.jpeg?q=90&crop=false/800x400?city"
                    alt="Random Image 2">
                <h1>How to start a conversation on a dating app</h1>
            </div>
            <div class="m-carousel-item">
                <img src="https://t3.ftcdn.net/jpg/03/88/14/58/360_F_388145841_3u4Allmhc3j4fmfsWIQd7R6djMJb235v.jpg?q=90&crop=false/800x400?ocean"
                    alt="Random Image 3">
                <h1>what is compatibility in a relationship and how to nurture it</h1>
            </div>
            <div class="m-carousel-item">
                <img src="https://cdn.pixabay.com/photo/2021/11/15/05/54/couple-6796433_1280.jpg?q=90&crop=false/800x400?forest"
                    alt="Random Image 4">
                <h1>how to keep the converstion going in the right direction</h1>
            </div>
            <div class="m-carousel-item">
                <img src="https://wallpapers.com/images/hd/single-1080-x-1920-background-qliel6f54xn5qmfv.jpg?q=90&crop=false/800x400?forest"
                    alt="Random Image 5">
                <h1>"why am i single ?"</h1>
            </div>
        </div>
        <div class="m-carousel-controls">
            <button class="m-prev">&#9664;</button>
            <button class="m-next">&#9654;</button>
        </div>
    </div>
    <script>
        const items = document.querySelectorAll('.m-carousel-item');
        let currentIndex = 0;

        function showSlide(index) {
            items.forEach((item, i) => {
                item.style.display = i === index ? 'block' : 'none';
            });
        }

        document.querySelector('.m-prev').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            showSlide(currentIndex);
        });

        document.querySelector('.m-next').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % items.length;
            showSlide(currentIndex);
        });
    </script>
    <!-------------------------------------------------------------------->
    <div class="d-second">
        <h1>Dating</h1>
        <div class="container">
            <div class="card">
                <img src="https://w0.peakpx.com/wallpaper/16/99/HD-wallpaper-love-couple-forever-heart-sweet-true-love.jpg"
                    alt="Couple">
                <div class="card-content">
                    <h2>Learnings to Keep in Mind</h2>
                    <p>When Dating Outside Your Race</p>
                </div>
            </div>
            <div class="card highlight">
                <img src="https://images.pexels.com/photos/1464565/pexels-photo-1464565.jpeg?cs=srgb&dl=pexels-wildlittlethingsphoto-1464565.jpg&fm=jpg"
                    alt="Group at bar">
                <div class="card-content">
                    <h2>Dating rules: 8 crucial rules</h2>
                    <p>for how to date in 2025</p>
                    <p>You might wonder what the dating rules are in 2025...</p>
                    <button>Tell me more</button>
                </div>
            </div>
            <div class="card">
                <img src="https://i0.wp.com/www.youareunltd.com/site/wp-content/uploads/2018/12/8230459997_cf030ab5fa_z.jpg?resize=640%2C424&ssl=1"
                    alt="Couple with wheelchair">
                <div class="card-content">
                    <h2>Dating with Disabilities:</h2>
                    <p>Overcoming Common Challenges</p>
                </div>
            </div>
            <div class="card highlight">
                <img src="https://i0.wp.com/www.youareunltd.com/site/wp-content/uploads/2018/12/8230459997_cf030ab5fa_z.jpg?resize=640%2C424&ssl=1"
                    alt="Flirting couple">
                <div class="card-content">
                    <h2>How to Flirt: 10 Tips to Help You</h2>
                    <p>Snag That Special Someone</p>
                    <button>Tell me more</button>
                </div>
            </div>
            <div class="card">
                <img src="https://maclynninternational.com/_gatsby/image/a1f784b00a6fbd5e640b97b1d50fcf79/5198770f9c2abb128239bbd0b36c2dd8/Paying-bill-1.jpg?u=https%3A%2F%2Fadmin.maclynninternational.com%2Fwp-content%2Fuploads%2F2017%2F03%2FPaying-bill-1.jpg&a=w%3D724%26h%3D483%26fm%3Djpg%26q%3D75&cd=4fcb4ca1564821f4d9f8038a206457d9"
                    alt="Friends at table">
                <div class="card-content">
                    <h2>Modern Etiquette on Who Should Pay for a Date</h2>
                </div>
            </div>
            <div class="card">
                <img src="https://www.samiwunder.com/wp-content/uploads/2021/08/use-feminine-energy-to-get-him-to-chase-you-1.png"
                    alt="Woman posing">
                <div class="card-content">
                    <h2>Giving Voice to Your Unique Feminine Energy</h2>
                </div>
            </div>
            <div class="card">
                <img src="https://www.verywellmind.com/thmb/4CTPgjfUHW-v0xusblnTBTkmD1E=/2121x0/filters:no_upscale():max_bytes(150000):strip_icc()/GettyImages-863833530-5b02fcd843a103003797ed11.jpg"
                    alt="Couple cuddling">
                <div class="card-content">
                    <h2>Unconditional Love and What It Means to Modern Relationships</h2>
                </div>
            </div>
            <div class="card highlight">
                <img src="https://lifecoachhub.com/wp-content/uploads/2024/03/when-should-you-take-down-your-online-dating-profile-coaching-tip.jpg"
                    alt="Online dating">
                <div class="card-content">
                    <h2>Online dating profile tips:</h2>
                    <p>Make your profile work for you</p>
                    <button>Tell me more</button>
                </div>
            </div>
            <div class="card">
                <img src="https://www.eharmony.com/wp-content/uploads/2023/10/how-to-start-dating-980x420.jpg"
                    alt="Couple in city">
                <div class="card-content">
                    <h2>How to Start Dating: A Guide for Beginners and Starting Again</h2>
                </div>
            </div>
        </div>
        <div class="see-all">
            <a href="#">See all articles</a>
        </div>
    </div>


    <!-------------------------------------------------------------->

    <div class="d-four">
        <div class="hero">
            <i class="fa-regular fa-heart"></i></br></br>
            <i class="fa-regular fa-heart"></i></br></br>

            <h1>Find Real Love Now!</h1>
            <button>Start free today</button>
        </div>

        <h2>Finding Yourself</h2>

        <div class="container">
            <div class="card">
                <img src="https://www.eharmony.com/wp-content/uploads/2021/04/anxious-attachment-dating-768x329.jpg" alt="Thinking man">
                <div class="card-content">
                    <h3>Anxious attachment dating:</h3>
                    <p>Effective dating tips to overcome it</p>
                </div>
            </div>
            <div class="card">
                <img src="https://www.eharmony.com/wp-content/uploads/2023/10/how-do-you-know-you-love-someone-385x192.jpg" alt="Sporty woman">
                <div class="card-content">
                    <h3>Which hobbies make you attractive to the opposite sex?</h3>
                </div>
            </div>
            <div class="card">
                <img src="https://www.shutterstock.com/image-photo/side-view-young-couple-two-600nw-2480821025.jpg" alt="Man with headphones">
                <div class="card-content">
                    <h3>Dating a Short Guy – Why True Love Goes Beyond Physical Attraction</h3>
                </div>
            </div>
            <div class="card">
                <img src="https://t4.ftcdn.net/jpg/02/00/37/19/360_F_200371963_4vtFq8MV2jYTsVnBXNkvUg8hid76N4NI.jpg" alt="Thinking woman">
                <div class="card-content">
                    <h3>Am I Ready for a Relationship? How to Find Out & Be Sure</h3>
                </div>
            </div>
            <div class="card">
                <img src="https://www.shutterstock.com/image-photo/couple-autumn-time-having-fun-600nw-2311732787.jpg" alt="Couple hugging">
                <div class="card-content">
                    <h3>How Being Vulnerable Builds Better Relationships</h3>
                </div>
            </div>
            <div class="card">
                <img src="https://t3.ftcdn.net/jpg/00/64/11/22/360_F_64112206_dCdiGgqvJT1zWuQiDdqUZxWrtG6Z0cIU.jpg" alt="Holding hands">
                <div class="card-content">
                    <h3>Why Forgiveness is Necessary When it Comes to Love</h3>
                </div>
            </div>
            <div class="card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQnGrA9GgoEofFwA1YbcDF9xS-QkeuHrxkeZA&s" alt="Group of people">
                <div class="card-content">
                    <h3>3 Tips to Surround Yourself with Positive People</h3>
                </div>
            </div>
            <div class="card">
                <img src="https://www.promises.com/wp-content/uploads/2022/05/bigstock-Anxiety-winter-depression-woma-278305216-1.jpg" alt="Anxious woman">
                <div class="card-content">
                    <h3>Dating Anxiety: Learning to Cope and Thrive</h3>
                </div>
            </div>
            <div class="card">
                <img src="https://st2.depositphotos.com/3261171/10130/i/950/depositphotos_101309904-stock-photo-young-couple-holding-mobile-phones.jpg" alt="Woman with phone">
                <div class="card-content">
                    <h3>How to Stop Being Frustrated with Dating and Modern Romance</h3>
                </div>
            </div>
           
        </div>

        <div class="see-all">
            <a href="#">See all articles</a>
        </div>
    </div>
</body>

</html>