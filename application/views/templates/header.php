
<div class="header">
        <div class="lo"><a href="#" class="logo"><i class="fas fa-heart"></i></a></div>

        <nav class="navbar ">
            <!-- <a class="navlink active" href="#">Home</a> -->
        </nav>

        <div class="search-bar">
            <form method="get">
                <button type="submit"><i class="fas fa-search search"></i></button>
                <input type="search" placeholder="search here" name="mot" required />
            </form>

        </div>

        <div class="info">
            <i class="fas fa-bars"></i>
            <div class="photo">
                <img src="../assets/images/ETU001948.jpg" alt="">
            </div>
        </div>

        <!-- not shown yet -->
        <div class="list-menu">
            <div class="box">
                <i></i><span><?php echo $_SESSION['id']; ?></span>
            </div>
            <div class="box">
                <a href="../inc/process.php?deconnect=0"><i class="fas fa-sign-out-alt "></i><span>log out</span></a>
            </div>


        </div>
        <!--  -->
    </div>
