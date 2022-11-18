document.addEventListener("DOMContentLoaded", function(){
    let country = document.querySelector("#lookup");
    let city = document.querySelector("#city");

    country.addEventListener("click", function(event) {
        event.preventDefault();

        let value = document.querySelector("#country").value;
        
        fetch(`http://localhost/comp2245-assignment5/world.php?country=${value}`)
        .then(response => response.text())
        .then(data => {
            let set = document.querySelector("#result");
            set.innerHTML = data;
        })
        .catch(error =>console.log(error))

        })
    

    city.addEventListener("click", function(event) {
        event.preventDefault();

        let value = document.querySelector("#country").value;

        fetch(`http://localhost/comp2245-assignment5/world.php?country=${value}&lookup=cities`)
        .then(response => response.text())
        .then(data => {
            console.log(data);
            let set = document.querySelector("#result");
            set.innerHTML = data;
        })
        .catch(error =>console.log(error))

        })
    }
);
    



