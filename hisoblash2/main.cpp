#include <bits/stdc++.h>
using namespace std;

double l,h,tau,a,b,c,d,at;

double Ux0(double x){
	return sin(M_PI*x);
}

int main(){
	
//	Kiritish ================================
	cout<<"l=";cin>>l;
	cout<<"h=";cin>>h;
	cout<<"tau=";cin>>tau;
// ==========================================

	double y[100][100];  // qiymatlar massivi

	int I=l/h, J=10; // to'r o'lchamlari

// bosh shartlarni initilizatsiya qilamiz 
	for(int i=1;i<=I;i++){
		y[i][0]=Ux0(i*h);
	}
// ============================================

	double gamma,fi;
	gamma = tau/h/h;
	

	for(int j=1;j<J;j++){

		for(int i=2;i<I;i++){
			y[i][j]=y[i][j-1]+gamma*(y[i+1][j-1] - 2*y[i][j-1] + y[i-1][j-1]);
		}
		y[1][j]=0;
		y[I][j]=0;

	}
	
//	hosil bo'lgan y[][] matritsamiz yechimlar matritsasi hisoblanadi
}
