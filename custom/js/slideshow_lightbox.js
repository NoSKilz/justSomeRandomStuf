/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var slider={'slideIndex':1,
            'slides':document.getElementsByClassName('slides'),
            'dots':document.getElementsByClassName('dot'),
            'check':function(){
                if (this.slideIndex > this.slides.length) 
                {
                    this.slideIndex = 1;
                } 
                if (this.slideIndex < 1) 
                {
                    this.slideIndex = this.slides.length;
                } 
            },
            'init':function(){
                for (i = 0; i < this.slides.length; i++) 
                {
                    this.slides[i].style.display = 'none'; 
                }
                for (i = 0; i < this.dots.length; i++) 
                {
                    this.dots[i].classList.remove('active');
                }
                this.slides[0].style.display = 'block'; 
                this.dots[0].classList.add('active');
            },
            'showSlide':function(){
                this.check();
                for (i = 0; i < this.slides.length; i++) 
                {
                    this.slides[i].style.display = 'none'; 
                }
                for (i = 0; i < this.dots.length; i++) 
                {
                    this.dots[i].classList.remove('active');
                }
                this.slides[this.slideIndex-1].style.display = 'block'; 
                this.dots[this.slideIndex-1].classList.add('active');
            },
            'lightBox':function(){
                this.check();
                this.showSlide();
                var sImg=document.querySelector('.img-'+this.slideIndex);
                var dImg=document.getElementById('mimg');
                dImg.src=sImg.src;
            }
};
slider.init();
var dot = document.querySelectorAll('.dot');
var img = document.querySelectorAll('.img');
var prev = document.querySelectorAll('.prev');
var next = document.querySelectorAll('.next');
for(i=0;i<prev.length;i++)
{
    prev[i].addEventListener('click',function(){
        if(isVisible(document.getElementById('modal')))
        {
            slider.slideIndex-=1;
            slider.lightBox();
        }
        else
        {
            slider.slideIndex-=1;
            slider.showSlide();
        }
    });
}
for(i=0;i<next.length;i++)
{
    next[i].addEventListener('click',function(){
        if(isVisible(document.getElementById('modal')))
        {
            slider.slideIndex+=1;
            slider.lightBox();
        }
        else
        {
            slider.slideIndex+=1;
            slider.showSlide();
        }
    });
}
for(i=0;i<dot.length;i++)
{
    dot[i].addEventListener('click',function(){
        slider.slideIndex=parseInt(this.dataset.num);
        slider.showSlide();
    });
}
for(i=0;i<img.length;i++)
{
    img[i].addEventListener('click',function(){
        slider.slideIndex=parseInt(this.dataset.num);
        openModal();
        slider.lightBox();
    });
}
document.querySelector('.close').addEventListener('click',function(){
    closeModal();
});