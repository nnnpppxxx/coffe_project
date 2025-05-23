<?php if (!isset($included)) { //checking if header is already used
    include 'partials/header.php';
} ?>

<!-- gallery section start -->
<div class="gallery_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="gallery_taital">Our Gallery</h1>
                <p class="gallery_text">
                    Lorem Ipsum is simply dummy text of printing typesetting ststry lorem Ipsum the industry'ndard dummy text ever since of the 1500s, when an unknown printer took a galley of type and scra make a type specimen book. It ha
                </p>
            </div>
        </div>

        <?php
        $images = [
            'assets/images/img-1.png',
            'assets/images/img-2.png',
            'assets/images/img-3.png',
            'assets/images/img-4.png',
            'assets/images/img-5.png',
            'assets/images/img-6.png',
            'assets/images/img-7.png',
            'assets/images/img-8.png',
            'assets/images/img-9.png',];
        $count = 0;
        foreach ($images as $image) {
            //open new row
            if ($count % 3 === 0) {
                echo '<div class="gallery_section_2"><div class="row">';
            }
            echo '<div class="col-md-4">';
            echo '    <div class="container_main">';
            echo '        <img src="' . $image . '" alt="Gallery Image" class="image">';
            echo '    </div>';
            echo '</div>';

            $count++;

            // closing
            if ($count % 3 === 0) {
                echo '</div></div>';
            }
        }
        if ($count % 3 !== 0) {
            echo '</div></div>';
        }
        ?>

        <div class="seemore_bt"><a href="#">See More</a></div>
    </div>
</div>
<!-- gallery section end -->

<?php if (!isset($included)) {//checking if footer is already used
    include 'partials/footer.php';
} ?>
</html>
