
<div class="col-lg-4">
    <div class="sidebar">
        <div class="row">
            <div class="col-lg-12">
                <div class="sidebar-item search">
                    <form id="search_form" name="gs" method="GET" action="<?php echo base_url("home/search/")?>">
                        <input type="text" name="q" class="searchText" placeholder="type to search..." >
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                        <h2>Son Gönderiler</h2>
                    </div>
                    <div class="content">
                        <ul>
                            <?php foreach ($son as $rp){
                                foreach ($rp as $g){
                                ?>
                            <li><a href="<?php echo base_url("home/yazi/").$g->sef?>">
                                    <h5><?php echo $g->baslik?></h5>
                                    <span><?php echo $g->tarih?></span>
                                </a></li>
                                <?php }}?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                        <h2>Kategoriler</h2>
                    </div>
                    <div class="content">
                        <ul>
                            <?php


                            foreach ($kategori as $ct){
                                foreach ($ct as $s){
                                   //echo $s->aciklama;

                                ?>
                            <li><a href="<?php echo base_url("home/kategori/").$s->tag?>">- <?php echo $s->aciklama?></a></li>
                            <?php }}?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                        <h2>Tag Bulutu</h2>
                    </div>
                    <div class="content">
                        <ul>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Creative</a></li>
                            <li><a href="#">HTML5</a></li>
                            <li><a href="#">Inspiration</a></li>
                            <li><a href="#">Motivation</a></li>
                            <li><a href="#">PSD</a></li>
                            <li><a href="#">Responsive</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>
