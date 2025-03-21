<div class="navbar">
    <a href="index.php">Home</a>
    <a href="datingAdvance.php">Dating Advice</a>
    <a href="tour.php">Tour</a>
    <a href="singlesNear.php">Singles Near Me</a>
    <!-- <a href="CustLogin.php">Log in</a> -->
    <div class="dropdown">
            <a href="">Register / Login</a>
            <div class="dropdown-content">
                <div class="sub-dropdown">
                        <a href="./CustReg.php">Register</a>
                   
                </div>
                <div class="sub-dropdown">
                        <a href="./CustLogin.php">Login</a>
                    
                </div>
            </div>
        </div>
</div>


<style>

*{
    margin: 0;
    padding: 0;
}
/******************************************************************************8 */
.dropdown button {
    background-color: black;
    color: white;
    /* background-color:  pink; */
}

.dropdown button:hover {
    color: orange;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
    min-width: 200px;
}
.sub-dropdown{
    /* background-color: black !important; */
}
.sub-dropdown:hover{
    background-color: #f1f1f1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown-content .sub-dropdown {
    position: relative;
}

.dropdown-content .sub-dropdown-content {
    display: none;
    position: absolute;
    left: -97%;
    top: 0;
    background-color: #f9f9f9;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    min-width: 200px;
}


.dropdown-content .sub-dropdown:hover .sub-dropdown-content {
    display: block;
    background: red !important;
    /* background: var(--aman); */
    /* background-color:var(--main-color); */
}

.sub-dropdown a {
    text-transform: none;
}
    .navbar {
        position: absolute;
        top: 0;
        width: 100%;
        display: flex;
        justify-content: flex-end;
        padding: 20px 50px;
        background:inherit;
        color: #fff;
        font-size: 18px;
        z-index: 2;
        /* margin-top: 30px; */
        /* left: -109px; */
    }

    .navbar a {
        margin-left: 30px;
        color: #fff;
        text-decoration: none;
        transition: color 0.3s;
        font-weight: bolder;
        font-size: 22px;
        color: black;
    }

    .navbar a:hover {
        color: #ffa500;
    }
</style>