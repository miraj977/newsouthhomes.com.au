<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Pictura_Creative
 */

get_header();
?>
<section class="error-404 not-found">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="page-header">
          <h1 class="page-title">
            <?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'pictura-creative' ); ?>
          </h1>
        </div>
        <!-- .page-header -->
        
        <div class="page-content">
          <p>
            <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'pictura-creative' ); ?>
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- .page-content --> 
</section>
<!-- .error-404 -->

<?php
get_footer();
