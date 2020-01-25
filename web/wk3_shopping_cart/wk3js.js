/*var catan = {
    itemId: 1,
    game: "Settlers of Catan",
    itemPrice: 29.99
};*/


// $(document).ready(function(){
//     $(".addItemBtn").click(function(e) {
//         //keep screen from refreshing
//         e.preventDefault();
//         //tell code where to find values for variables
//         var $form = (this).closest(".form-submit");
//         //get values for variables from hidden inputs in form in the card-footer
//         var pId = $form.find(".pId").valueOf();
//
//         e.submitInfo() {
//             $(".form-submit") echo 'action = <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >'
//             $_SESSION[$pId] = true;
//         }
//
//
//
//     })
// })









// //Create a function to create a XMLHttpRequest object and return the text from a txt file (JSON_Text.txt)
// function createXML() {
//     //create a XMLHttpRequest object
//     const myXML = new XMLHttpRequest();
//     //check readystatechange for correct readyState and status
//     myXML.onreadystatechange = function () {
//         if (myXML.readyState === 4) {
//             if (myXML.status === 200) {
//                 document.getElementById("getMethod").textContent = myXML.responseText;
//                /* var prod = myXML.responseText;
//                 alert(prod);*/
//             }
//             if (myXML.status === 404) {
//                 document.getElementById("getMethod").textContent = "That file could not be found.";
//             }
//         }
//     };
//     //open the request and send it
//     myXML.open('get', 'products.json', true);
//     myXML.send();
// }