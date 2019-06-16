// JavaScript Document
(function($){
$.fn.activeMenu = function(options){
var defaults = {
idSwitch: 'active',
defaultSite: null,
defaultIndex: 0
},
intialize = function(id){
var op = $.extend({},defaults,options);
var loc = location.href;

var activeCount = 0;
$(id).find('a').each(function(){
var href = $(this).attr('href');
if(loc.search(href) != -1){
$(this).attr('id', op.idSwitch);
activeCount++;
}
else{
$(this).attr('id', '');
}

if(activeCount == 0){
if(loc.search(op.defaultSite) != -1){
$(id).find('a').eq(0).attr('id', op.idSwitch);
}
}
});

}

return this.each(function(){
intialize(this);
});
}
$.fn.activeMenu2 = function(options){
var defaults = {
idSwitch: 'menukiri',
defaultSite: null,
defaultIndex: 0
},
intialize = function(id){
var op = $.extend({},defaults,options);
var loc = location.href;

var activeCount = 0;
$(id).find('a').each(function(){
var href = $(this).attr('href');
alert(href)
if(loc.search(href) != -1){
$(this).attr('id', op.idSwitch);
activeCount++;
}
else{
$(this).attr('id', '');
}

if(activeCount == 0){
if(loc.search(op.defaultSite) != -1){
$(id).find('a').eq(0).attr('id', op.idSwitch);
}
}
});

}

return this.each(function(){
intialize(this);
});
}
})(jQuery);

// JavaScript Document


