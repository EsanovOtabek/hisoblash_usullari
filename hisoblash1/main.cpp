#include <bits/stdc++.h>
using namespace std;

double l,h,tau,a,b,c,d,at;

double Ux0(double x){
	if(x>=0 && x<=c) return a+(d-a)*x/c;
	else return ((b-d)*x+d*l-c*b)/(l-c);
}



int main(){
	
//	Kiritish ================================
	cout<<"l=";cin>>l;
	cout<<"h=";cin>>h;
	cout<<"tau=";cin>>tau;
	cout<<"a=";cin>>a;
	cout<<"b=";cin>>b;
	cout<<"c=";cin>>c;
	cout<<"d=";cin>>d;
	cout<<"at=";cin>>at;
// ==========================================

	double y[100][100];  // qiymatlar massivi


	int I=l/h, J=10; // to'r o'lchamlari

// chegaraviy shartlarni initilizatsiya qilamiz 
	for(int jj=0;jj<=J;jj++){
		y[0][jj]=a;
		y[I][jj]=b;
	}
// ============================================


// bosh shartlarni initilizatsiya qilamiz 
	for(int i=1;i<I;i++){
		y[i][0]=Ux0(i*h);
	}
// ============================================



// Progonka usulidan foydalanish ===

	double A,B,C,F,alfa[I],betta[I],gamma;
	gamma = at*tau/h/h;
	A=gamma;
	B=1+2*gamma;
	C=gamma;

	for(int j=0;j<J;j++){
		
		alfa[1]=0;
		betta[1]=a;
		
		for(int i=1;i<I;i++){
			F=y[i][j];
			// F=Ux0(i*h); // bu chiziqli funksiyadan qiymatlarini olinadi
			alfa[i+1]=-C/(A*alfa[i]-B);
			betta[i+1]=-(F+A*betta[i])/(A*alfa[i]-B);
		}
		
		// progonkani teskari qadamini topamiz y[i][j+1]=alfa[i+1]*y[i+1][j+1]+betta[i+1]
		for(int i=I-1;i>0;i--){
			y[i][j+1]=alfa[i+1]*y[i+1][j+1]+betta[i+1];
		}
		
		
		// Natijalarni ekranga chop etamiz:::::::::::::::::
		
		cout<<"\n # "<<j+1<<"-qatlam:\n";
		cout<<"| i | x (m) | alfa(i) | betta(i) | y(i) |\n";
		cout<<"|----|----|----|----|----|";
		for(int i=0;i<=I;i++){
			cout<<"\n";
			cout<<" | i="<<i;
			cout<<" | x="<<i*h<<"m,";
			cout<<" | alfa["<<i<<"]="<<alfa[i];
			cout<<" | betta["<<i<<"]="<<betta[i];
			cout<<" | y["<<i<<"]["<<j+1<<"]="<<y[i][j+1];
			cout<<" | ";
		}
		
		cout<<endl;
	}
}
