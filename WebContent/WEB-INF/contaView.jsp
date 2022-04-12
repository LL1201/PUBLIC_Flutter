<!--//Loner Luca
//5B IA
//07/04/2022-->
<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<link href='css/bootstrapcss/bootstrap.min.css' rel='stylesheet' type='text/css'>
<script src='js/jquery-3.6.0.min.js' type='text/javascript'></script>
<script src='js/bootstrapjs/bootstrap.bundle.min.js' type='text/javascript'></script>

<title>Conta sballo</title>
</head>
<body>
<h2>Wilkommen</h2>
<h4>Sei il visitatore numero ${count}</h4>
<form action=/DemoServer/contaJSP method=get><input name=reset type=submit value=Reset></form>
<table class="table table-striped table-hover">
<tr>
	    <th>IP</th>
	    <th>Porta</th>
	    <th>Data</th>
	    <th>Azione</th>
  	</tr>
<c:forEach var = "visitor" items = "${list}">    
    <tr>
        <td>${visitor.ip}</td>
        <td>${visitor.port}</td>
        <td>${visitor.date}</td>
        <td><form action=/DemoServer/contaJSP method=get><input name=resetItem type=submit value="Elimina"><input type="hidden" name="submit_id" value="${visitor.id}"/></form></td>
    </tr>    
</c:forEach>
</table>

</body>
</html>