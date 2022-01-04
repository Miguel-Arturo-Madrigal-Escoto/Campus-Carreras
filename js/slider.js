// JavaScript Document
$(document).ready(function(){
	var imgItems = $('.slider li').length;
	var imgPos = 1;
	
	console.log(imgItems);
	$('.slider li').hide();
	$('.slider li:first').show();
	
	/****/

	$('.right span').click(nextSlider);
	$('.left span').click(prevSlider);

	setInterval(function(){
			nextSlider();
	},5000);
	
	//funciones

	function nextSlider(){
		if(imgPos >= imgItems){
			imgPos = 1;
		}else{
			imgPos++;}
        

		$('.slider li').hide();
		$('.slider li:nth-child('+ imgPos +')').fadeIn();
	}
	function prevSlider(){
		if(imgPos <= 1){
			imgPos = imgItems;
		}else{
			imgPos--;}
        

		$('.slider li').hide();
		$('.slider li:nth-child('+ imgPos +')').fadeIn();
	}
});