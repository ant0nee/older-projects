// code by Anthony Smith
// http://thedynamicprogrammer.tumblr.com
function pipe(img,m){
	var pipepos; 
	this.pointflag = false; 
	this.movement = m; 
	this.rand = Math.floor(Math.random()*300)+100; 
	this.image = img; 
	this.render = function() {
		if (start) {
			this.movement = this.movement + 6; 
		}
		ctx.drawImage(this.image,0,this.rand,this.image.width,this.image.height-500,1242-this.movement,0,250,2208-290); 
		if (bird.x >= 1242 - this.movement - 200 + 70  && bird.x <= 1242 - this.movement + 250){
			if (bird.y >= (2208-290)-this.rand*3.57835820896 - 415 && bird.y <= (2208-290)-this.rand*3.57835820896+290 - 150){
				if (!this.pointflag) {
					points++;
					this.pointflag = true; 
				}
			} else {
				bird.die = true; 
			}
		}
	}
}
function bird(img, death, speed, x, y){ //class
	this.image = img;
	this.dea = death;
	this.speed = speed; 
	this.die = false; 
	this.x = x;
	this.y = y;
	this.angle = 0.0174532925*10 - 0.0174532925*70; 
	this.dy = dy; 
	this.animIndex = 0; 
	this.render = function() {
		//animate
		ctx.save(); 
		this.animIndex++;
		this.animIndex = (this.animIndex + (this.image.height/this.image.width)*this.speed) % ((this.image.height/this.image.width)*this.speed); 
		if (started){
			//rotate
			ctx.translate(this.x, this.y); 
			ctx.translate(150/2, 150/2); 
			ctx.rotate(this.angle);
			if (this.angle <= 2.5 - 0.0174532925*70){
				this.angle = this.angle + 0.0174532925*2.5;
			}
		} else {
			ctx.translate(this.x, this.y); 
			ctx.translate(150/2, 150/2); 
			ctx.rotate(0);
		}
		//draw image
		ctx.drawImage(this.image,0,this.image.width*Math.floor(this.animIndex/this.speed),this.image.width,this.image.width,-150/2,-150/2,150,150);
		ctx.restore(); 
	}
	this.move = function() {
		if (this.y <  1800){
			this.y = this.y + this.dy; 
		} else if (this.die && this.y >= 1800) {
			resetFlag = true; 
		}
		if (this.y < 0 || this.y > 1800) {
			this.die = true; 
			this.image = this.dea; 
		}
		if (this.dy < 35) {
				this.dy = this.dy + 1.6; 
		}
		if (this.die) {
			this.dy = 35; 
		}
	}
}
var resetFlag = false; 
var dy = -30; 
var points = 0; 
var num = 1; 
var started = false; 
var timer = 0; 
// load canvas context
var c=document.getElementById("cvs");
var ctx=c.getContext("2d");
var start = false; 
//pipes 
var pipes = new Image(); 
pipes.src = "pipe.png";
var pipe;
pipe[0] = new pipe(pipes,9000);  
pipe[1] = new pipe(pipes,9000); 
pipe[2] = new pipe(pipes,9000); 
//initialise character image and constructor
var character = new Image();
character.src = "bird.png";
var de = new Image();
de.src = "die.png";
var bird = new bird(character, de, 40, 200, 900);
//background
var bg = new Image(); 
bg.src = "background.png";
var bgp = 0; 
function reset() {
	resetFlag = false; 
	dy = -30; 
	points = 0; 
	num = 1; 
	started = false; 
	timer = 0; 
	// load canvas context
	c=document.getElementById("cvs");
	ctx=c.getContext("2d");
	start = false; 
	//pipes 
	pipes = new Image(); 
	pipes.src = "pipe.png";
	pipe[0] = new pipe(pipes,9000);  
	pipe[1] = new pipe(pipes,9000); 
	pipe[2] = new pipe(pipes,9000); 
	//initialise bird
	bird.image = character; 
	bird.speed = 40;
	bird.y = 900; 
	bird.die = false; 
	bird.angle =  0.0174532925*10 - 0.0174532925*70; 
	//background
	bg = new Image(); 
	bg.src = "background.png";
	bgp = 0; 
}
//setup screen height
function setup(){
	draw();
}
function draw() {
	//render background
		ctx.drawImage(bg, (0 + bgp) % (2208*2), 0, 2208*4, 2208); 
	if (start) {
		bgp = bgp - 6;
	}
	//pipes
	if (start){
		timer++;  
	}
	var i; 
	for (i = 0; i<=pipe.length; i++){
		pipe[i].render(); 
	}
	if (timer>= 100 && start){
		pipe[num] = new pipe(pipes,0); 
		num++;
		num = num % 3; 
		timer = 0; 
	}
	//bird
	bird.render();	
	if (start || started){
		bird.move();
		started = true; 
	}
	//show points
	ctx.font="200px Arial";
	ctx.fillText(points,10,170);
	//if bird died
	if (bird.die) {
		start = false; 
	}
	//////////////////////////////////////////////////
	if (window.innerHeight < window.innerWidth) {
		document.getElementById("cvs").style.height=window.innerHeight+"px";
		document.getElementById("cvs").style.width=window.innerHeight/1.77777777777777777777777+"px";
	} else {
		document.getElementById("cvs").style.height=window.innerHeight+"px";
		document.getElementById("cvs").style.width=window.innerWidth+"px";
	}
	setTimeout("draw();", 16);
	//setTimeout("draw()",50);
}
//events
function mousedown(){
	if (resetFlag) {
		reset();
	}
	if (!started) {
		start = true;
	}
	if (!bird.die) {
		bird.dy = dy; 
		bird.angle = 0.0174532925*10 - 0.0174532925*70; 
	}
}
function keydown(event){
	if (resetFlag) {
		reset();
	}
	if (!started && event.keyCode == 32) {
		start = true;
	}
	if (!bird.die && event.keyCode == 32) {
		bird.dy = dy; 
		bird.angle = 0.0174532925*10 - 0.0174532925*70; 
	}
}