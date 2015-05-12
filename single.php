<?php
$user = new Client();
$user->loadDetailsPost();
$json_details = json_encode($user->getDetails());
?>
<?php
get_header();
?>
<div class="box-app" ng-app="kjw">
    <div ng-controller="DetailsCtrl">
        <div class="box-option-bar">
            
        </div>
        <div class="wrapper">
            
            <div class="row">
                
                <div class="details">
                    <div class="row">
                        <div class="btn"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Accueil</a></div>
                    </div>
                    <h2 ng-bind-html="title"></h2>
                    <div class="details-dt">cette article a été créé le {{dt}}</div>
                    <div ng-bind-html="img" class="details-img"></div>
                    <div ng-repeat="part in content">
                        <div ng-bind-html="part.part" ng-class="part.type"></div>
                    </div>
                </div>
                <div class="left">
                    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                        <div class="sidebar">
                                <?php dynamic_sidebar( 'sidebar-1' ); ?>
                        </div><!-- #secondary -->
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var details = <?php echo $json_details;?>;
</script>
<?php
get_footer();
?>

