/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
document.getElementById('out').addEventListener('click',function(){
    FB.logout(function(response){
        console.log(response);
        console.log('Logged out.');
    });
});