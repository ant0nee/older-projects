require('./complex');
var i = 0;
var i2 = 0; 
var i3 = 0; 
var width =	100;
var height = 50; 
var log = ""; 
var iterations = 0;
var sym = ["░","▒","▓","█"];  
process.argv.forEach(function(val, index, array) {
	iterations = val; 
});
for (i = 0; i < height; i++) {
	log = ""; 
	for (i2= 0; i2 < width; i2++) {
		var x = (i2/width) * 4 - 2;  
		var y = (i/height) * 4 - 2;  
		var c = new complex(x, y);
		var z = c; 	
		var star = false; 
		for (i3 = 0; i3 < iterations; i3++) {
			z = z.mul(z).add(c);
			if (Math.sqrt((z.getReal() * z.getReal()) + (z.getImaginary() * z.getImaginary())) > 2){
				log += sym[i3 % sym.length];
				star = true; 
				break; 
			}
		}
		if (!star) {
			log +=" "; 
		}
	}
	console.log(log);
}