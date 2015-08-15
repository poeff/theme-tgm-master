<?php
/**
 * The template for displaying the footer.
 */

$modals = get_field( 'modals', options );
?>

    </div><!-- #content -->

    <footer id="colophon" class="site-footer" role="contentinfo">   
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="list-inline">
                        <li>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>, All Rights Reserved</li>
                        <!-- <li>|</li> -->
                        <li><a data-toggle="modal" data-target="#privacyModal">Privacy Policy</a></li>
                        <!-- <li>|</li> -->
                        <li><a data-toggle="modal" data-target="#newsletterModal">Mailing List</a></li>
                    </ul>
                </div><!-- .col-*-* -->
            </div><!-- .row -->
        </div><!-- container -->
    </footer><!-- #colophon --> 

</div><!-- #page -->

<?php
if ( $modals ) 
{
    foreach ( $modals as $modal ) 
    {
        $modal_title    = $modal['modal_title'];
        $modal_content  = $modal['modal_content'];
        $modal_link     = $modal['modal_link'];

        echo '<div class="modal fade" id="' . $modal_link . '" tabindex="-1" role="dialog" aria-labelledby="' . $modal_link . 'Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title" id="' . $modal_link . 'Label">' . $modal_title . '</h3>
                    </div>
                    <div class="modal-body">'. $modal_content .'</div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->';
    }
}


wp_footer(); 
?>

</body>
</html>