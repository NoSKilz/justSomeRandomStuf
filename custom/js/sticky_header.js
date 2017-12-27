/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var header = document.getElementById('header');
var headertop = header.offsetTop;
window.addEventListener('scroll',function(){
    if(headertop >= window.pageYOffset)
    {
        if(header.classList.contains('sticky'))
        {
            header.classList.remove('sticky');
        }
        if(header.classList.contains('not_sticky'))
        {
            return;
        }
        else
        {
            header.classList.add('not_sticky');
        }
    }
    else
    {
        if(header.classList.contains('not_sticky'))
        {
            header.classList.remove('not_sticky');
        }
        if(header.classList.contains('sticky'))
        {
            return;
        }
        else
        {
            header.classList.add('sticky');
        }
    }
}); 