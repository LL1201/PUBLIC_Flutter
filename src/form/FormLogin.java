package form;

import java.io.IOException;
import java.sql.SQLException;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import database.DbHelper;

/**
 * Servlet implementation class FormLogin
 */
@WebServlet("/FormLogin")
public class FormLogin extends HttpServlet {
	private static final long serialVersionUID = 1L;

	private DbHelper db;

	/**
	 * @see HttpServlet#HttpServlet()
	 */
	public FormLogin() {
		super();
		// TODO Auto-generated constructor stub
	}

	@Override
	public void init(){
		db=new DbHelper();
	}

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		//response.getWriter().append("Served at: ").append(request.getContextPath());
		HttpSession session=request.getSession();
		session.setMaxInactiveInterval(60);
		RequestDispatcher disp;		
		String user = request.getParameter("user");
		String password = (String)request.getParameter("password");
		String logout = (String)request.getParameter("logout");

		if(user!=null && password!=null){
			try {
				db.connect();
				if(db.login(user, password)){			
					//System.out.println("ZIO PORCONE");
					response.sendRedirect("/DemoServer/FormLogin");
					request.setAttribute("user", user);						
					session.setAttribute("logged", true);
					session.setAttribute("user", user);	
					disp=request.getRequestDispatcher("/WEB-INF/logout.jsp");
				}else{
					response.sendRedirect("/DemoServer/FormLogin");
					disp = request.getRequestDispatcher("/WEB-INF/login.jsp");
				}
				db.disconnect();
			} catch (SQLException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}		

		}else if(logout!=null){
			session.invalidate();
			response.sendRedirect("/DemoServer/FormLogin");
			disp = request.getRequestDispatcher("/WEB-INF/login.jsp");
		}else{
			if(session.getAttribute("logged") !=null && ((boolean) session.getAttribute("logged"))) {
				disp=request.getRequestDispatcher("/WEB-INF/logout.jsp");
				request.setAttribute("user", (String) session.getAttribute("user"));
			}
			else
				disp=request.getRequestDispatcher("/WEB-INF/login.jsp");
			disp.forward(request, response);			
		}
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
