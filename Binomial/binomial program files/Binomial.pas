program Binomial;
uses
  SysUtils;
var
 a, b, p: integer;
 n, answer, x:extended;
 loop: integer;

procedure ReadInt(var StringUsed:integer);
var
  valid, output: boolean;
  i: integer;
  X: string;
begin
  output:= false;
    repeat
      readln(X);
      valid:= true;
      if X = '' then continue;
      for i := 1 to length(X) do
        if NOT (((ord(X[i])>=ord('0')) and (ord(X[i])<=ord('9')))
        OR ((i = 1) AND (X[i] = '-'))) then valid:= false;
      if valid= true then output:= true
      else write('Error- Please type a valid integer: ');
    until output= true;
  stringUsed:= strToInt(X);
end;
procedure ReadReal(var StringUsed:extended);
var
  valid, output: boolean;
  i: integer;
  X: string;
begin
  output:= false;
    repeat
      readln(X);
      valid:= true;
      if X = '' then continue;
      for i := 1 to length(X) do
        if NOT ((((ord(X[i])>=ord('0')) and (ord(X[i])<=ord('9')))
        or (ord(X[i])=ord('.')))
        OR ((i = 1) AND (X[i] = '-'))) then valid:= false;
      if valid= true then output:= true
      else write('Error- Please type a valid real number: ');
    until output= true;
  stringUsed:= strToFloat(X);
end;
function Factorial(var value: integer): integer;
var
  i: integer;
begin
  Factorial:= 1;
  for i := 1 to value do
    Factorial:= i * factorial;
end;
function pow(a,b: extended):extended;
begin
  if a>0 then
    pow:=exp(b*ln(a))
  else
  if a<0 then
    pow:=1/exp(b*ln(-a))
  else if a=0 then
    pow:=1;
end;
function C(n: extended; r: integer):extended;
var
  nu: extended;
  i: integer;
begin
  nu:=1;
  for i := 1 to r do
  begin
    nu:=nu * n;
    n:=n-1;
  end;
  C:= nu / Factorial(r);
end;

begin
  writeln('format: a^n(1+(b/a)X)^n');
  write('Enter the value for a: ');
  ReadInt(a);
  write('Enter the value for b: ');
  ReadInt(b);
  write('Enter the value for n: ');
  ReadReal(n);
  write('Expand up to term X^?: ');
  ReadInt(p);
  writeln;
  write(inttostr(a)+'^'+floattostr(n)+'(1+'+inttostr(b)
        +'/'+inttostr(a)+'X)^'+floattostr(n)+' = ');
  write(''+intToStr(a)+'^'+FloatToStr(n)+'(');
  write('1 + ');
  for loop := 1 to p do
  begin
    write(FloatToStr(C(n,loop)*pow(b/a,loop))
          +'X^'+IntToStr(loop)+' + ');
  end;
  writeln('... )');
  writeln('Valid for |x|<'+floattostr((1/b)*a));
  writeln;
  write('Enter a value for X: ');
  readln(x);
  answer:=1;
  for loop := 1 to p do
  begin
    answer:=answer+C(n,loop)*pow(b/a,loop)*pow(X,loop);
  end;
  writeln('binomeal X = '+FloatToStr(pow(a,n)*answer));
  writeln('accurate X = '+FloatToStr(pow(a,n)*pow((1+(b/a)*x),n)));
  readln;
end.
