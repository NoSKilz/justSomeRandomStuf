/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function isVisible(e) 
{
    return !!( e.offsetWidth || e.offsetHeight || e.getClientRects().length );
}
function openModal() 
{
    document.getElementById('modal').style.display = "block";
}
function closeModal() 
{
    document.getElementById('modal').style.display = "none";
}