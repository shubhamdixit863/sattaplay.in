<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>
<div ng-app="myApp" ng-controller="myCtrl">
  <input type="number" style="width:60px;margin:6px;" ng-model="one">
  <input type="number" style="width:60px;margin:6px;" ng-model="two">
  <input type="number" style="width:60px;margin:6px;" ng-model="three">
  <input type="number" style="width:60px;margin:6px;" ng-model="four">

  <p>Total</p>
  <span>{{getTotal()}}</span>
</div>


<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
  $scope.getTotal = function() {
    return Number($scope.one) +
      Number($scope.two) +
      Number($scope.three) +
      Number($scope.four)
  };

  $scope.one = 22;
  $scope.two = 0;
  $scope.three = 0;
  $scope.four = 0;
});

</script>
