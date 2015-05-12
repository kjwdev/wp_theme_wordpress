<?php
$user = new Client();
$user->loadDefaultPosts();
$json_categories = json_encode($user->getLstCat());
$json_posts = json_encode($user->getLstPost());
$intro = get_page(88);

if(isset($_GET['cat']) && $_GET['cat']!=''){
    $cat = get_category($_GET['cat']);
    $optionCat = $cat->name;
}else{
    $optionCat = '';
}
?>

<?php
get_header();
?>
<div class="box-app" ng-app="kjw">
    <div ng-controller="ExplorerCtrl">
        <div class="box-option-bar">
            <ul class="wrapper option-bar">
                <li class="box-option" ng-mouseenter="showChoice('size')" ng-mouseleave="hideChoice('size')">
                    <opt-size></opt-size>
                </li>
                <li ng-show="showOptCat" class="box-option" ng-mouseenter="showChoice('cat')" ng-mouseleave="hideChoice('cat')">
                    <opt-cat></opt-cat>
                </li>
                <li class="box-option">
                    <div class="label"><img src="<?php echo get_template_directory_uri(); ?>/img/ic-search.png" /></div>
                    <ul class="menu-type">   
                        <input type="text" class="input-search" ng-model="queryString" name="" id="" />
                    </ul>
                </li>
            </ul>
        </div>
        <div class="wrapper">
            <div id="intro">
                <?php echo $intro->post_content;?>
            </div>
        </div>
        <div class="wrapper">
            <div class="row" ng-show="!showOptCat">
                <div class="btn"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Accueil</a></div>
                <div class="btn"><a href="#" ng-click="historyBack()">Retour</a></div>
            </div>
            <div class="row">
                <ticket ng-class="class" ng-repeat="ticket in listPosts | filter:{excerpt:queryString}" ng-if="ticket.aff==true" id="op-ticket-{{ticket.id}}" class="animated fadeInDown ticket {{ticket.css}}"></ticket>
            </div>
        </div>
    </div>
</div>
    
<script>
    var categories = <?php echo $json_categories;?>;
    var posts = <?php echo $json_posts;?>;
    var optionCat = '<?php echo $optionCat;?>';
    var themeUri = '<?php echo $theme->getThemeUri();?>';
</script>
<?php
get_footer();
?>