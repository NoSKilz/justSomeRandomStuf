/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
document.getElementById('in').addEventListener('click',function(){
    FB.login(function(response){
        if (response.authResponse) 
        {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function(response) 
            {
                console.log('Good to see you, ' + response.name + '.');
            });
        } 
        else 
        {
            console.log('User cancelled login or did not fully authorize.');
        }
        console.log(response.authResponse);
    },{scope:'public_profile,email',return_scopes:true});
});