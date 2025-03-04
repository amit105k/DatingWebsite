<?php
include("db.php");
$response = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movie_name = htmlspecialchars($_POST['movie_name']);
    $movie_desc = htmlspecialchars($_POST['movie_desc']);
    $stmt = null; 

  
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'logo/' . uniqid() . '_' . basename($image_name);

        if (move_uploaded_file($image_tmp_name, $image_folder)) {
        
            $stmt = $conn->prepare("INSERT INTO movie_details (Name, m_image,movie_details) VALUES (?, ?,?)");
            $stmt->bind_param("sss", $movie_name, $image_folder,$movie_desc);
        }
    }
   
    elseif (isset($_POST['image']) && filter_var($_POST['image'], FILTER_VALIDATE_URL)) {
        $image_url = $_POST['image'];
        
   
        $stmt = $conn->prepare("INSERT INTO movie_details (Name, m_image,movie_details) VALUES (?, ?,?)");
        $stmt->bind_param("sss", $movie_name, $image_url,$movie_desc);
    } else {
      
        $response = "Please upload a file or provide a valid image URL.";
    }


    if ($stmt !== null && $stmt->execute()) {
        $response = "success";
    } else {
      
        if ($stmt === null) {
            $response = "error: no valid image or URL provided.";
        } else {
            $response = "error: query execution failed.";
        }
    }

    
    if ($stmt !== null) {
        $stmt->close();
    }

    $conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new Movies</title>
    <link rel="stylesheet" href="../css/index.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Dancing+Script:wght@400..700&family=Roboto+Slab:wght@100..900&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
<div class="profile">
    <div class="details">
        <h2>Movie details are entered</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="movie_name">Enter Movie Name</label>
            <input type="text" name="movie_name" id="movie_name" required>

            <label for="image">Upload Thumbnail (Choose one)</label>
            <input type="file" name="image" id="image" onchange="toggleInputs()">
            <br><br>
            <label for="image_url">Enter Image URL</label>
            <input type="url" name="image" id="image_url" onchange="toggleInputs()">
            <br><br>
            <label for="movie_name">Enter Movie Name</label>
            <input type="text" name="movie_desc" id="movie_name" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>

<script>
    function toggleInputs() {
        var fileInput = document.getElementById('image');
        var urlInput = document.getElementById('image_url');
        if (fileInput.value) {
            urlInput.disabled = true;
        } else if (urlInput.value) {
            fileInput.disabled = true;
        } else {
            urlInput.disabled = false;
            fileInput.disabled = false;
        }
    }
    window.onload = function() {
        toggleInputs();
    };
</script>


<script>
    function toggleInputs() {
        var fileInput = document.getElementById('image');
        var urlInput = document.getElementById('image_url');
        if (fileInput.value) {
            urlInput.disabled = true;
        } else if (urlInput.value) {
            fileInput.disabled = true;
        } else {
            urlInput.disabled = false;
            fileInput.disabled = false;
        }
    }

    window.onload = function() {
        toggleInputs();
    };
</script>


    <!---,.............footer is eher-->
    <?php
    include("footer.php");
    ?>

</body>

</html>

<style>
    form img {
        max-height: 150px;
        max-width: 160px;
    }

    .details {
        width: 80%;
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 10px;
        justify-content: space-between;

        justify-content: center;
        align-items: center;

        justify-content: space-between;
        margin-bottom: 10px;
        width: 85%;
        justify-content: center;
        align-items: center;


    }

    .details form {
        width: 70%;
        margin-left: 15%;
    }

    .details h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .details label {
        display: block;
        margin: 10px 0 5px;
        font-size: 19px;
        font-weight: bold;
    }

    .details input[type="text"],
    .details input[type="url"],
    .details input[type="time"],
    .details input[type="number"],
    option,
    select,
    .details input[type="datetime-local"] {
        width: 100%;
        padding: 8px;
        margin: 10px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 19px;
        font-weight: normal;
    }

    .details input[type="submit"] {
        padding: 10px 15px;
        /* background-color: #007BFF; */
        background-color: #45a049;
        color: white;
        border: none;
        margin-top: 10px;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
    }

    textarea {
        width: 100%;
        height: auto;
        font-size: 18px;
    }

    body {
        font-family: Arial, sans-serif;

        background-color: #f4f4f9;
        color: #333;
    }

    #thenoida {

        /* margin-left: -73px; */
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    #h2 {
        text-align: center;
        color: #444;
        font-size: 24px;
        padding: 20px;
    }

    .first,
    .second {
        width: 50%;
        text-align: center;
    }

    .first p,
    .second p {
        margin: 19px 0;
        font-size: 18px;
    }

    .address {
        margin-top: 20px;
        padding-top: 10px;
    }

    .details strong {
        color: #555;
    }

    .logout-container {
        text-align: center;
        margin-top: 30px;
    }



    .ftext {
        text-align: center;
        background-color: black;
        color: white;
        padding: 10px;
        font-size: 15px;
        box-shadow: 0 0 0px 0px rgba(208, 141, 58, 0.57);
    }

    /** profile deatails are here */
    .profile-left {
        background-color: black;
        /* padding: 10px; */
        width: 15%;
    }

    .profile-left ul li {
        /* line-height: 50px; */
        list-style-type: none;
        /* padding: 20px; */
        align-items: center;
        /* justify-content: center; */
        display: flex;
        margin-top: 5px;
        margin-left: 11%;
    }


    .profile-left ul li a {
        /* background-color: pink; */
        text-decoration: none;
        /* padding: 10px; */
        height: 100%;
        height: 100%;
        color: white;
        line-height: 50px;
    }

    .profile-left ul li a:hover {
        color: orange;
    }

    .profile {
        /* background-color: yellow; */
        display: flex;
    }

    .logo {
        /* width: 15%;  */
        padding: 10px;
        /* position: absolute; */
        top: 0;
        left: 0;
        box-sizing: border-box;
        overflow: hidden;
    }

    .logo img {
        width: 100%;
        height: auto;
        object-fit: cover;
        cursor: pointer;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let response = "<?php echo $response; ?>";

        if (response === "success") {
            Swal.fire({
                title: 'Success!',
                text: 'Movie inserted successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = "Movie_details.php";
            });
        } else if (response === "error") {
            Swal.fire({
                title: 'Error!',
                text: ' not insert. Please try again.',
                icon: 'error'
            });
        }
    });
</script>