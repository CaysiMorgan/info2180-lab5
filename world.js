window.onload = function()
{
    const  httpRequests= new XMLHttpRequest();
    var input= document.getElementById("country");
    var result = document.getElementById("result");
    var city = document.getElementById("cities");
    look_up=document.getElementById("lookup")
    
 
        const checker=()=>{
            
        if (httpRequest.readyState === XMLHttpRequest.DONE){
            if (httpRequest.status === 200){
                result.innerHTML= httpRequest.responseText;
            }
            else{
                result.innerHTML = "Error: This resquest can not be delivered. Please try again.";
            }
        }
    }
       const info=(url) =>{
        input.value='';
        httpRequests.onreadystatechange = checker;
        httpRequests.open('GET', url);
        httpRequests.send();
       }

       
       look_up.addEventListener('click', function(event) {
        event.preventDefault();
        const searchText = input.value;
        let country  = searchText.trim();
        const url = `world.php?country=${country}&context=`;
        info(url);  

    });

     city.addEventListener('click', function(event) {
        event.preventDefault();
        const searchText = input.value;
        let cities  = searchText.trim();
        const url = `world.php?country=${cities}&context=city`;
        info(url);
     });
}
