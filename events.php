<div class="container">
    <div class="col-md-12">
        <hr>
    </div>

    <div class="row">
        <section>
            <div class="container">
                <div class="col-md-6">
                    <?php if (!empty($row['img_link'])): ?>
                        <img src="<?php echo htmlspecialchars($row['img_link']); ?>" class="img-responsive" alt="Event Image">
                    <?php else: ?>
                        <img src="path/to/default/image.jpg" class="img-responsive" alt="Default Image"> <!-- Add a default image -->
                    <?php endif; ?>
                </div>
                <div class="subcontent col-md-6">                        
                    <h1 style="color:#003300; font-size:38px;"><u><strong><?php echo htmlspecialchars($row['event_title']); ?></strong></u></h1>
                    <p style="color:#003300; font-size:20px;">
                        <?php
                        echo 'Date: ' . htmlspecialchars($row['Date']) . '<br>'; 
                        echo 'Time: ' . htmlspecialchars($row['time']) . '<br>'; 
                        echo 'Location: ' . htmlspecialchars($row['location']) . '<br>'; 
                        echo 'Student Co-ordinator: ' . htmlspecialchars($row['st_name']) . '<br>'; 
                        echo 'Staff Co-ordinator: ' . htmlspecialchars($row['name']) . '<br>'; 
                        ?>
                    </p>
                    <br><br>
                </div><!--subcontent div-->
            </div><!--container div-->
        </section>
    </div><!--row div-->
</div><!--outer container div-->
