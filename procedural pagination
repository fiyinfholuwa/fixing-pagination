<h2 class="text-center" style="margin-bottom: 20px;">All Products</h2>

            <div class="row justify-content-center">
                 <?php
                                $sql = "SELECT * FROM product_tbl";
                                $stmt = $con->prepare($sql);
                                $stmt->execute();
                                $post_count = $stmt->rowCount();
                                $post_per_page = 4;
                                if (isset($_GET['page'])) {
                                    $page = $_GET['page'];
                                    if($page == 1) {
                                        $page_id = 0;
                                    } else {
                                        $page_id = ($page * $post_per_page) - $post_per_page;
                                    }
                                } else {
                                    $page = 1;
                                    $page_id = 0;
                                }
                                $total_pager = ceil($post_count / $post_per_page);
                            ?>



                          <?php
                            $sql = "SELECT * FROM product_tbl  ORDER BY product_id DESC LIMIT $page_id, $post_per_page";
                            $stmt = $con->prepare($sql);
                            $stmt->execute();
                            $countt = $stmt->rowCount();
                            if ($countt == 0) {
                               echo "<p class='text-center' style='margin-top: 50px; text-align:center;'>No products Yet.</p>";
                            }else{
                            while($result = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            
                <div class="col-lg-12 col-md-12">
                    <div class="community-box wow fadeInUp" data-wow-delay="0.4s">
                        <!-- <div class="icon-container">
                            <img src="base/img/home_support/com_1.png" alt="community">
                        </div> -->
                        <div class="community-content">
                            <a href="product_detail?id=<?php echo $result['product_id'] ?>&<?php echo UrlConverter($result['product_title']); ?>"><h3 style="color: navy; font-weight: bold;" class="com-title">
                                <?php echo $result['product_title']; ?>
                            </h3></a>
                            <p><?php echo substr($result['product_brief'], 0, 150); ?>..........</p>
                            <div style="padding: 10px;">
                                <img style="height: 10px; width: 10px; margin-left: ;" src="base/img/home_support/fun-fact-5.png" alt="funfact"> <span style="font-size: 12px; padding: 30px;">
                                    <?php 
                                    $cat_id = $result['product_category'];
                                        $cat_query = "select * from pro_category_tbl where cat_id = '$cat_id' ";
                                        $run_cat_query = mysqli_query($conn, $cat_query);
                                        $fetch_cat = mysqli_fetch_assoc($run_cat_query);
                                        echo $fetch_cat['cat_name'];
                                     ?>
                                </span>
                                 <a href="product_detail?id=<?php echo $result['product_id'] ?>&<?php echo UrlConverter($result['product_title']); ?>" class="btn action_btn thm_btn">Preview<i class="arrow_right"></i></a>
                            </div>
                           
                        </div>
                    </div>
                    <!-- /.communinity-box -->
                </div>
                <!-- /.col-lg-4 col-md-6 -->
<?php } }?>
<center>

                <div style="margin-bottom: 40px;" class="col-lg-12">
                            <nav class="navigation pagination" role="navigation">
                                <div class="nav-links">

                              <?php
                                if ($post_count > $post_per_page) { ?>
                                    
                                            <?php 
                                                if(isset($_GET['page'])) {
                                                    $prev = $_GET['page'] - 1;
                                                } else {
                                                    $prev = 0;
                                                }

                                                if($prev+1 <= 1) {
                                                    echo '<a class="page-numbers" href="#!" aria-label="Previous"><span aria-hidden="true">&#xAB;</span></a>';
                                                } else {
                                                    echo '<a class="page-numbers"  href="product?page='. $prev .'" aria-label="Previous"><span aria-hidden="true">&#xAB;</span></a>';
                                                }
                                            ?>

                                            <?php 
                                                if (isset($_GET['page'])) {
                                                    $active = $_GET['page'];
                                                } else {
                                                    $active = 1;
                                                }
                                                for ($i = 1; $i <= $total_pager; $i++) {
                                                    if ($i == $active) {
                                                        echo '<a class="page-numbers"  href="product?page='. $i .'">' . $i . '</a>';
                                                    } else {
                                                       
                                                    }
                                                    
                                                }
                                            ?>

                                            <?php 
                                                if(isset($_GET['page'])) {
                                                    $next = $_GET['page'] + 1;
                                                } else {
                                                    $next = 2;
                                                }

                                                if($next - 1 >= $total_pager) {
                                                    echo '<a class="page-numbers"  href="#!" aria-label="Next"><span aria-hidden="true">&#xBB;</span></a>';
                                                } else {
                                                    echo '<a class="page-numbers" href="product?page=' . $next . '" aria-label="Next"><span aria-hidden="true">&#xBB;</span></a>';
                                                }
                                            ?>
                                            
                                      
                                <?php }
                            ?>
                                   
                                </div>
                            </nav>
                        </div>


                        </center>
               </div>
            
