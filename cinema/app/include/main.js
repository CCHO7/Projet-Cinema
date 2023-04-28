

function search_cinema() {
    let input = document.getElementById('searchbar').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('salle');

      
    for (i = 0; i < 45; i++) { 
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display="none";
			
        }
        else {
            x[i].style.display="list-item";          
		  
        }
    }
} 



