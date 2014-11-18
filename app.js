(function(){
  var app = angular.module('bulletinapp', []);
  
  var k = app.controller('klock', function(){
    this.login_page = false;
    
	this.toggle = function(){
        this.login_page = !(this.login_page);
    };

  });
  
  var formc = app.controller('form', function(){
	this.on = true;
	
	this.toggle = function(){
		this.on = !this.on;
	}
  });
  
  var tabs = app.controller('tabs',function(){
	
	this.tab=1;
	
	this.setTab = function(t){
		this.tab=t;
	};
	
	this.isSelected = function(tab){
		return tab===this.tab;
	};
  });



})();
