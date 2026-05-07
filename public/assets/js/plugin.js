(function ($) {
    "use strict";
	
		particlesJS("particles-js",
			{
			   "particles":{
				"number":{
				  "value":185,
				  "density":{
					"enable":true,
					"value_area":1341.5509907748635
				  }
				},
			"color":{
			  "value":"#052450"
			},
			"shape":{
			  "type":"circle",
			  "stroke":{
				"width":0,
				"color":"#000000"
			  },
			  "polygon":{
				"nb_sides":5
			  },
			  "image":{
				"src":"","width":100,
				"height":100
			  }
			},
			"opacity":{
			  "value":1,
			  "random":true,
			  "anim":{
				"enable":true,
				"speed":0.8120772123013451,
				"opacity_min":0,
				"sync":false
			  }
			},
			"size":{
			  "value":5,
			  "random":true,
			  "anim":{
				"enable":false,
			  "speed":2,
			  "size_min":0.3,
			  "sync":false
			}
			},
			"line_linked":{
			  "enable":false,
			  "distance":150,
			  "color":"#ffffff",
			  "opacity":0.4,
			  "width":1
			},
			"move":{
			  "enable":true,
			  "speed":1,
			  "direction":"none",
			  "random":true,
			  "straight":false,
			  "out_mode":"out",
			  "bounce":false,
			  "attract":{
				"enable":false,
				"rotateX":600,
				"rotateY":600
			  }
			}
			},
			"interactivity":{
			  "detect_on":"canvas",
			  "events":{
				"onhover":{
				  "enable":false,
				  "mode":"grab"
				},
				"onclick":{
				  "enable":true,
				  "mode":"push"
				},
				"resize":true
			  },"modes":{
				"grab":{
				  "distance":400,
				  "line_linked":{
					"opacity":1
				  }
				},
			"bubble":{
			  "distance":316.71011279752463,
			  "size":0,
			  "duration":6.252994534720358,
			  "opacity":0,
			  "speed":3
			},
			"repulse":{
			  "distance":535.9709601188878,
			  "duration":0.4
			},
			"push":{
			  "particles_nb":4
			},
			"remove":{
			  "particles_nb":2
			}
			}
			},
			"retina_detect":true
		});

		$(function(){
		  $('.carousel-item').eq(0).addClass('active');
		  var total = $('.carousel-item').length;
		  var current = 0;
		  $('#moveRight').on('click', function(){
			var next=current;
			current= current+1;
			setSlide(next, current);
		  });
		  $('#moveLeft').on('click', function(){
			var prev=current;
			current = current- 1;
			setSlide(prev, current);
		  });
		  function setSlide(prev, next){
			var slide= current;
			if(next>total-1){
			 slide=0;
			  current=0;
			}
			if(next<0){
			  slide=total - 1;
			  current=total - 1;
			}
				   $('.carousel-item').eq(prev).removeClass('active');
				   $('.carousel-item').eq(slide).addClass('active');
			  setTimeout(function(){

			  },800)
		  }
		});

jQuery(function ($) {


function dotCanvas(){
    var $blocks = $('[data-dots]');
    $blocks.each(function() {
        var $block = $(this);
        var block = $block[0];
        var $canvas = $("<canvas/>").appendTo($block);
        var canvas = $canvas[0];
        var width = $block.width();
        var height = $block.height();
        var ctx = canvas.getContext('2d');
        ctx.width = width;
        ctx.height = height;
        var devicePixelRatio = window.devicePixelRatio || 1,
            backingStoreRatio = ctx.webkitBackingStorePixelRatio || ctx.mozBackingStorePixelRatio || ctx.msBackingStorePixelRatio || ctx.oBackingStorePixelRatio || ctx.backingStorePixelRatio || 1;
        var ratio = devicePixelRatio / backingStoreRatio;
        canvas.width = width * ratio;
        canvas.height = height * ratio;
        ctx.scale(ratio, ratio);
        var mouseX = undefined;
        var mouseY = undefined;

        function Circle(x, y) {
            this.x = x;
            this.y = y;
            this.distance = 7;
            this.radians = 0;
            this.draw = function() {
                ctx.beginPath();
                ctx.strokeStyle = 'rgba(0, 0, 0, .28)';
                ctx.moveTo(this.x + 3, this.y);
                ctx.lineTo(this.x + 3, this.y + 6);
                ctx.moveTo(this.x, this.y + 3);
                ctx.lineTo(this.x + 6, this.y + 3);
                ctx.stroke();
            };
            this.update = function() {
                if (mouseX > -1) {
                    var k1 = mouseY - y;
                    var k2 = mouseX - x;
                    var tan = k1 / k2;
                    var yrad = Math.atan(tan);
                    if (mouseX < x) {
                        yrad = Math.PI - Math.atan(-tan);
                    }
                    this.x = x + Math.cos(yrad) * this.distance;
                    this.y = y + Math.sin(yrad) * this.distance;
                }
                this.draw();
            };
        };
        var circlesArray = [];
        var gutter = 35;
        var countW = Math.floor(width / gutter);
        var countH = Math.floor(height / gutter);
        var len = countW * countH;
        for (var i = 0; i < countH; i++) {
            for (var t = 0; t < countW; t++) {
                var x = gutter * t;
                var y = gutter * i;
                circlesArray.push(new Circle(x, y));
            }
        }
        var loop = function() {
            ctx.clearRect(0, 0, ctx.width, ctx.height);
            for (var i = 0; i < circlesArray.length; i++) {
                circlesArray[i].update();
            }
        };
        document.addEventListener('mousemove', function(e) {
            var parentOffset = $(canvas).parent().offset();
            var relX = e.pageX - parentOffset.left;
            var relY = e.pageY - parentOffset.top;
            mouseX = relX;
            mouseY = relY;
            ctx.clearRect(0, 0, ctx.width, ctx.height);
            for (var i = 0; i < circlesArray.length; i++) {
                circlesArray[i].update();
            }
            loop();
        });
        loop();
    });
}

    if ($(window).width() > 991) {

        dotCanvas();
    }

});

})(jQuery);