//Loner Luca 5B IA 24/03/2022
package demoserver;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class DemoServer
 */
@WebServlet("/DemoServer")
public class DemoServer extends HttpServlet {
	private static final long serialVersionUID = 1L;
	int count=0;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public DemoServer() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		count++;
		response.getWriter().append("<html><title>Supersballo</title><head><h1>Supersballo Web App</h1></head><hr><body>Count: "+count+"<form action=/DemoServer/DemoServer method=get><input name=reset type=submit value=Reset></form></body></html>");
		String reset = request.getParameter("reset");
		if (reset!=null) {
			count=0;
			response.sendRedirect("/DemoServer/DemoServer");
			}
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
		
	}
	
	@Override
	   public void init() {
	       count=0;
	   }

}
