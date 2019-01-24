var app = angular.module('contactApp', ['ngMaterial']);
app.controller('contactCtrl', function($scope, $mdToast, $timeout, $q, $log, $http, $window) {
  $scope.doContact = function(datos) {
    var deferred;
    deferred = $q.defer();
    $http.post('./admin/api/contacto',datos).then( function(data){
      var resul;
      if(data['status'] == 200){
        resul = 'El correo ha sido enviado sin problemas';
        $scope.tostado(resul, 'success');
      }
      else{
        resul = data['data'];
        $scope.tostado(resul, 'error');
      }
      deferred.resolve(data);
    }).catch(function(resultado){
      deferred.reject(resultado);
    });
    return deferred.promise;
  };
  $scope.clean = function(){
    $scope.contact = [];
    $('#contactNombre').val("");
    $('#contactEmail').val("");
    $('#contactTelefono').val("");
    $('#contactMensaje').val("");
  }
  $scope.closeToast = function() {
    $mdToast.hide();
  };
  $scope.tostado = function(texto,tipo) {
    $mdToast.show(
      $mdToast.simple()
      .toastClass('md-toast-'+tipo)
      .textContent(texto)
      .position('bottom left')
      .hideDelay(3000)
    );
  };
});
$(document).ready(function() {
  init();
});
function init(){
  console.log("contact.html");
}
