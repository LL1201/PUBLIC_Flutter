//Loner Luca
//5B IA
//21/04/2022
package demoserver;

public class Visitatore {
	public String ip;
	public int port;
	public String date;
	public int id;
	
	public String getIp() {
		return ip;
	}

	public int getPort() {
		return port;
	}	

	public String getDate() {
		return date;
	}
	
	public int getId() {
		return id;
	}
	
	
	public Visitatore(String ip, int port, String date, int id){
		this.ip=ip;
		this.port=port;
		this.date=date;
		this.id=id;
	}		
}
