package form;

import java.io.IOException;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 * Servlet implementation class FormLogin
 */
@WebServlet("/FormLogin")
public class FormLogin extends HttpServlet {
	private static final long serialVersionUID = 1L;
	HttpSession session=null;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public FormLogin() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		//response.getWriter().append("Served at: ").append(request.getContextPath());
		RequestDispatcher disp;		
		String user = request.getParameter("user");
		String password = (String)request.getParameter("password");
		String logout = (String)request.getParameter("logout");
		
		
		
		if(user!=null && password!=null){
			//System.out.println("ZIO PORCONE");
			response.sendRedirect("/DemoServer/FormLogin");
			request.setAttribute("user", user);	
			session = request.getSession();
			session.setMaxInactiveInterval(60);
			session.setAttribute("logged", true);
			session.setAttribute("user", user);	
			disp=request.getRequestDispatcher("/WEB-INF/logout.jsp");
			//disp.forward(request, response);
		}else if(logout!=null){
			System.out.println("ZIO PORCONE");
			response.sendRedirect("/DemoServer/FormLogin");
			disp = request.getRequestDispatcher("/WEB-INF/login.jsp");			
			//disp.forward(request, response);
			try{
				session.invalidate();
			}catch(Exception e){
				System.out.println("Catch Borsatti");
				}
			
		}else{
			if(null == session){
				disp = request.getRequestDispatcher("/WEB-INF/login.jsp");
				disp.forward(request, response);
			}
			else if((boolean) session.getAttribute("logged")){
				disp=request.getRequestDispatcher("/WEB-INF/logout.jsp");
				request.setAttribute("user", (String) session.getAttribute("user"));
				disp.forward(request, response);
			}
			
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
