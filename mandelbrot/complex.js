complex = function(_eval) {



}

complex = function(_real, _imaginary) {

	this.pvt_real = _real; 
	this.pvt_imaginary = _imaginary; 
	
	this.toString = function() {
		return this.pvt_real + (this.pvt_imaginary < 0 ? " - ":" + ") + Math.abs(this.pvt_imaginary)     + "i"; 
	}
	this.getReal = function() {
		return this.pvt_real;
	}
	this.getImaginary = function() {
		return this.pvt_imaginary; 
	}
	this.add = function(compNum) {
		return new complex(this.pvt_real - (-compNum.getReal()), this.pvt_imaginary - (-compNum.getImaginary()));
	}
	this.sub = function(compNum) {
		return new complex(this.pvt_real - compNum.getReal(), this.pvt_imaginary - compNum.getImaginary());
	}
	this.mul = function(compNum) {
		return new complex( 
			(this.pvt_real * compNum.getReal()) - (this.pvt_imaginary * compNum.getImaginary()),
			(this.pvt_real * compNum.getImaginary()) + (this.pvt_imaginary * compNum.getReal())
		); 
	}
	this.div = function(compNum) {	
		var num = new complex(this.pvt_real, this.pvt_imaginary);
		var conjugate = new complex(compNum.getReal(), - compNum.getImaginary());
		var den = compNum; 
		num = num.mul(conjugate);
		den = den.mul(conjugate); // imaginary should equal 0
		return new complex (
			num.getReal() / den.getReal(),
			num.getImaginary() / den.getReal()
		);
	}

	this.cos = function(){
		return new complex(
			Math.cos(this.pvt_real) * Math.cosh(this.pvt_imaginary), 
			-Math.sin(this.pvt_real) * Math.sinh(this.pvt_imaginary)
		);
	}
	this.sin = function(){
		return new complex(
			Math.sin(this.pvt_real) * Math.cosh(this.pvt_imaginary), 
			-Math.cos(this.pvt_real) * Math.sinh(this.pvt_imaginary)
		);
	}

	this.pow = function(compNum) {



	}
}