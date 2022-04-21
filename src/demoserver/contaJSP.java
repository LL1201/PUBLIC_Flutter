//Loner Luca
//5B IA
//07/04/2022
package demoserver;

import java.io.IOException;
import java.util.ArrayList;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.time.format.DateTimeFormatter;  
import java.time.LocalDateTime;

/**
 * Servlet implementation class contaJSP
 */
@WebServlet("/contaJSP")
public class contaJSP extends HttpServlet {
	private static final long serialVersionUID = 1L;
	private int count=0;
	boolean resetList=false;
	ArrayList <Visitatore> list = new ArrayList<Visitatore>();
	DateTimeFormatter dtf = DateTimeFormatter.ofPattern("yyyy/MM/dd HH:mm:ss"); 	    

       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public contaJSP() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		/*if(!resetList){
			count++;
			LocalDateTime now = LocalDateTime.now();
			list.add(new Visitatore(request.getRemoteAddr(), request.getRemotePort(), dtf.format(now), count));
		}else{
			resetList=false;
		}*/
		//response.getWriter().append("<html><title>Supersballo</title><head><h1>Supersballo Web App</h1></head><hr><body>Count: "+count+"<form action=/DemoServer/DemoServer method=get><input name=reset type=submit value=Reset></form></body></html>");
		String reset = request.getParameter("reset");		
		String submitId = (String)request.getParameter("submit_id");
		if (reset!=null) {
			count=0;
			list.clear();
			/*String redirectURL = "localhost:8080/DemoServer/contaJSP";*/
			resetList=true;
		    response.sendRedirect("/DemoServer/contaJSP");
		    //request.getRequestDispatcher("/DemoServer/contaView.jsp").include( request, response);
		    request.setAttribute("count", count);
			request.setAttribute("list", list);			
			}
		else if(submitId!=null){
			//resetItem.substring(8, resetItem.length());
			list.removeIf(n -> (n.id == Integer.parseInt(submitId)));
			resetList=true;	
			response.sendRedirect("/DemoServer/contaJSP");
		    //request.getRequestDispatcher("/DemoServer/contaView.jsp").include( request, response);
		    request.setAttribute("count", count);
			request.setAttribute("list", list);			
		}
		else{
			if(!resetList){ 
				count++;	
				LocalDateTime now = LocalDateTime.now();
				list.add(new Visitatore(request.getRemoteAddr(), request.getRemotePort(), dtf.format(now), count));
			}else{
				resetList=false;
			}
			request.setAttribute("count", count);
			request.setAttribute("list", list);
			RequestDispatcher disp = request.getRequestDispatcher("/WEB-INF/contaView.jsp");
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
