function toggledhide(){
    let sh = document.getElementById('sh');
    let show = document.getElementById('show');
    
    if (show.style.display != 'none' ) {
    show.style.display = 'none';
   
        
    }
    
   else {
       show.style.display = 'block';
       
   }
}

function toggledhide1(){
    let sh1 = document.getElementById('sh1');
    let show1 = document.getElementById('show1');
    
    if (show1.style.display != 'none' ) {
    show1.style.display = 'none';
           
    }
    
   else {
       show1.style.display = 'block';
       
   }
}

function startTimer() {
  setTimeout(showPage, 1000); // Show the page after 5 seconds
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("page").style.display = "block";
}