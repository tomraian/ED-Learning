<?php 
    $title = 'Team ED';
    include './inc/header.php';
?>
</header>
<!-- end header  -->
<!-- main -->
<main id="team">
    <section>
        <div class="container">
            <h2 class="main-title">CFD Team</h2>
            <p class="intro">Chúng ta không phải một lớp học, những thành viên CFD là một TEAM, cùng học hỏi và
                hỗ trợ lẫn nhau dưới sự hướng dẫn từ những người đồng sáng lập CFD.</p>
            <div class="row">
                <?php 
                    $show_team = $team->show_team();
                    if($show_team){
                        while($result = $show_team->fetch_assoc())
                        {
                ?>
                <div class="item col-md-6 col-sm-6">
                    <div class="img">
                        <img src="./uploads/<?php echo $result['teamImage'] ?>" alt="">
                    </div>
                    <div class="info">
                        <h3 class="name"><?php echo $result['teamName'] ?></h3>
                        <p class="title"><?php echo $result['teamDesc'] ?></p>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>
            </div>
        </div>
    </section>
</main>
<!-- footer -->
<?php 
    include './inc/footer.php';
?>