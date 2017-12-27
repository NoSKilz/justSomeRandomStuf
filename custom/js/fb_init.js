/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
window.fbAsyncInit = function() 
{
    FB.init({
        appId            : '567662206922146',
        autoLogAppEvents : true,
        cookie           : true,
        status           : true,
        version          : 'v2.11',
        xfbml            : true
    });
    FB.getLoginStatus(function(response) 
    {
        if(response.status === 'connected') 
        {
            console.log('Logged in.');
        }
        else if(response.status === 'not_authorized')
        {
            console.log('Logged in, but not authorized.');
        }
        else 
        {
            console.log('Not logged in.');
        }
    },true);
};
(function(d, s, id) 
{
    var js,fjs = d.getElementsByTagName(s)[0];
    if(d.getElementById(id))
    {
        return;
    }
    js = d.createElement(s); 
    js.id = id;
    js.src = 'https://connect.facebook.net/cs_CZ/sdk/debug.js';
    fjs.parentNode.insertBefore(js, fjs);
}
(document, 'script', 'facebook-jssdk'));