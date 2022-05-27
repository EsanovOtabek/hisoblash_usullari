#include <bits/stdc++.h>
using namespace std;

double a,b,c,d,e;

double ux0(double x){
	double f;
	if(x>=b and x<=(b+c)/2) f=2*a*(x-b)/(c-b);
	else if(x>=(b+c)/2 and x<=c) f=2*a*(c-x)/(c-b);
	else f=0;
	
	return f;
}

double ux_0(double x){
	double f;
	if(x>=0 and x<=b) f=a*x/b;
	else if(x>=b and x<=e) f=a;
	else f=(a-1)*x/(e-1);
	
	return f;
}


int main(){
	cout<<"a="; cin>>a;
	cout<<"b="; cin>>b;
	cout<<"c="; cin>>c;
	cout<<"d="; cin>>d;
	cout<<"e="; cin>>e;	
	
	double l=1,h=0.1,tau=h/a,gamma;
	
	gamma = a*tau/h;
	gamma=gamma*gamma;
	int I=10, J=10;
	double y[I+1][J+1];
	
//	boshlang'ich shartlari

	for(int i=0;i<=I;i++){
		y[i][0]=ux0(i*h);
	}
	
//	Birinchi qatlamda     dan foydalansak

	for(int i=0;i<=I;i++){
		y[i][1]=ux0(i*h)+tau*ux_0(i*h);
	}
	
//	chegaraviy qatlamda     dan foydalansak

	for(int j=0;j<=J;j++){
		y[0][j]=0;
		y[I][j]=0;
	}
	
	for(int j=1;j<=J;j++){
		for(int i=1;i<I;i++){
			y[i][j+1] = -y[i][j-1] + gamma*(y[i-1][j]+y[i+1][j]) + 2*(1-gamma)*y[i][j];
		}
	}
	
	for(int j=0;j<=J;j++){
		cout<<"\n # "<<j<<"-qatlam:\n";
		cout<<"| i | xi | y(i) |";
		cout<<"|----|----|----|";
		for(int i=0;i<=I;i++){
			cout<<"\n";
			cout<<" | i="<<i;
			cout<<" | x="<<i*h<<"m,";
			cout<<" | y["<<i<<"]["<<j<<"]="<<y[i][j];
			cout<<" | ";
		}
	}
	
}
