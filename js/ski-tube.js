$(function(){
	var stars = $('.frontRating');
	var backStars = $('.backRating');
	
	stars.each(function(i){
		var rating = this.innerHTML;
		if(rating <= 0){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -190px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating > .5 && rating < 1){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -190px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating >= 1 && rating < 1.5){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -204px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating >= 1.5 && rating < 2){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -218px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating >= 2 && rating < 2.5){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -232px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating >= 2.5 && rating < 3){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -246px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating >= 3 && rating < 3.5){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -260px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating >= 3.5 && rating < 4){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -274px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating >= 4 && rating < 4.5){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -288px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating >= 4.5 && rating < 5){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -302px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating >= 5){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -316px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating == 0.00){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -190px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		}
	});
	
	backStars.each(function(i){
		var rating = this.innerHTML;
		if(rating <= 0){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -190px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating > .5 && rating < 1){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -190px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating >= 1 && rating < 1.5){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -204px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating >= 1.5 && rating < 2){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -218px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating >= 2 && rating < 2.5){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -232px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating >= 2.5 && rating < 3){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -246px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating >= 3 && rating < 3.5){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -260px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating >= 3.5 && rating < 4){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -274px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating >= 4 && rating < 4.5){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -288px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating >= 4.5 && rating < 5){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -302px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating >= 5){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -316px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		} else if(rating == 0.00){
			$(this).css({
						'background' : 'url("./images/stars_sprite.png") 18px -190px no-repeat',
						'text-indent' : '-999em',
						'width' : 69 + 'px',
						'height' : 10 + 'px',
						'margin-bottom' : 8 + 'px'
					});
		}
	});
});	