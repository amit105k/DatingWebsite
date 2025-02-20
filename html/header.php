<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/header.css">
</head>
<body>
<header class="header" id="scroller">
        <div class="logo">🎬 <a href="index.php">MovieDating</a></div>
        <a href="#homepage" class="wp-block-button button is-style-premium">
				<span class="wp-block-button__link">
					Start free today				</span>
			</a>
    </header>
</body>
</html>
<script>
// let header = document.getElementById('scroller');
// let prevScrollPos = window.pageYOffset;

// window.onscroll = function () {
//     let currentScrollPos = window.pageYOffset;

//     if (prevScrollPos < currentScrollPos) {
//         header.style.top = "0";
//         header.style.position = "fixed";
//     } else {
//         header.style.top = "-91px";
//     }

//     prevScrollPos = currentScrollPos;
// };

let header = document.getElementById('scroller');
let prevScrollPos = window.pageYOffset;

header.style.top = "-91px"; 

window.onscroll = function () {
    let currentScrollPos = window.pageYOffset;

    if (prevScrollPos < currentScrollPos) {
        header.style.top = "0";
        header.style.position = "fixed";
    } 
    else {
        header.style.top = "-91px";
    }

    prevScrollPos = currentScrollPos;
};


</script>