<!--//Loner Luca
//5B IA
//21/04/2022-->
<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link href='css/bootstrapcss/bootstrap.min.css' rel='stylesheet' type='text/css'>

<script src='js/jquery-3.6.0.min.js' type='text/javascript'></script>
<script src='js/bootstrapjs/bootstrap.bundle.min.js' type='text/javascript'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
	
	// Show dialog to confirm deleting record:
	myModalDelete = new bootstrap.Modal(document.getElementById('myModalDelete'), {
		backdrop: 'static',  // do not close modal if user click outside
		keyboard: false   // cannot even press esc from keyboard
	}) 
	formDelete = document.getElementById("delete-form");
	
	$(document).on("click", "#deleteAll", function () {
		//alert("Elimina");
		myModalDelete.show();
	});
	
	$(document).on("click", "#delete-form-submit", function () {
		//alert("Elimina");
		formDelete.submit();		
		myModalDelete.dismiss();
	});
});

</script>


<title>Conta sballo</title>
</head>
<body>
<h2>Wilkommen</h2>
<h4>Sei il visitatore numero ${count}</h4>
<form action=/DemoServer/contaJSP method=get id="delete-form"><button type="button" name=reset id="deleteAll" class="btn btn-primary" value=reset>Elimina</button><input type="hidden" name="reset" value="reset"/></form>
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
        <td><form action=/DemoServer/contaJSP method=get><button type="submit" name=resetItem class="btn btn-primary">Elimina</button><input type="hidden" name="submit_id" value="${visitor.id}"/></form></td>
    </tr>    
</c:forEach>
</table>


<div id="myModalDelete" class="modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Conferma</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="modal-message">Sei sicuro di voler uscire?</p>
        <form id="delete-record-form" method="post">
          <input hidden type="text" name="id" id="id" value="${variable}"/>
          <!--button id="your-id">submit</button-->
		</form>  
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="delete-form-submit">Conferma l'eliminazione</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>