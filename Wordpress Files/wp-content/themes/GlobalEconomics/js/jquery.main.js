$(document).ready(function(){
	InitGallery();
	
        $('.navbar .holder .frame li').hover(
            function () {
                $('ul:first', this).css('display','block');
     
            }, 
            function () {
                $('ul:first', this).css('display','none');         
            }
        );               	
	
});

function InitGallery(){
	$('.promo').SlideShow({
		speed: 800,
		duration: 7000,
		list: 'ul.items-list>li',
		pager: 'ul.switcher',
		ieVersion: 6
	});
};
jQuery.fn.SlideShow = function(_options){
	// default options
	var _options = jQuery.extend({
		speed: 1200,
		duration: 4000,
		list: 'ul.fade>li',
		prev: 'a.prev',
		next: 'a.next',
		pager: 'ul.switcher',
		dinamicPagination: true,
		pause: '.pause',
		ieVersion: 6
	},_options);
	
	return this.each(function(){
		// options
		var _hold = jQuery(this);
		var _speed = _options.speed;
		var _duration = _options.duration;
		var _list = _hold.find(_options.list);
		var _prev = _hold.find(_options.prev);
		var _next = _hold.find(_options.next);
		var _pause = _hold.find(_options.pause);
		var _ie = _options.ieVersion;
		var _f = true;
		var _p = _options.dinamicPagination;
	/*--------CREATING THUMBNAILS----------*/
		var _num = _hold.find(_options.pager);
		if (_p){	_num.empty();
			_list.each(function(i){
				$('<li><a href="#">'+(i+1)+'</a></li>').appendTo(_num);
			});
		};
		var _thumb = _num.find('li');
	/*-------------------------------------------------*/
		var _a = _list.index(_list.filter('.active'));
		if(_a == -1) {_a = _thumb.index(_thumb.filter('.active'));}	if(_a == -1) {_a = 0;}
		_list.removeClass('active').eq(_a).addClass('active');
		_thumb.removeClass('active').eq(_a).addClass('active');
		var _i, _old = _a, _t;
		if (jQuery.browser.msie && jQuery.browser.version < _ie){		_list.hide().eq(_a).show();
		}else{		_list.show().css({opacity:0}).eq(_a).css({opacity:1});	}
		Run(_a);
		
		function Run(_a){
			_t = setTimeout(function(){
				_a++; if (_a >= _list.length){_a=0}
				ChangeFade(_a);
			}, _duration);
		};
		function ChangeFade(_new){
			if(_new != _old){
				if(jQuery.browser.msie && jQuery.browser.version < _ie){
					_list.eq(_old).removeClass('active').hide();
					_list.eq(_new).addClass('active').show();
				}else{
					_list.eq(_old).removeClass('active').animate({opacity:0}, {queue:false, duration:_speed});
					_list.eq(_new).addClass('active').animate({opacity:1}, {queue:false, duration:_speed});
				}
				_thumb.eq(_old).removeClass('active');
				_thumb.eq(_new).addClass('active');
				_old=_new;_a=_new;
				if(_t) clearTimeout(_t);
				if (_f){Run(_new);}
			};
		};
		_pause.click(function(){
			_f = false;
			clearTimeout(_t);
			return false;
		});
		_thumb.click(function(){
			_i = _thumb.index($(this));
			ChangeFade(_i);
			_a = _i;
			return false;
		});
		_next.click(function(){
			_a++; if (_a == _list.length){_a=0}
			ChangeFade(_a);
			return false;
		});
		_prev.click(function(){
			_a--; if (_a == -1){_a = _list.length-1}
			ChangeFade(_a);
			return false;
		});
	});
};