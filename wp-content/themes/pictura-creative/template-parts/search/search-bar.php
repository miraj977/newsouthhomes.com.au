<section class="searchBar">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form class="searchForm" action="<?php echo site_url(); ?>" method="get">
                    <input type="text" name="s" id="search" placeholder="Type something then press enter…"
                        value="<?php the_search_query();?>" />
                    <input type="submit" alt="Search" />
                </form>
                <div class="closeSearch"><img
                        src="<?php echo get_template_directory_uri(); ?>/images/closeSearch.svg" /></div>
            </div>
        </div>
    </div>
</section>
