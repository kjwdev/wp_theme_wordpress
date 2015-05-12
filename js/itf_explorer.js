var app = angular.module('kjw',['ngSanitize']);

/**
 * pemret de filtrer lles donnée pour que les infos contenant du html soi validé par json.
 * @returns {undefined}
 */
function filtreDataPost($sce, posts)
{
    angular.forEach(posts,function(post,index){

        angular.forEach(post.img, function(image, i){
            image = $sce.trustAsHtml(image);
        });
    }); 
}


// traitement et affichage des posts
app.directive('ticket', ['$document', function($document)
{
    return {
        restrict : 'E',
        templateUrl : themeUri + '/partials/ticket.html',
        link: function(scope, element, attrs)
        {
            
        }
    }     
}]);


app.directive('optSize', function(){
    return {
        restrict :'E',
        templateUrl : themeUri + '/partials/optSize.html'
    }
});

app.directive('optCat', function(){
    return {
        restrict :'E',
        templateUrl : themeUri + '/partials/optCat.html'
    }
});

app.controller('ExplorerCtrl', function($scope, $sce, $document)
{
    $scope.config = {};
    $scope.config.screen = {width : $document.width(), height : $document.height()};

    nbPostByPage = 1;
    $scope.listPosts = posts;
    console.log(posts);
    $scope.opt= [];
    if(optionCat==''){
        $scope.opt.cat = 'Tous';
        $scope.categories = categories;
        $scope.showOptCat = true;
    }else{
        $scope.showOptCat = false;
        $scope.categories = [];
    }
    $scope.opt.tai = '100%';
    
    $scope.optCat = false;
    $scope.optTai = false;
    $scope.class='size-100';
    filtreDataPost($sce, $scope.listPosts);

    var nbPostAff = $scope.listPosts.length; //contient le nombre de post afficher c'est a dire ou post.aff =true
    console.log(nbPostAff);
    /* Définition de la pagination
     *********************************/
    
    $scope.tailles = [
        {
            "id" : "1",
            "name" : "100%",
            "slug" : "100%",
        },
        {
            "id" : "2",
            "name" : "50%",
            "slug" : "50%",
        },
        {
            "id" : "3",
            "name" : "30%",
            "slug" : "30%",
        }
    ]
    

        

    /**
     * affiche le menu correspondant à type
     * type peu être égale à 'size' ou 'cat'
     */
    $scope.showChoice = function(type)
    {
        if(type=='size'){
            $scope.optTai = true;
        }else{
            $scope.optCat = true;
        }
    }

    /**
     * masque le menu correspondant à type
     * type peu être égale à 'size' ou 'cat'
     */
    $scope.hideChoice = function(type)
    {
        
        if(type=='size'){
            $scope.optTai = false;
        }else{
            $scope.optCat = false;
        }
    }

    // fonction de retour dans l'historique.
    $scope.historyBack = function()
    {
        window.history.back();
    }
    
    $scope.showByCat = function(slug)
    {
        var nbPostAff = 0;
        if($scope.opt.cat == 'Tous'){
            $scope.categories.push({id : 0, name : 'Tous', parent : '0', slug : 'tous', aff : true});
        }
        if(slug=='tous'){
            angular.forEach( posts, function(v, i){
                if(v.aff!=true){
                    v.aff = true;
                    nbPostAff++;
                }
            });
            // supprimer l'élement dans les choix possibles.
            $scope.categories.splice($scope.categories.length-1,1);
            $scope.opt.cat = 'Tous';
        }else{
            // parcour des posts.
            angular.forEach( posts, function(v, i){
                var findCat = false;
                // parcour des catégories des posts.
                angular.forEach( v.cat, function(v2, i2){
                    if(v2.slug == slug){
                        findCat = true;
                        $scope.opt.cat = v2.name;
                    }
                });
                if(findCat!=true){
                    v.aff = false;
                }else{
                    v.aff = true;
                    nbPostAff++;
                }
            });
            console.log(nbPostAff);
        }
    }

    /**
     * quand l'utilisateur change de taille on modifie les variables :
     * -$scope.class
     * -$scope.opt.tai
     */
    $scope.upSize = function(slug)
    {
        if(slug=='50%'){
            $scope.class = 'size-50';
            $scope.opt.tai = '50%';
        }else if(slug=='30%'){
            $scope.class = 'size-33';
            $scope.opt.tai = '30%';
        }else{
            $scope.class = 'size-100';
            $scope.opt.tai = '100%';
        }
    }
});

app.controller('DetailsCtrl', function($scope, $sce){
    angular.forEach(details.content, function(d, i){
        d['part'] = $sce.trustAsHtml(d['part']);
    });
    $scope.title = $sce.trustAsHtml(details.title);
    $scope.img = $sce.trustAsHtml(details.img);
    $scope.dt = details.dt;
    $scope.content = details.content;
});



