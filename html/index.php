<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Dating Website</title>
    <link rel="stylesheet" href="../css/index.css">
    <script src="../js/index.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="preload"
        href="https://www.eharmony.com/wplp/wp-content/themes/psg-homepage-theme/assets/dist/fonts/SuisseIntl-Regular-WebS.woff2"
        as="font" type="font/woff2" crossorigin="crossorigin">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Dancing+Script:wght@400..700&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Playwrite+HR+Lijeva:wght@100..400&family=Roboto+Slab:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>

    <!-- header are here-->
    <?php
    include("header.php");
    ?>
    <!--- slider are here--------->
    <div class="background"></div>
    <div class="navbar">
        <a href="#">Tour</a>
        <a href="#">Dating Advice</a>
        <a href="#">Singles Near Me</a>
        <a href="#">Log in</a>
    </div>
    <div class="content">
        <h1>eharmony</h1>
        <h1>Get Who Gets You</h1>
        <p>Start <span style="color: orange;">free</span> today</p>
        <div class="options">
            <div class="option">I'm new to it</div>
            <div class="option">Once or twice</div>
            <div class="option">I'm an online dating pro</div>
        </div>
    </div>
    <!-- Hero Section -->
    <section class="hero">
        <h1>Find Your Movie Match 🎞️</h1>
        <p>Discover people who love the same movies as you!</p>
        <button class="btn">Get Started</button>
    </section>



    <!--dating ----->
    <div class="flex justify-center items-center">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-0 w-full max-w-7xl">
            <!-- Card 1 -->
            <div class="bg-green-800 text-white p-6 text-center flex flex-col items-center ">
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 8c0 6.5 5 11 9 13 4-2 9-6.5 9-13a5 5 0 00-9-3 5 5 0 00-9 3z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold mb-2">The #1 trusted dating app</h2>
                <p class="text-sm">2022 survey of 1,300 Respondents from the US, UK, Canada and Australia</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-green-600 text-white p-6 text-center flex flex-col items-center ">
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 8c0 6.5 5 11 9 13 4-2 9-6.5 9-13a5 5 0 00-9-3 5 5 0 00-9 3z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold mb-2">Every 14 minutes, someone finds love on eharmony</h2>
                <p class="text-sm">eharmony user data</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-green-800 text-white p-6 text-center flex flex-col items-center ">
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 8c0 6.5 5 11 9 13 4-2 9-6.5 9-13a5 5 0 00-9-3 5 5 0 00-9 3z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold mb-2">Highest quality dating pool</h2>
                <p class="text-sm">2023 survey of 2,807 dating app users in the U.S., UK, Canada and Australia</p>
            </div>
        </div>
    </div>


    <!-- Movie Recommendations -->
    <section class="movies">
        <h2>Popular Movies</h2>
        <div class="movie-grid">
            <div class="movie-card">
                <img src="https://in.bmscdn.com/events/moviecard/ET00373727.jpg" alt="image 1">
                <h3>
                    Anyone but you</h3>
            </div>
            <div class="movie-card">
                <img src="https://m.media-amazon.com/images/M/MV5BNWQwMWQ3NGUtNTEzNS00NzE1LThhZWItYTFkZmUyNzlhZGFlXkEyXkFqcGc@._V1_.jpg"
                    alt="Movie 2">
                <h3>miss you movie</h3>
            </div>
            <div class="movie-card">
                <img src="https://m.media-amazon.com/images/I/91xWDFqxDoL._AC_UF1000,1000_QL80_.jpg" alt="Movie 3">
                <h3>
                    Love & Other Drugs
                </h3>
            </div>
            <div class="movie-card">
                <img src="https://images.herzindagi.info/her-zindagi-english/images/2024/10/16/article/image/Sanam-Teri-Kasam-2-Possible-Plot-of-The-Much-Awaited-Harshvardhan-Rane-Led-Sequel-1729100375357.jpg"
                    alt="Movie 4">
                <h3>Sanam teri kasam 2</h3>
            </div>
        </div>
    </section>


    <!--- help millioms-->
    <div class="text-center my-10">
        <h1 class="text-4xl font-bold text-green-700">Our dating site helps millions find real love</h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto px-4">
        <!-- Card 1 -->
        <div class="image-card text-center">
            <img src="https://www.eharmony.com/wplp/wp-content/uploads/sites/5/2023/11/1-over-2-million-have-found-love.jpg"
                alt="Couple kissing">
            <h2 class="text-xl font-bold mt-4 col-black text-gray-950">Over 2 million have found love</h2>
            <p class="text-gray-700">... could you be next?</p>
        </div>

        <!-- Card 2 -->
        <div class="image-card text-center">
            <img src="https://www.eharmony.com/wplp/wp-content/uploads/sites/5/2023/11/3-site-most-likely-to-lead-to-happy-relationships.jpg"
                alt="Happy couple in nature">
            <h2 class="text-xl font-bold mt-4 text-gray-950">Site most likely to lead to happy relationships</h2>
            <p class="text-gray-700">... the right one may be waiting for you!</p>
        </div>

        <!-- Card 3 -->
        <div class="image-card text-center">
            <img src="https://www.eharmony.com/wplp/wp-content/uploads/sites/5/2023/11/4-messages-sent-weekly.jpg"
                alt="Person smiling with phone">
            <h2 class="text-xl font-bold mt-4 text-gray-950">2.3 million messages sent weekly</h2>
            <p class="text-gray-700">See who wants to talk to you!</p>
        </div>
    </div>


    <!------Compatibility Counts--------->
    <div class="Compatibility">
        <h1>Compatibility Counts</h1>
        <div class="Compatibility2">
            <section><img src="https://www.eharmony.com/wplp/wp-content/uploads/sites/5/2023/11/MatchingWheel-Partner.svg" alt=""></section>
            <section id="paragraph">
                <p>What happens when you apply scientific research to dating behavior? A whole lotta love! But this
                    isn’t destiny, it’s deliberate. That’s why every 14 minutes, someone finds love on eharmony.</p>
                <button>Join Now</button>
            </section>
        </div>
    </div>



     <!------Quality Singles, Just Like You--------->
     <div class="c-Compatibility">
        <h1>Quality Singles, Just Like You</h1>
        <div class="c-Compatibility2">
            <section id="c-paragraph" class="paragraph">
                <p>What happens when you apply scientific research to dating behavior? A whole lotta love! But this
                    isn’t destiny, it’s deliberate. That’s why every 14 minutes, someone finds love on eharmony.</p>
                    <button>Join Now</button>
                </section>
                <section id="c-image"><img src="https://www.eharmony.com/wplp/wp-content/uploads/sites/5/2023/11/compatibillity-score.png" alt=""></section>
        </div>
    </div>



    <!---................................We’re Here For You---->
    
    <!-- Footer -->
    <?php
    include("footer.php");
    ?>
</body>

</html>