
var defaultModules = 
[
    'ui.bootstrap',
    'ngResource',
    'ngTable',
    'language',
];

if(typeof modules != 'undefined'){
	defaultModules = defaultModules.concat(modules);
}

angular.module('schoolynk', defaultModules);

