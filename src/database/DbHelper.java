package database;
import java.sql.*;

public class DbHelper {
	private static final String DRIVER = "com.mysql.jdbc.Driver";
    private static final String DBurl = "jdbc:mysql://localhost:3306/userlogin";
    private static final String user = "login";
    private static final String pwd = "login123";   
    Connection con = null;
	    
	public DbHelper(){
		con = null;
		try{
			Class.forName(DRIVER);
			System.out.println("ff");
		}catch(ClassNotFoundException e){
			System.out.println("ff");
		}
	}
	
	public void connect() throws SQLException{
		con=DriverManager.getConnection(DBurl, user, pwd);
	}
		
	public void disconnect() throws SQLException{
		if(con!= null)
			con.close();
	}

	public boolean login(String email, String pwd) throws SQLException {
		String query = "SELECT * FROM credenziali WHERE email='"+email+"' AND pwd=md5('"+pwd+"')";
		Statement sql = con.createStatement();
		ResultSet res = sql.executeQuery(query);
		if(res.next())
			return true;
		return false;
	}
	
}

